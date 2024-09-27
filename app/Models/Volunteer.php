<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'Volunteer';
    protected $fillable = ['full_name','email','phone','date','gender','subject','message'];
}
