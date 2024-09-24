<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectsName extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'projects_name';
    protected $fillable = ['project_name','slug'];
}
