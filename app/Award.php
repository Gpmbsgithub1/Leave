<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Award extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'awards';
    protected $fillable = [
        'award_name','hr_id', 'employee', 'description'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
