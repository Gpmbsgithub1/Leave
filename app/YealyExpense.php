<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class YealyExpense extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'yearly_expense';
    protected $fillable = [
        'amount','month','year'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
