<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class LeaveRequest extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'leave_requests';
    protected $fillable = [
        'employee_id','user_id','from_date','to_date', 'leave_type', 'leave_reason'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}