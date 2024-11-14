<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
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
}
