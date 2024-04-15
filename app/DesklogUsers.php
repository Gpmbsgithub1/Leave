<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DesklogUsers extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'desklog_users';
    protected $fillable = [
        'name', 'email'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
