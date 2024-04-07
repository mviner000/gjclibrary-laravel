<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'book_id',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
