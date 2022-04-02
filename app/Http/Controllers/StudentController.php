<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Student\CreateStudentRequest;

class StudentController extends Controller
{
     public function index(){
         return view('students.index');
     }

     public function fetchStudents(){

        $students=Student::all();

        return response()->json([
                'students'=>$students
        ]);
                
        return view('students.index');
    }
     public function store(Request $request){
         //print_r($request->all());
               $validator=Validator::make($request->all(),
               [
                    'name'=>'required|max:15',
                    'email'=>'required|email|unique:students',
                    'phone'=>'required|max:10',
                    'course'=>'required|max:191',
               ]);

               if($validator->fails()){

                    return response()->json([
                        'status'=>400,
                        'errors'=>$validator->messages(),
                    ]);
               }else{
                   $student=new Student();
                
                   $student->name=$request->input('name');
                   $student->email=$request->input('email');
                   $student->phone=$request->input('phone');
                   $student->course=$request->input('course');
                   $student->save();
                   return response()->json([
                    'status'=>200,
                    'message'=>'Student Added successfully'
                ]);
               }
    }
   
}
