<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('student')->get();
        // dd($invoices);
        return view('fee.fee',[
            'invoices' => $invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::where('status', 1)->get();
        return view('fee.fee_create',[
            'students' => $students,
        ]);
    }

    public function store(Request $request)
    {
        Invoice::create([
            'student_id' => $request->student_id,
            'payment_month' => $request->payment_month,
            'total_amount' => $request->total_amount,
            'paid_amount' => $request->paid_amount,
            'remaining_amount' => $request->remaining_amount,
            'payment_date' => $request->payment_date,
            'payment_status' => $request->payment_status
        ]);

        return redirect()->route('get-fee')->with('success','The fee has been submitted');
    }

    public function generateInvoice()
    {
        $students = Student::all();
        return view('fee.generate_invoice',[
            'students' => $students
        ]);
    }

    //Working as API's
    public function getUser_fee(Request $request)
    {
        $value = $request->input('value');

        $student = Student::where('id', $value)->get();

        return response()->json($student);
    }


    public function generateUserInvoice(Request $request)
    {
        $user_fee_data = $request->input('search_student_data');

        $getDBdata = Invoice::with('student')->where('student_id', $user_fee_data)->get();

        return response()->json($getDBdata);
    }
}
