<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Models\Coordinator;
use App\Models\Teacher;
use App\Models\Student;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('Login.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

       $result = UserLogin::where("username",$username)->where("password",$password)->first();
        //$user = UserLogin::where("username", $username)->first();
       // dd($user);
        //dd($username, $password);
        if($result)
       // if($user && Hash::check($request->$password, $user->password))
        {
            $request->session()->put("user_type",$result->user_type);
            $request->session()->put("username",$result->username);

            if($result->user_type == "admin"){
                return redirect("admin-dashboard");
            }
            if($result->user_type == "coordinator"){
                return redirect("coordinator-dashboard");
            }
            if($result->user_type == "teacher"){
                return redirect("teacher-dashboard");
            }
            if($result->user_type == "student"){
                return redirect("student-dashboard");
            }
           
        }
        else
        {
            return redirect("/");
        }
        
    }

    public function logout()
    {
        session()->forget(['user_type','username']);
        return redirect('/?logout=success');
    }

    // for credentials
    public function coordinatorUsername()
    {
        $data = Coordinator::all();
        $passwords = UserLogin::all();
        return view('Admin.credential-coordinator', ['data'=>$data], ['passwords'=>$passwords]);
    }

    public function teacherUsername()
    {
        $data = Teacher::all();
        return view('Admin.credential-teacher', ['data'=>$data]);
    }

    public function studentUsername()
    {
        $data = Student::all();
        return view('Admin.credential-student', ['data'=>$data]);
    }

    public function createCredential(Request $request)
    {
        						
        $user = new UserLogin();

        $user -> username = $request -> username;
        $user -> password = $request->studentPassword;
        //$user -> password = Hash::make($request->studentPassword);
        $user -> user_id = $request -> userId;
        $user -> user_type = $request -> userType;
      

        $user -> save();

        return redirect()->back()->with('success', 'Credentials Created successfully!!!');
    }
}
