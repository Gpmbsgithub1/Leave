<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Employee;
use App\Company;
use App\Group;
use App\GroupMember;
use App\Document;
use App\Doc_file;
use App\LeaveRequest;
use App\Salary;
use App\SalarySlip;
use App\Award;
use App\Award_file;
use App\Leave_file;
use App\Expense;
use App\YearlyExpense;
use Validator;
use Auth;
use File;
use DB;
use Storage;
use PDF;
use DateTime;
use DateInterval;
use Carbon\Carbon;

class SalaryCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic Salary Slip generation of employees on 25th of each month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employee = User::where('email', '<>', 'nikhil@skiloratech.com')->where('email', '<>', 'vinay@skiloratech.com')->where('email', '<>', 'sambasiva@skiloratech.com')->where('email', '<>', 'shifona@skilora.in')->where('email', '<>', 'naveenk@skiloratech.com')->where('email', '<>', 'prabhatkumar@skiloratech.com')->where('email', '<>', 'other@skiloratech.com')->where('status', '=', "1")->get();
        // dd($employee);
        // exit();
        foreach($employee as $k => $employees){
        // $leave = LeaveRequest::where('employee_id', '=', $employee[$k]->id)->where('fmonth', '=', date('m'))->where('tmonth', '=', date('m'))->where('approve', '=', 1)->get();
        // $days = LeaveRequest::where('employee_id', '=', $employee[$k]->id)->where('fmonth', '=', date('m'))->where('tmonth', '=', date('m'))->where('approve', '=', 1)->sum('days');
        $dt = Carbon::now();
        $lastMonth =  $dt->subMonth()->format('Y-m')."-26";
        $thiMonth = date('Y-m')."-25";
        $days = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '<>', 'half_day')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $free = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '<>', 'loss_of_pay')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $paid = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '=', 'loss_of_pay')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $half_days = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '=', 'half_day')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $half_gain = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '=', 'half_day')->where('type', '=', 'gain')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $half_loss = LeaveDateSplit::where('employee', '=', $employees->id)->where('leave_type', '=', 'half_day')->where('type', '=', 'loss')->whereBetween('date', [$lastMonth." 00:00:00", $thiMonth." 23:59:59"])->count();
        $days = $days + $half_days * 0.5;
        $free = $free + $half_gain * 0.5;
        $paid = $paid + $half_loss * 0.5;
        // dd($employee);

        if($paid>0 && $days>0){
            $worked = 30 - $days;
            $per_day = $employees->base_salary / 30;
            $free = $days - $paid;
            $paid = $paid;
            $ded = round($paid * $per_day);
            $earn = round($employees->base_salary - $paid * $per_day);
            $basic = round($employees->other_allow - $paid * $per_day);
            $deduction = $employees->salary_advance + $ded;
        } elseif ($paid==0 && $days>0){
            $worked = 30 - $days;
            $per_day = $employees->base_salary / 30;
            $free = $days;
            $paid = 0;
            $ded = round($paid * $per_day);
            $earn = round($employees->base_salary);
            $basic = round($employees->other_allow);
            $deduction = $employees->salary_advance + $ded;
        } elseif ($paid==0 && $days==0) {
            $worked = 30 - $days;
            $per_day = $employees->base_salary / 30;
            $free = 0;
            $paid = 0;
            $ded = round($paid * $per_day);
            $earn = round($employees->base_salary);
            $basic = round($employees->other_allow);
            $deduction = $employees->salary_advance + $ded;
        }
        $current = date('F');
        $date = Carbon::now();
        $salary_month = $date->format('M Y');
        $empl = User::where('_id', '=', $employees->id)->first();
        $month = Carbon::createFromFormat('F-d', "$current-1")->addMonth()->format('F');
        $mon = Carbon::createFromFormat('F-d', "$current-1")->addMonth()->format('M Y');
        $pdf = PDF::loadView('hr.slip', compact('empl', 'leave', 'days', 'worked', 'days', 'free', 'paid', 'ded', 'earn', 'basic', 'deduction', 'month', 'salary_month'));
        Storage::put('public/pdf/'.'Salary Slip-'.$employees->employee_id.'-'.$employees->name.'-'.date('M Y').'.pdf', $pdf->output());
        // return $pdf->download('Salary Slip-'.$user[$k]->employee_id.'-'.$user[$k]->name.'-'.date('M Y').'.pdf');

        $salary_slip = SalarySlip::where('employee_id', '=', $employees->employee_id)->where('date', '=', date('M Y'))->count();
        if($salary_slip<1){
            $sal = new SalarySlip;
            $sal->employee_id = $employees->employee_id;
            $sal->user_id = $employees->id;
            $sal->path = 'Salary Slip-'.$employees->employee_id.'-'.$employees->name.'-'.date('M Y').'.pdf';
            $sal->amount = $earn;
            $sal->date = date('M Y');
            $sal->save();
        } else {
            $sal = SalarySlip::where('employee_id', '=', $employees->employee_id)->where('date', '=', date('M Y'))->first();
            $sal->employee_id = $employees->employee_id;
            $sal->user_id = $employees->id;
            $sal->path = 'Salary Slip-'.$employees->employee_id.'-'.$employees->name.'-'.date('M Y').'.pdf';
            $sal->amount = $earn;
            $sal->date = date('M Y');
            $sal->save();
        }

        $send_email = $employees->email;
        // $send_email = "midhun@skiloratech.com";
        $doc = "Salary Slip - ".date('M Y');
        $d = date('M Y');
        $employee = $employees;

        $data=array('to'=>$send_email,'doc'=>$doc,'employee'=>$employee);

        Mail::send('emails.salary_slip', $data, function($message) use ($send_email, $d)
        {
            $message->to($send_email)->subject("Salary Slip Uploaded - ".$d);
        });
    }
    $total_salary = SalarySlip::where('date', '=', date('M Y'))->sum('amount');
    $exp = Expense::where('month', '=', date('m'))->where('year', '=', date('Y'))->count();
    if($exp<1){
        $expense = new Expense;
        $expense->amount = $total_salary;
        $expense->month = date('m');
        $expense->year = date('Y');
        $expense->save();
    } else {
        $expense = Expense::where('month', '=', date('m'))->where('year', '=', date('Y'))->first();
        $expense->amount = $total_salary;
        $expense->month = date('m');
        $expense->year = date('Y');
        $expense->save();
    }
    $totalYearExp = Expense::where('year', '=', date('Y'))->sum('amount');
    $yearexp = YearlyExpense::where('year', '=', date('Y'))->count();
    if($yearexp<1){
        $expense = new YearlyExpense;
        $expense->amount = $totalYearExp;
        $expense->year = date('Y');
        $expense->save();
    } else {
        $expense = YearlyExpense::where('year', '=', date('Y'))->first();
        $expense->amount = $totalYearExp;
        $expense->year = date('Y');
        $expense->save();
    }
    }
}
