<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Coordinator;
use App\Models\Teacher;
use App\Models\Student;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('Admin.admin-dashboard-layout' );
        
    }

    public function display()
    {
        $count1 = Admin::count();
        $count2 = Coordinator::count();
        $count3 = Teacher::count();
        $count4 = Student::count();

        return view('Admin.admin-welcome',compact('count1', 'count2', 'count3', 'count4'));
    }
    

    public function adminForm()
    {
        return view('Admin.admin-create');
    }
    
    public function adminDisplay()
    {
        $admins = Admin::get();
        return view('Admin.admin',[
            'admins'=>$admins
        ]);
    }

    public function createAdmin(Request $request)
    {
        						
        $admin = new Admin();

        $admin -> a_id = $request -> adminId;
        $admin -> a_name = $request -> adminName;
        $admin -> a_address = $request -> adminAddress;
        $admin -> email = $request -> adminEmail;
        $admin -> phone = $request -> phone;
        $admin -> status = $request -> adminStatus;
        $admin -> gender = $request -> gender;
        $admin -> doa = $request -> doa;
        $admin -> dob = $request -> dob;

        $admin -> save();

        return redirect()->back()->with('success', 'Admin Added successfully!!!');
    }


    public function adminViewUpdate($id)
    {
        $admins = Admin::find($id);
        return view('Admin.admin-update',[
            'admins' => $admins
        ]);
    }

    public function updateAdmin(Request $request)
    {
      $admin = Admin::find($request->admin_id);

      $admin -> a_id = $request -> adminId;
      $admin -> a_name = $request -> adminName;
      $admin -> a_address = $request -> adminAddress;
      $admin -> email = $request -> email;
      $admin -> phone = $request -> phone;
      $admin -> status = $request -> status;
      $admin -> gender = $request -> gender;
      $admin -> doa = $request -> doa;
      $admin -> dob = $request -> dob;
      
      $admin->update();

      return redirect()->back()->with('success', 'Admin updated successfully !!!');
    }

  
    
}
