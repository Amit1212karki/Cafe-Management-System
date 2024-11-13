<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function memberIndex()
    {
        $members = Member::with('user')->get();
        return view('dashboard.pages.staff.member.index', compact('members'));
    }

    public function memberCreate()
    {
        return view('dashboard.pages.staff.member.add');
    }


    public function memberStore(Request $request)
    {
        $request->validate([
            'form_no' => 'required',
            'card_no' => 'required',
            'date' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required'
        ]);

        try {
            // Creating a new member
            $storeMember = new Member();
            $storeMember->form_no = $request->form_no;
            $storeMember->card_no = $request->card_no;
            $storeMember->date = $request->date;
            $storeMember->name = $request->name;
            $storeMember->gender = $request->gender;
            $storeMember->email = $request->email;
            $storeMember->address = $request->address;
            $storeMember->dob = $request->dob;
            $storeMember->phone = $request->phone;
            $storeMember->user_id = Auth::id();
            $storeMember->save();

            return redirect()->route('members-index')->with('success', 'Member created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create member. Please try again.' . $e->getMessage());
        }
    }
    public function memberEdit($id)
    {
        $member = Member::findOrFail($id);
        return view('dashboard.pages.staff.member.edit', compact('member'));
    }

    public function memberUpdate(Request $request, $id)
    {
        try {
            $updateMember = Member::findOrFail($id);
            $updateMember->form_no = $request->form_no;
            $updateMember->card_no = $request->card_no;
            $updateMember->date = $request->date;
            $updateMember->name = $request->name;
            $updateMember->gender = $request->gender;
            $updateMember->email = $request->email;
            $updateMember->address = $request->address;
            $updateMember->dob = $request->dob;
            $updateMember->phone = $request->phone;
            $updateMember->user_id = Auth::id();
            $updateMember->save();

            return redirect()->route('members-index', $id)->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Update member. Please try again.' . $e->getMessage());
        }
    }

    public function memberDestroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members-index')->with('success', 'Member deleted successfully.');
    }
}
