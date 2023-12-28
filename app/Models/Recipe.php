<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'level',
        'email',
        'tag',
        'description',
        'dish_image_filename',
        'step_text',
        'step_image_filename',
        'point',
    ];
}
