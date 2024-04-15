<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SalarySlip extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'salary_slips';
    protected $fillable = [
        'employee_id','user_id', 'path', 'salary_id', 'earned_leaves'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
