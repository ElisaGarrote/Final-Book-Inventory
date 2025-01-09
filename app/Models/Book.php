<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    // Define which fields can be mass-assigned
    protected $fillable = [
        'book_number', 'research_title', 'researcher', 'abstract', 'held_by', 'location', 'status','category','book_code',
    ];

    protected $dates = ['deleted_at']; // For soft deletes
}
