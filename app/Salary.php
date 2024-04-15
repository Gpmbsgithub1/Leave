<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Salary extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'salaries';
    protected $fillable = [
        'employee','working_days', 'worked_days', 'leave_taken', 'earned_leaves', 'loss_of_pay', 'salary', 'leave_deduction', 'earnings'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
