<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialMedia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'social_media';
    protected $fillable = ['twitter','facebook','youtube','instagram'];
}
