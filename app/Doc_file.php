<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Doc_file extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'doc_files';
    protected $fillable = [
        'path','doc_id', 'user_id', 'company_id'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
