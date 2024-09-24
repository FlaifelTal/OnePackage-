<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;
    protected $table = 'forms' ;

    protected $fillable = [
        'category_id',
        'lang_id',
        'language',
        'title',
        'description',
        'date',
        'image',
    ];

    // Define relationships if necessary
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
