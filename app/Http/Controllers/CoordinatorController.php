<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller
{
    public function adminCoordinatorForm()
    {
        return view('Admin.coordinator-create');
    }
    
    // public function coordinatorForm()
    // {
    //     return view('Coordinator.coordinator-create');
    // }

    public function adminDisplayCoordinator()
    {
        $coordinators = Coordinator::get();
        return view('Admin.coordinator',[
            'coordinators'=>$coordinators
        ]);
    }

    public function displayCoordinator()
    {
        $coordinators = Coordinator::get();
        return view('Coordinator.coordinator',[
            'coordinators'=>$coordinators
        ]);
    }

    public function displayAdmin()
    {
        $admins = Admin::get();
        return view('Coordinator.admin',[
            'admins'=>$admins
        ]);
    }

    public function uploadCoordinatorImage(Request $request)
    {
        $file = $request->file('coordinator_image');
        $destinationPath = 'storage/coordinator-images';
        $file->move($destinationPath, $file->getClientOriginalName());
        return $file->getClientOriginalName();
    }

    public function createCoordinator(Request $request)
    {
        			
        // $request->validate([
            
        //     'c_id'=>'required',	
        //     'c_name'=>'required',	
        //     'c_address'=>'required',	
        //     'gender'=>'required',
        //     'phone'=>'required',
        //     'status'=>'required',	
        //     'dob'=>'required',	
        //     'doa'=>'required'
           
        // ]);
        // $validator = Validator::make($request->all(), [
        //     'date_of_birth' => 'required|date',
        //     'date_of_admission' => 'required|date|after:date_of_birth',
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $coordinator = new Coordinator();

       // $coordinator -> c_id = $request -> coordinatorId;
        $coordinator -> c_name = $request -> coordinatorName;
        $coordinator -> c_address = $request -> coordinatorAddress;
        $coordinator -> gender = $request -> gender;
        $coordinator -> email = $request -> coordinatorEmail;
        $coordinator -> phone = $request -> phone;
        $coordinator -> status = $request -> coordinatorStatus;
        $coordinator -> doa = $request -> doa;
        $coordinator -> dob = $request -> dob;

        $coordinator_image = $request->file('coordinator_image')->getClientOriginalName();
        $request->file('coordinator_image')->storeAs('public/coordinator-images',$request->coordinator_image->getClientOriginalName());
        $coordinator -> image_name = $coordinator_image; 

        $coordinator -> save();

        return redirect()->back()->with('success', 'Coordinator Added successfully!!!');
    }


    public function coordinatorViewUpdate($id)
    {
        $coordinators = Coordinator::find($id);
        return view('Admin.coordinator-update',[
            'coordinators' => $coordinators
        ]);
    }

    public function updateCoordinator(Request $request)
    {
      $coordinator = Coordinator::find($request->coordinator_id);

        //$coordinator -> c_id = $request -> coordinatorId;
        $coordinator -> c_name = $request -> coordinatorName;
        $coordinator -> c_address = $request -> coordinatorAddress;
        $coordinator -> gender = $request -> gender;
        $coordinator -> email = $request -> coordinatorEmail;
        $coordinator -> status = $request -> coordinatorStatus;
        $coordinator -> phone = $request -> phone;
        $coordinator -> doa = $request -> doa;
        $coordinator -> dob = $request -> dob;

        if($request->has('coordinator_image'))
        {
            $CoordinatorImagePath = self::uploadCoordinatorImage($request);
            $coordinator->image_name = $CoordinatorImagePath;
        }
      
        $coordinator->update();

        return redirect()->back()->with('success', 'Coordinator updated successfully !!!');
    }
    public function deleteCoordinator($id)
    {
        $coordinators = Coordinator::find($id)->delete();
        return redirect()->back()->with('success','Coordinator Deleted Successfully!!!');
    }

    //Teacher controls

    public function displayTeacher()
    {
        $teachers = Teacher::get();
        return view('Coordinator.teacher',[
            'teachers' => $teachers
        ]);
    }

    public function teacherForm()
    {
        return view('Coordinator.teacher-create');
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
    				
    $teacher = new Teacher();

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
        return view('Coordinator.teacher-update',[
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
    //Student Controls
    public function displayStudent()
    {
        $students = Student::get();
        return view('Coordinator.student',[
            'students' => $students
        ]);
    }
    public function studentForm()
    {
       
        return view('Coordinator.student-create');
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
        $student = new Student();
        									
        //$student->s_id = $request->studentId;
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
        return view('Coordinator.student-update',[
            'students' => $students
        ]);
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->student_id);

       // $student->s_id = $request->studentId;
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
