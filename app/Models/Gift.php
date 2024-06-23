<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Gift extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'material'
    ];

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
