<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    protected $fillable = ['user_type_name'];

    protected $table="user_type";
}
