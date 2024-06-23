<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gift_id',
        'quantity',
        'date_of_order',
        'buy_date',
        'address',
        'payment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
