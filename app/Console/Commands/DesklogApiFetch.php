<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DesklogApi;
use App\DesklogUsers;
use App\User;
use Mail;
use Carbon\Carbon;
use App\GroupMember;
use App\Group;

class DesklogApiFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'desklog:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task Scheduling for fetching productive time reports of each employee from desklog.';

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
        if(date('l')!="Sunday" || date('l')!="Monday"){
       $yesterday = Carbon::yesterday()->format('d-m-Y');
       $y = date('Y-m-d', strtotime($yesterday));
       $ch =  "https://api.desklog.io/api/v1/app_usage_attentance?appKey=neal1wck6xr3p23anjmstjhnrpqr5v6iefw14bbm&date=".$yesterday;
       $get  = curl_init();
       curl_setopt($get, CURLOPT_URL, $ch);
       curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($get, CURLOPT_SSL_VERIFYPEER, 0);
       curl_setopt($get, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
       curl_setopt($get, CURLOPT_CONNECTTIMEOUT, 5);
       curl_setopt($get, CURLOPT_TIMEOUT, 3);
       curl_setopt($get, CURLOPT_HTTPHEADER, array('Accept: application/json'));
       $getapi = curl_exec($get);
       $getapi = json_decode($getapi,true);
        $parameter="data";
           $prsvr =  $getapi[$parameter];

        // dd($prsvr);
        // exit();
        // $prsvr = $prsvr->where('created_at','=', Carbon::yesterday())->orWhere('created_at','=', Carbon::today())->orWhere('pub_date','=', Carbon::yesterday())->orWhere('pub_date','=', Carbon::today())->orWhere('publication_date','=', Carbon::yesterday())->orWhere('publication_date','=', Carbon::today())->orWhere('pubDate','=', Carbon::yesterday())->orWhere('pubDate','=', Carbon::today())->get();
        // if($prsvr==null){
        //     Artisan::call('config:cache');
        //     return redirect()->route('admin.api.index')
        //     ->with('success', 'No data to fetch.');
        // }
        foreach($prsvr as $apiitem){
            $emp = User::where('email','=', $apiitem['email'])->first();
            if(isset($emp)){
                $emp_id = $emp->employee_id;
            } else{
                $emp_id = '';
            }
            $RJob = new DesklogApi;
            $RJob->desklog_id = @$apiitem['id'];
            $RJob->employee_id = $emp_id;
            if($apiitem['name']!=''){
                $RJob->name =  @$apiitem['name'];
            } else {
                $RJob->name =  @$emp->name;
            }
            $RJob->email =@$apiitem['email'];
            $RJob->arrival_at =  @$apiitem['arrival_at'];
            $RJob->at_work = @$apiitem['at_work'];
            $RJob->productive_time = @$apiitem['productive_time'];
            $RJob->idle_time = @$apiitem['idle_time'];
            $RJob->private_time =@$apiitem['private_time'];
            $RJob->total_time_allocated = @$apiitem['total_time_allocated'];
            $RJob->total_time_spended = @$apiitem['total_time_spended'];
            $RJob->time_zone = @$apiitem['time_zone'];
            $RJob->app_and_os = @$apiitem['app_and_os'];
            $RJob->publication_date = $yesterday;
            $RJob->save();  

            if(isset($emp)){
            $g = GroupMember::orderBy('created_at', 'DESC')->where('employee_id', '=', $emp->id)->whereNull('manager')->orWhere('manager', '<>', 1)->first();
            if(isset($g)){
            $gr = GroupMember::where('group_id', '=', $g->group_id)->where('manager', '=', 1)->first();
            $gp = Group::where('_id', '=', $g->group_id)->first();
            $gm = User::where('_id', '=', $gr->employee_id)->first();
            $RJob->group = $gp->id;
            $RJob->group_manager = $gm->id;
            $RJob->save();
            // dd($gm);
            // exit();
            } else {
                if($emp->hr_id != ''){
                    $hr = User::where('_id', '=', $emp->hr_id)->first();
                    $RJob->group_manager = $hr->id;
                } else{
                    $hr = User::where('employee_id', '=', 'SK0005')->first();
                    $RJob->group_manager = $hr->id;
                }
                $RJob->save();
            }
        }
            
            $emp_name = $RJob->name;
            $send_email = $RJob->email;
            $productive = $RJob->productive_time;
            $leave = LeaveDateSplit::where('employee_id', '=', $RJob->employee_id)->where('date', '=', date('d-m-Y', strtotime($yesterday)))->first();

            // $send_email = "midhun@skiloratech.com";
            $prod = $apiitem['productive_time'];
            if($prod != 'NA'){
            $spl = explode(" ", $prod);
            $h = explode("h",$spl[0]);
            $m = explode("m",$spl[1]);
            $s = explode("s",$spl[2]);
            $in = $h[0].":".$m[0].":".$s[0];
            $out = "08:00:00";
            if($in <= $out){
                $diff = date('H:i:s', strtotime($out) - strtotime($in));
                // dd($diff);
                // exit();
                $dt = explode(":", $diff);
                $RJob->deficit_time = $dt[0]."h ".$dt[1]."m ".$dt[2]."s";
                $RJob->save();
                $data=array('emp_name'=>$emp_name,'diff'=>$diff,'to'=>$send_email,'productive'=>$productive,'dth'=>$dt[0],'dtm'=>$dt[1],'dts'=>$dt[2],'yesterday'=>$yesterday,'leave'=>$leave);
                if($send_email!='nofe.alshumaimeri@machinestalk.com'){
                    Mail::send('emails.desk_def', $data, function($message) use ($send_email, $RJob, $yesterday)
                    {
                    $message->to($send_email)->subject("Skilora Time Sheet - ".$RJob->name." - ".$yesterday);
                    });
                }
            } else {
                $diff = date('H:i:s', strtotime($in) - strtotime($out));
                // dd($diff);
                // exit();
                $dt = explode(":", $diff);
                $RJob->gain_time = $dt[0]."h ".$dt[1]."m ".$dt[2]."s";
                $RJob->save();
                $data=array('emp_name'=>$emp_name,'diff'=>$diff,'to'=>$send_email,'productive'=>$productive,'dth'=>$dt[0],'dtm'=>$dt[1],'dts'=>$dt[2],'yesterday'=>$yesterday);

                Mail::send('emails.desk_gain', $data, function($message) use ($send_email, $RJob, $yesterday)
                {
                $message->to($send_email)->subject("Skilora Time Sheet - ".$RJob->name." - ".$yesterday);
                });
            }
        } else {
            $RJob->deficit_time = "08h 00m 00s";
            $RJob->save();
            $data=array('emp_name'=>$emp_name,'to'=>$send_email,'productive'=>$productive,'dth'=>'08','dtm'=>'00','dts'=>'00','yesterday'=>$yesterday,'leave'=>$leave);

                Mail::send('emails.desk_def', $data, function($message) use ($send_email, $RJob, $yesterday)
                {
                $message->to($send_email)->subject("Skilora Time Sheet - ".$RJob->name." - ".$yesterday);
                });
        }
        
        }

        $man = GroupMember::where('manager', '=', 1)->get();
        foreach($man as $k => $mans){
            $us = User::where('_id', '=', $man[$k]->employee_id)->first();
            $grp = Group::where('_id', '=', $man[$k]->group_id)->first();
            $yest = Carbon::yesterday()->format('d-m-Y');
            $desk = DesklogApi::where('group_manager', '=', $us->id)->where('publication_date', '=', $yest)->get();
            // $mans->desk = $desk;
            $send_email =  $us->email;
            // $send_email = "midhun@skiloratech.com";
            $i = 0;

            $data=array('us'=>$us,'desk'=>$desk,'grp'=>$grp,'to'=>$send_email,'yesterday'=>$yesterday,'i'=>$i);

                Mail::send('emails.manager_list', $data, function($message) use ($send_email, $grp, $yesterday)
                {
                $message->to($send_email)->subject("Skilora Time Sheet(Team) - ".$grp->group_name." - ".$yesterday);
                });
        }

        $em = ['vinay@skiloratech.com','nikhil@skiloratech.com','hr@skiloratech.com','sagar@skiloratech.com','roshan@skiloratech.com'];

        foreach ($em as $k => $ems) {
            $yest_day = Carbon::yesterday()->format('d-m-Y');
        $desk_users = DesklogApi::where('publication_date', '=', $yesterday)->get();
        if($ems == 'vinay@skiloratech.com'){
            $hname = "Vinay Prasad";
        } elseif ($ems == 'nikhil@skiloratech.com') {
            $hname = "Nikhil Raju";
        } elseif ($ems == 'hr@skiloratech.com') {
            $hname = "Bindi Shah";
        } elseif ($ems == 'sagar@skiloratech.com') {
            $hname = "Sagar Khan";
        } elseif ($ems == 'roshan@skiloratech.com') {
            $hname = "Roshan Elizabeth Mathew";
        }
            $send_email =  $ems;
            // $send_email = "midhun@skiloratech.com";
            $i = 0;

        $data=array('desk_users'=>$desk_users,'hname'=>$hname,'to'=>$send_email,'yesterday'=>$yesterday,'ems'=>$ems,'i'=>$i);

            Mail::send('emails.hr_list', $data, function($message) use ($send_email, $yesterday)
            {
                $message->to($send_email)->subject("Employee Timesheet - ".$yesterday);
            });
        }

        $grp = Group::where('group_name', '=', 'ERP-CRM Department')->first();
        $desk = DesklogApi::where('email','=', "yathishk@skiloratech.com")->where('publication_date', '=', $yesterday)->first();
        $us = DesklogApi::where('email', '=', 'nofe.alshumaimeri@machinestalk.com')->where('publication_date', '=', $yesterday)->first();
        $send_email =  "nofe.alshumaimeri@machinestalk.com";
            // $send_email = "midhun@skiloratech.com";
            $i = 0;

            $data=array('us'=>$us,'desk'=>$desk,'grp'=>$grp,'to'=>$send_email,'yesterday'=>$yesterday,'i'=>$i);

                Mail::send('emails.crm_list', $data, function($message) use ($send_email, $grp, $yesterday)
                {
                $message->to($send_email)->cc(['yathishk@skiloratech.com','vinay@skiloratech.com','nikhil@skiloratech.com','hr@skiloratech.com'])->subject("Skilora Time Sheet - ".$grp->group_name." - ".$yesterday);
                });
        

        // dd($diff);
        // exit();
        // $api->last_fetch = date('d M Y H:i:s', strtotime(Carbon::now()));
        // $api->save();
        // return 'API Fetched';
        }
    }
}
