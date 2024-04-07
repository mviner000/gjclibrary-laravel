<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'authors',
        'tags',
        'categories',
        'departments',
        'cabinet_number',
        'cabinet_side',
        'status',
        'status_approved_by',
        'status_updated_at',
        'rating',
        'year_published',
        'pages',
        'image_path',
        'borrowed_by',
        'borrowed_book_approved_by',
        'borrowed_date',
        'returned_date',
        'returned_by',
        'returned_book_approved_by',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    

    public function statusApprovedBy()
    {
        return $this->belongsTo(User::class, 'status_approved_by');
    }

    public function borrowedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }

    public function borrowedBookApprovedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_book_approved_by');
    }


    public function returnedBy()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }

    public function returnedBookApprovedBy()
    {
        return $this->belongsTo(User::class, 'returned_book_approved_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
