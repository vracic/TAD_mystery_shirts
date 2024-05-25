<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function shirt() {
        return $this->hasOne(Shirt::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('size');
    }
}
