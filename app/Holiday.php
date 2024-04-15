<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Holiday extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'holidays';
    protected $fillable = [
        'date','day', 'holiday', 'year', 'description'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
