<?php

namespace App;
// use App\Subindustry;
use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class GroupMember extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'group_members';
    protected $fillable = [
        'group_id','user_id','company_id','manager'
    ];
  /*  protected $searchable = [

        'columns' => [

            'industries.industry_name' => 10,


        ]

    ];*/


}
