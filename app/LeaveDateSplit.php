<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class LeaveDateSplit extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'leave_split';
    protected $fillable = [
        'employee_id','employee','leave_type','date'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
