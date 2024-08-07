<?php

namespace App\Http\Controllers;

use App\Models\Asubject;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        check_user_permissions('Manage Inquiry');

        $users = User::all();
        $subjects = Subject::all();

        return view('inquiry.add_inquiry', [
            'users' => $users,
            'subjects' => $subjects

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inquiry = Inquiry::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        if($request->has('selected_subjects'))
        {
          $subjectsPack = $request->selected_subjects;

          $subjects = explode(',',$subjectsPack);

          foreach($subjects as $subject)
          {
            Asubject::create([
                'inquiry_id' => $inquiry->id,
                'subject_id' =>$subject
            ]);
          }
        }

        return redirect()->back()->with('success', 'The Inquiry has been sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
