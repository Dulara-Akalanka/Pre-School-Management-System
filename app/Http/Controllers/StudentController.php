<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;


class StudentController extends Controller
{
    public function studentForm()
    {
        return view('Admin.student-create');
    }

    public function displayStudent()
    {
        $students = Student::get();
        return view('Admin.student',[
            'students' => $students
        ]);
    }

    public function studentDisplay()
    {
        $students = Student::get();
        return view('Student.student',[
            'students' => $students
        ]);
    }

    public function displayTeacher()
    {
        $teachers = Teacher::get();
        return view('Student.teacher',[
            'teachers' => $teachers
        ]);
    }

    public function uploadStudentImage(Request $request)
    {
        $file = $request->file('student_image');
        $destinationPath = 'storage/student-images';
        $file->move($destinationPath, $file->getClientOriginalName());
        return $file->getClientOriginalName();
    }
    
    public function createStudent(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'dob' => 'date',
            'doa' => 'date|after:date_of_birth',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
    
    

        $student = new Student();
        									
       // $student->s_id = $student_id;
        $student->s_name = $request->studentName;
        $student->religion = $request->studentReligion;
        $student->s_address= $request->studentAddress;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->s_level = $request->studentLevel;
        $student->father_name = $request->fatherName;
        $student->mother_name = $request->motherName;
        $student->doa = $request->doa;
        $student->gardian_name = $request->g_name;
        $student->dot = $request->dot;
        $student->transport = $request->transport;


        $student_image = $request->file('student_image')->getClientOriginalName();
        $request->file('student_image')->storeAs('public/student-images',$request->student_image->getClientOriginalName());
        $student -> image_name = $student_image; 

        $student->save();

        return redirect()->back()->with('success','Student Added Successfully!!!');
    }


    public function studentViewUpdate($id)
    {
        $students = Student::find($id);
        return view('Admin.student-update',[
            'students' => $students
        ]);
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->student_id);

        //$student->s_id = $request->studentId;
        $student->s_name = $request->studentName;
        $student->s_address= $request->studentAddress;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->s_level = $request->studentLevel;
        $student->father_name = $request->fatherName;
        $student->mother_name = $request->motherName;
        $student->doa = $request->doa;

        if($request->has('student_image'))
        {
            $StudentImagePath = self::uploadStudentImage($request);
            $student->image_name = $StudentImagePath;
        }
      
        $student->update();

        return redirect()->back()->with('success', 'Student updated successfully !!!');
    }

    public function deleteStudent($id)
    {
        $students = Student::find($id)->delete();
        return redirect()->back()->with('success','Student Deleted Successfully!!!');
    }
}
