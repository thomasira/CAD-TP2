<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad2Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress',
        'phone',
        'd_o_b',
        'city_id',
        'user_id'
    ];

    public function studentHasCity() {
        return $this->hasOne('App\Models\Cad1City', 'id', 'city_id');
    }

    public function studentHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}

