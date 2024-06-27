<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
    
        $student_verified = Student::where('status', 1)->count();
        $student_unverified = Student::where('status', 0)->count();
        $activity_log = Activity::latest()->take(7)->get();

        return view('modules.main_dashboard',[
            'student' => Student::count(),
            'subject' =>  Subject::count(),
            'student_verified' => $student_verified,
            'student_unverified' => $student_unverified,
            'activity_log' => $activity_log
        ]);
    }

    public function Userprofile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('modules.profile_user',[
            'user' => $user,
        ]);
    }


    public function updateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user)
        {
            $user->name = $request->input('name', $user->name);
            $user->email = $request->input('email', $user->email);

            // Update password if provided
            $oldPassword = $request->input('old-password');
            $newPassword = $request->input('new-password');

            if ($oldPassword && $newPassword)
            {
                if (password_verify($oldPassword, $user->password))
                {
                    $user->password = bcrypt($newPassword);
                }
                else
                {
                    return redirect()->back()->with('error', 'Old password does not match');
                }
            }
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->storeAs('public/images/', $filename);
                $user->user_image = $filename;
            }
            $user->save();

            return redirect()->back()->with('success', 'Profile is updated');
        }

        return redirect()->back()->with('error', 'Unable to update profile');
    }


    public function deleteProfile(Request $request)
    {

        $request->validate([
            'delete_profile' => 'required',
        ],
        [
            'delete_profile.required' => 'Please confirm that you want to delete your profile.',
        ]);

        $authDeletecheck = $request->input('delete_profile') === 'on' ? '1' : '0';

        $user = User::where('id', Auth::user()->id)->first();

        if($user && $authDeletecheck !=='0')
        {
            $user->delete();

            return redirect()->route('login')->with('success', 'Your profile has been deleted');
        }
    }
}
