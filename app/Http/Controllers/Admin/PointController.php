<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Point;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Log;

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
                    'id' => $member->id,
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
            'billno' => 'required|string',
            'billamount' => 'required|numeric',
            'points' => 'required|numeric',
            'member_id' => 'required|exists:members,id', // Assuming 'members' is your members table
            // Add other fields as necessary
        ]);
    
        // Save the point details into the Point model
        $point = new Point();
        $point->bill_no = $request->billno;
        $point->bill_amount = $request->billamount;
        $point->points = $request->points;
        $point->member_id = $request->member_id; // This is the relationship with your member model
        $point->user_id = $request->user_id; // Assuming logged-in user
        $point->save();

        return redirect()->route('admin.point.index')->with('success', 'Point record created successfully');
    }


    public function adminPointEdit($id)
    {
        $point = Point::findOrFail($id);

        return view('dashboard.pages.admin.point.edit', compact('point'));
    }


    public function adminPointUpdate(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'member_id' => 'required|exists:members,id',
            'bill_no' => 'required|string',
            'bill_amount' => 'required|numeric',
            'points' => 'required|numeric',
        ]);

        $point = Point::findOrFail($id);

        $point->update([
            'user_id' => $request->user_id,
            'member_id' => $request->member_id,
            'bill_no' => $request->bill_no,
            'bill_amount' => $request->bill_amount,
            'points' => $request->points,
        ]);

        return redirect()->route('admin.point.index')->with('success', 'Point record updated successfully');
    }


    public function adminPointDelete($id)
    {
        $point = Point::findOrFail($id);

        $point->delete();

        return redirect()->route('admin.point.index')->with('success', 'Point record deleted successfully');
    }
}
