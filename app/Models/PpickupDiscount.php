<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpickupDiscount extends Model
{
    use HasFactory;

    protected $table = 'ppickup_discount';

    protected $fillable = ['amount'];
}
