<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Document extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'documents';
    protected $fillable = [
        'name','hr_id', 'employee_id', 'description'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
