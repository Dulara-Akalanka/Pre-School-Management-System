<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::get();
        return view('Admin.student-attendance',[
            'attendances' => $attendances
        ]);
    }

    public function barcodeScan(Request $request)
    {
        // $current_time = time();
        // $DateTime=strftime("%d-%m-%y  %H:%M:%S",$current_time);
        // $DateTime;

        $attendance = new Attendance();
        $attendance->barcode = $request->barcode;
        //$attendance->date = $DateTime;
        
        $attendance->save();

        return redirect()->back()->with('success', 'Scan Success!!!');

        // $query = Item::where('barcode', '=', $request->barcode)->get();
    }

    //report generate
    public function viewAttendance(Request $request)
    {
        $startDate = $request->dFrom;
        $endDate = $request->dTo;
       
        $attendances = Attendance::whereBetween('date', [$startDate, $endDate])->get();
        $data = Student::all();
        return view('Admin.attendance-report', [
            'data'=>$data,
            'attendances'=>$attendances
        ]);
    }

    public function attendanceView(Request $request)
    {
        $startDate = $request->dFrom;
        $endDate = $request->dTo;

        $attendances = Attendance::whereBetween('date', [$startDate, $endDate])->get();
        return view('Admin.attendance-report', [
            'attendances'=>$attendances
        ]);
      


    }
}
