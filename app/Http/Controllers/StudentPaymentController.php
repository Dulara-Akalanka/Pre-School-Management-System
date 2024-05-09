<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPayment;
use App\Models\Student;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class StudentPaymentController extends Controller
{
    
    public function monthPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Monthly')->get();
        // $studentPayments = StudentPayment::get();
        return view('Admin.student-monthly-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }

    public function functionPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Function')->get();
       // $studentPayments = StudentPayment::get();
        return view('Admin.student-function-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }

    public function otherPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Other')->get();
       // $studentPayments = StudentPayment::get();
        return view('Admin.student-other-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }


    public function payment(Request $request)
    {
        
        $payment = new StudentPayment();

        $payment -> student_id = $request -> studentId;
        $payment -> student_name = $request -> studentName;
        $payment -> month = $request -> month;
        $payment -> function = $request -> function;
        $payment -> other = $request -> other;
        $payment -> amount = $request -> amount;
        $payment -> payment_type = $request -> paymentType;

        $payment -> save();

        $invoiceData = [
            'receipt_id' => $payment->invoice_id,
            'user_id' => $payment->student_id,
            'name' => $payment-> student_name,
            'amount' => $payment->amount,
            'reason' => $payment->month
        
            // Add other relevant invoice data based on the payment details
        ];

        // $pdf = new Dompdf();
        // $pdf->loadView('invoice', $invoiceData);
       // $pdf = PDF::loadView('Admin.invoice', $invoiceData);


        //$pdf = PDF::loadView('invoice', compact('invoiceData'));

        //return $pdf->download('invoice.pdf');
        return redirect()->back()->with('success', 'Payment Made successfully!!!');
    }

    // coordinator payment routes
    public function CmonthPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Monthly')->get();
        // $studentPayments = StudentPayment::get();
        return view('Coordinator.student-monthly-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }

    public function CfunctionPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Function')->get();
       // $studentPayments = StudentPayment::get();
        return view('Coordinator.student-function-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }

    public function CotherPaymentForm()
    {
        $data = Student::all();
        $studentPayments = StudentPayment::where('payment_type', 'Other')->get();
       // $studentPayments = StudentPayment::get();
        return view('Coordinator.student-other-payment', ['data'=>$data],['studentPayments'=>$studentPayments]);
    }

    //generate Invoice
    public function generateInvoice($id)
    {
        $payments = StudentPayment::find($id);
        return view('Admin.invoice',[
            'payments' => $payments
        ]);
        //return view('Admin.invoice');
    }
    
    //report generate
    public function viewPayment(Request $request)
    {
        $startDate = $request->dFrom;
        $endDate = $request->dTo;

        $studentpayments = StudentPayment::whereBetween('date', [$startDate, $endDate])->get();

        $data = Student::all();
        return view('Admin.payment-report',
         ['data'=>$data,
            'studentpayments'=>$studentpayments
        ]);
    }
    
    public function paymentView(Request $request)
    {
        $startDate = $request->dFrom;
        $endDate = $request->dTo;

        $studentpayments = StudentPayment::whereBetween('date', [$startDate, $endDate])->get();

        $data = Student::all();
        return view('Admin.payment-report', [
            'studentpayments'=>$studentpayments
        ]);
    }
    // view pdf
    public function viewPdf($id)
    {
        $payments = StudentPayment::find($id);
        return view('Admin.invoice',[
            'payments' => $payments
        ]);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('Admin.invoice'));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('invoice.pdf',['Attachment'=>false]);
    }

    public function displayPayment()
    {
        //$student = Student::find(Auth::id());

        $student = Student::where('s_id', Auth::id())->first();
        //$student = auth()->user();
        $payments = StudentPayment::where('student_id', $student->s_id)->get();
    
        return view('payments', ['payments' => $payments]);
    }

    
}

