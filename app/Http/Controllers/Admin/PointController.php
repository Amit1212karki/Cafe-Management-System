<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Point;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PointController extends Controller
{

    public function adminPointIndex()
    {
        return view('dashboard.pages.admin.point.index');
    }

    public function adminPointCreate(Request $request)
    {
        if ($request->ajax()) {
            $searchQuery = $request->query('search');
    
            $member = Member::where('card_no', $searchQuery)
                        ->orWhere('phone', $searchQuery)
                        ->orWhere('email', $searchQuery)
                        ->first();
    
            if ($member) {
                return response()->json([
                    'id' =>$member->id,
                    'name' => $member->name,
                    'email' => $member->email,
                    'gender' => $member->gender,
                    'address' => $member->address,
                    'phone' => $member->phone,
                    'card_no' => $member->card_no,
                    'dob' => $member->dob,
                    'date' => $member->date,
                    'form_no' => $member->form_no,

                ]);
            } else {
                return response()->json(['error' => 'Member not found.'], 404);
            }
        }
    
        return view('dashboard.pages.admin.point.add');
    }


    public function adminPointStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:members,id',
            'bill_no' => 'required|string',
            'bill_amount' => 'required|numeric|min:0',
            'points' => 'required|numeric|min:0',
        ]);
    
        try {
            $point = new Point();
            $point->user_id = $request->user_id;
            $point->member_id = $request->member_id;
            $point->bill_no = $request->bill_no;
            $point->bill_amount = $request->bill_amount;
            $point->points = $request->points;
            $point->save();
    
            // Flash success message
            session()->flash('message', 'Points added successfully!');
            session()->flash('message_type', 'success'); // or 'error' for error messages
        } catch (\Exception $e) {
            // Flash error message
            session()->flash('message', 'An error occurred: ' . $e->getMessage());
            session()->flash('message_type', 'error');
        }
    
        return redirect()->route('admin-point-index'); // Or redirect to any other view
    }
}
