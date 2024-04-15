<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Leave_file extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'leave_files';
    protected $fillable = [
        'path','leave_id', 'file_type', 'user_id', 'company_id'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
