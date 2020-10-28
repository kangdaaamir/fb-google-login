<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $fillable = ['name','description','due_date','assign_project_to','assign_by'];

     protected $table="projects";
}
