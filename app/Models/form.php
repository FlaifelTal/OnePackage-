<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    protected $table = 'form1';

    protected $fillable = [
        'full_name',
        'gender',
        'email',
        'nationality',
        'image_path'
    ];
    
    public $timestamps = false;
}
