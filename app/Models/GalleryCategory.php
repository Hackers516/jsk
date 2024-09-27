<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'gallery_category';
    protected $fillable = ['name','slug'];
}
