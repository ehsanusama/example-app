<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $fillable = [
        'date', // Add 'date' to the $fillable array
        'title',
        'description',
        'amount',
        'type',
    ];
}
