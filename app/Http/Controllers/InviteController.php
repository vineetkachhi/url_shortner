<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\AdminInvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    public function inviteForm(Company $company)
    {
        return view('companies.invite', compact('company'));
    }

    public function sendInvite(Request $request, Company $company)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $token = Str::random(64);
        // dd($company->id);
        // print_r($company);
        // die;
        $user = User::create([
            'company_id'   => $company->id,
            'name'         => $request->name,
            'email'        => $request->email,
            'role'         => 'admin',
            'invite_token' => $token,
        ]);

        Mail::to($user->email)
            ->send(new AdminInvitationMail($user));

        return redirect()
            ->route('companies.index')
            ->with('success', 'Invitation sent successfully');
    }

    public function showForm($token)
    {
        $user = User::where('invite_token', $token)->firstOrFail();

        return view('auth.accept-invitations', compact('user'));
    }

    public function store(Request $request, $token)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('invite_token', $token)->firstOrFail();

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'invite_token' => null,
            'invite_status' => 'accepted',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function adminMemberList()
    {
        $users = User::where('company_id', auth()->user()->company_id)->get();

        return view('invite.index', compact('users'));
    }

    public function inviteFormAdmin(Company $company)
    {
        return view('invite.invite', compact('company'));
    }

    public function sendInviteAdmin(Request $request, Company $company)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required|in:admin,Member',
        ]);

        $token = Str::random(64);

        $user = User::create([
            'company_id'   => $company->id,
            'name'         => $request->name,
            'email'        => $request->email,
            'role'         => $request->role,
            'invite_token' => $token,
        ]);

        Mail::to($user->email)
            ->send(new AdminInvitationMail($user));

        return redirect()
            ->route('adminmemberlist')
            ->with('success', 'Invitation sent successfully');
    }
}
