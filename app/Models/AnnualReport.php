<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnualReport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'annual_report';
    protected $fillable = ['title','year','category','file'];
}
