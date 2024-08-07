<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        check_user_permissions('Manage Subjects');

        $subjects = Subject::all();
        return view('subject.subjects',[
            'subjects' => $subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        check_user_permissions('Manage Subjects');

        return view('subject.subjects_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Subject has been created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        check_user_permissions('Manage Subjects');

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        check_user_permissions('Manage Subjects');

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
