<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contact_info';
    protected $fillable = ['address','number','number2','email'];
}
