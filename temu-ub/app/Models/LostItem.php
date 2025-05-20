<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_type',
        'item_name',
        'item_color',
        'description',
        'location_found',
        'date_found',
        'image_path',
        'status',
    ];

    protected $casts = [
        'date_found' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function statusOptions()
    {
        return [
            'unclaimed' => 'Not Retrieved',
            'claimed' => 'Retrieved'
        ];
    }

    public static function typeOptions()
    {
        return [
            'Laptop',
            'Phone',
            'Accessories',
            'Shoes',
            'Utilities',
            'Other'
        ];
    }

    public function getStatusTextAttribute()
    {
        return self::statusOptions()[$this->status] ?? $this->status;
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
    
}
