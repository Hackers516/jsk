<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProjectName;

class ProjectsQuantity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'projects_quantity';
    protected $fillable = ['projects_name_id','image','quantity'];

    public function projects_name()
{
    return $this->belongsTo(ProjectsName::class);
}

}
