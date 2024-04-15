<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Award_file extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'award_files';
    protected $fillable = [
        'path','award_id', 'user_id', 'company_id'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/
}
