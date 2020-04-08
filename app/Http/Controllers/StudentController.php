<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function student()
    {
    	return view('student.creat');
    }

    public function storestudent(Request $request)
    {
    	

    	$stu=new Student;
    	$stu->name=$request->s_name;
    	$stu->email=$request->s_email;
    	$stu->phone=$request->s_phone;
    	
    	if($stu->save()){$notification=array
		    		(
    	 				'messege'=>'Successfully Inserted','alert-type'=>'success'
    	 			);
    	return Redirect()->back()->with($notification);}
    	else{
    		$notification=array
		    		(
    	 				'messege'=>'Error','alert-type'=>'error'
    	 			);
    	return Redirect()->back()->with($notification);}
 	
    }

    public function allstudent()
    {
    	$stud=Student::all();
    	
    	return view('student.allstudent',compact('stud'));
    }

    public function show($id)
    {
    	$show=Student::findorfail($id);
    	return view('student.viewstudent',compact('show'));
    }

    public function destroy($id)
    {
    	$delete=Student::findorfail($id);
    	
    	if($delete->delete()){$notification=array
		    		(
    	 				'messege'=>'Successfully Delete','alert-type'=>'success'
    	 			);
    	return Redirect()->back()->with($notification);}
    	else{
    		$notification=array
		    		(
    	 				'messege'=>'Error','alert-type'=>'error'
    	 			);
    	return Redirect()->back()->with($notification);}
	}

	public function edit($id)
	{
		$student=Student::findorfail($id);
		// return response()->json($edit);
		 return view('student.editstudent',compact('student'));
	}

	public function updatestudent(Request $request,$id)
	{
		$student=Student::findorfail($id);
		$student->name=$request->s_name;
		$student->email=$request->s_email;
		$student->phone=$request->s_phone;
		if($student->save())
		{
			$notification=array
		    		(
    	 				'messege'=>'Successfully Update','alert-type'=>'success'
    	 			);
    	return Redirect()->back()->with($notification);
    	}

		
		else{
    		$notification=array
		    		(
    	 				'messege'=>'Error','alert-type'=>'error'
    	 			);
    			return Redirect()->back()->with($notification);
    		}
    }
	
	
    
}
