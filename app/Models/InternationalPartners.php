<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternationalPartners extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'international_partners';
    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'array',  // Casts the 'technologies' column to an array
    ];
}
