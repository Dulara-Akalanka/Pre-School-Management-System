<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\File;


class TeacherController extends Controller
{
    public function teacherForm()
    {
        return view('Admin.teacher-create');
    }

    public function displayTeacher()
    {
        $teachers = Teacher::get();
        return view('Admin.teacher',[
            'teachers' => $teachers
        ]);
    }

    public function teacherDisplay()
    {
        $teachers = Teacher::get();
        return view('Teacher.teacher',[
            'teachers' => $teachers
        ]);
    }

    public function displayStudent()
    {
        $students = Student::get();
        return view('Teacher.student',[
            'students' => $students
        ]);
    }

    public function uploadTeacherImage(Request $request)
    {
        $file = $request->file('teacher_image');
        $destinationPath = 'storage/teacher-images';
        $file->move($destinationPath, $file->getClientOriginalName());
        return $file->getClientOriginalName();
    }
    
   public function createTeacher(Request $request)
   {

    // $request->validate([
        
    //     't_id'=>'required',	
    //     't_name'=>'required',	
    //     't_address'=>'required',	
    //     'gender'=>'required',
    //     'email',
    //     'phone'=>'required',
    //     'status'=>'required',	
    //     'dob'=>'required',	
    //     'doa'=>'required',
       
    // ]);
    				
    $teacher = new Teacher();

    $teacher -> t_id = $request -> teacherId;
    $teacher -> t_name = $request -> teacherName;
    $teacher -> t_address = $request -> teacherAddress;
    $teacher -> gender = $request -> gender;
    $teacher -> phone = $request -> phone;
    $teacher -> email = $request -> teacherEmail;
    $teacher -> status = $request -> teacherStatus;
    $teacher -> dob = $request -> dob;
    $teacher -> doa = $request -> doa;
    $teacher -> dot = $request -> dot;
    $teacher -> t_level = $request -> teacherLevel;
    $teacher -> nic = $request -> teacherNic;
    $teacher -> educational_qualification = $request -> educationQuali;
    $teacher -> other_qualification = $request -> otherQuali;


    $teacher_image = $request->file('teacher_image')->getClientOriginalName();
    $request->file('teacher_image')->storeAs('public/teacher-images',$request->teacher_image->getClientOriginalName());
    $teacher -> image_name = $teacher_image; 

    $teacher -> save();

    return redirect()->back()->with('success','Teacher Added Successfully!!');
   }


   public function teacherViewUpdate($id)
    {
        $teachers = Teacher::find($id);
        return view('Admin.teacher-update',[
            'teachers' => $teachers
        ]);
    }

    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::find($request->teacher_id);

       // $teacher -> t_id = $request -> teacherId;
       $teacher -> t_name = $request -> teacherName;
       $teacher -> t_address = $request -> teacherAddress;
       $teacher -> gender = $request -> gender;
       $teacher -> phone = $request -> phone;
       $teacher -> email = $request -> teacherEmail;
       $teacher -> status = $request -> teacherStatus;
       $teacher -> dob = $request -> dob;
       $teacher -> doa = $request -> doa;
       $teacher -> dot = $request -> dot;
       $teacher -> husband_name = $request -> husbandName;
       $teacher -> carrier = $request -> husbandCarrier;
       $teacher -> t_level = $request -> teacherLevel;
       $teacher -> nic = $request -> teacherNic;
       $teacher -> educational_qualification = $request -> educationQuali;
       $teacher -> other_qualification = $request -> otherQuali;

        if($request->has('teacher_image'))
        {
            $TeacherImagePath = self::uploadTeacherImage($request);
            $teacher->image_name = $TeacherImagePath;
        }
      
        $teacher->update();

        return redirect()->back()->with('success', 'Teacher updated successfully !!!');
    }

    public function deleteTeacher($id)
    {
        $teachers = Teacher::find($id)->delete();
        return redirect()->back()->with('success','Teacher Deleted Successfully!!!');
    }
}
