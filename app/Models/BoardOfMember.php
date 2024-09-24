<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardOfMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'board_of_member';
    protected $fillable = ['name','designation','image'];
}
