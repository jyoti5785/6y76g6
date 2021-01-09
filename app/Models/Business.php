<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'business_category')->select('*');
    }
}