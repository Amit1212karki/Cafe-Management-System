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
        $userId = Auth::id();

        $members = Member::with('user')
        ->where('user_id', $userId) 
        ->get();
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
            'card_no' => 'required|unique:members,card_no',
            'date' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email|unique:members,email',
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required|unique:members,phone'
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
        $request->validate([
            'form_no' => 'required',
            'card_no' => 'required|unique:members,card_no,' . $id,
            'date' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required|unique:members,phone,' . $id
        ]);

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




    public function adminMemberIndex()
    {
        $members = Member::with('user')->get();
        return view('dashboard.pages.admin.member.index', compact('members'));
    }

    public function adminMemberCreate()
    {
        return view('dashboard.pages.admin.member.add');
    }


    public function adminMemberStore(Request $request)
    {
        $request->validate([
            'form_no' => 'required',
            'card_no' => 'required|unique:members,card_no',
            'date' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email|unique:members,email',
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required|unique:members,phone'
        ], [
            'form_no.required' => 'The form number is required.',
            'card_no.required' => 'The card number is required.',
            'card_no.unique' => 'The card number has already been taken.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date.',
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a valid string.',
            'gender.required' => 'The gender is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a valid string.',
            'dob.required' => 'The date of birth is required.',
            'dob.date' => 'The date of birth must be a valid date.',
            'phone.required' => 'The phone number is required.',
            'phone.unique' => 'The phone number has already been taken.'
        ]);
    
        // Check if card_no, phone, or email are the same
        if ($request->card_no === $request->phone || $request->card_no === $request->email || $request->phone === $request->email) {
            return redirect()->back()->with('error', 'Card number, phone number, and email should not be the same.');
        }
    
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
    
            return redirect()->route('admin-members-index')->with('success', 'Member created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create member. Please try again.' . $e->getMessage());
        }
    }
    public function adminMemberEdit($id)
    {
        $member = Member::findOrFail($id);
        return view('dashboard.pages.admin.member.edit', compact('member'));
    }

    public function adminMemberUpdate(Request $request, $id)
    {
        $request->validate([
            'form_no' => 'required',
            'card_no' => 'required|unique:members,card_no,' . $id,
            'date' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required|unique:members,phone,' . $id
        ], [
            'form_no.required' => 'The form number is required.',
            'card_no.required' => 'The card number is required.',
            'card_no.unique' => 'The card number has already been taken.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date.',
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a valid string.',
            'gender.required' => 'The gender is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a valid string.',
            'dob.required' => 'The date of birth is required.',
            'dob.date' => 'The date of birth must be a valid date.',
            'phone.required' => 'The phone number is required.',
            'phone.unique' => 'The phone number has already been taken.'
        ]);
    
        // Check if card_no, phone, or email are the same
        if ($request->card_no === $request->phone || $request->card_no === $request->email || $request->phone === $request->email) {
            return redirect()->back()->with('error', 'Card number, phone number, and email should not be the same.');
        }
    
        try {
            // Find and update the member
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
    
            return redirect()->route('admin-members-index')->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update member. Please try again.' . $e->getMessage());
        }
    }

    public function adminMemberDestroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('admin-members-index')->with('success', 'Member deleted successfully.');
    }
}
