<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }





    public function updateUserNameEmail(Request $request, $user_id){
        $user = User::where(['id'=>$user_id])->first();

        $name = $request->input('name');
        $email = $request->input('email');

        DB::update('update users set name = ? where id = ?',[$name,$user_id]);
        DB::update('update users set email = ? where id = ?',[$email,$user_id]);
        // dd($user);
        return redirect()->back()->with('success_message','Record updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);        
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with("fail_message", "Old Password Doesn't match!");
        }        
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);


        
            
        

        return back()->with("success_message", "Password changed successfully!");
    }
}
