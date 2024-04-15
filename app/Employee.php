<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'emplyees';
    protected $fillable = [
        'name','company', 'employee_id', 'email', 'phone'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
