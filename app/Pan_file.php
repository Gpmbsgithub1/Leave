<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Pan_file extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'pan_files';
    protected $fillable = [
        'path', 'file_type', 'employee', 'employee_id', 'company_id'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
