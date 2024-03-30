<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('subjects')->get();
        return view('modules.students',[
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('modules.student_register',[
            'subjects' => $subjects,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|string|max:25',
        //     'phone' => 'required|integer',
        //     'class' => 'required|string',
        //     'subjects' => 'required|string',
        //     'fee' => 'required|integer'
        // ]);

        $data = Student::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'class' => $request->class,
            // 'subject_id' => json_encode($request->subject_id), //array
            'fee' => $request->fee,
            'status' => $request->has('status') ? 1 : 0,
        ]);


        if ($request->has('subject_id'))
        {
            $data->subjects()->attach($request->input('subject_id'));
        }

        // dd($data);

        return redirect()->back()->with('success', 'Student has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subjects = Subject::all();
        $students = Student::findorFail($id);
        return view('modules.student_view',[
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects = Subject::all();
        $student = Student::findorFail($id);

        return view('modules.student_edit',[
            'subjects' => $subjects,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findorFail($id);

        $update= $student->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'class' => $request->input('class'),
            'subject_id' => json_encode(($request->input('subject_id'))), //array
            'fee' => $request->input('fee'),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('students.index')->with('success', 'Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findorFail($id);
        $student->delete();

        return redirect()->back()->with('success', 'Student has been deleted!');
    }
}
