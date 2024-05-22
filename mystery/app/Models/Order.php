<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function package() {
        return $this->hasOne(Package::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
