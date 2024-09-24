<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSlider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hero_slider';
    protected $fillable = ['image'];
}
