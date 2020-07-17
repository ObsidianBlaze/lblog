<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(4);

        return view('welcome', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone_number;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Sucessfully Added');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone_number;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Sucessfully Updated');
    }

    public function delete($id){
        $student = Student::find($id);
        $student->delete($id);
        return redirect(route('home'))->with('successMsg', 'Student Sucessfully Deleted');
    }
}
