<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompleteProjects extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'complete_projects';
    protected $fillable = ['card_image','date','title','slug','desc','images'];
}
