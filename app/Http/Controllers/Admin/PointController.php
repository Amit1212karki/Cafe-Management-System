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
    
            // Find the member by card number or phone
            $member = Member::where('card_no', $searchQuery)
                        ->orWhere('phone', $searchQuery)
                        ->first();
    
            if ($member) {
                // Return member details as JSON response
                return response()->json([
                    'full_name' => $member->full_name,
                    'email' => $member->email,
                    'gender' => $member->gender,
                    'address' => $member->address,
                    'phone' => $member->phone,
                    'card_no' => $member->card_no,
                ]);
            } else {
                // If member not found, return a 404 response
                return response()->json(['error' => 'Member not found.'], 404);
            }
        }
    
        // If the request is not AJAX, redirect or show an error
        return view('dashboard.pages.admin.point.add');
    }
}
