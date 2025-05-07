<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'description',
        'location_found',
        'date_found',
        'image_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
