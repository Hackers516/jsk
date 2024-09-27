<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'project_category';
    protected $fillable = ['project_name_id','name','slug'];
}
