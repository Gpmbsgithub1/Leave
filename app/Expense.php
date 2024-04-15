<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Expense extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'expense';
    protected $fillable = [
        'amount', 'year'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
