<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberIndex()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
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
        $storeMember->user_id = auth()->id();
        $storeMember->save();

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function memberEdit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function memberUpdate(Request $request, $id)
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

        $updateMember = Member::findOrFail($id);
        $updateMember = new Member();
        $updateMember->form_no = $request->form_no;
        $updateMember->card_no = $request->card_no;
        $updateMember->date = $request->date;
        $updateMember->name = $request->name;
        $updateMember->gender = $request->gender;
        $updateMember->email = $request->email;
        $updateMember->address = $request->address;
        $updateMember->dob = $request->dob;
        $updateMember->phone = $request->phone;
        $updateMember->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function memberDestroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
