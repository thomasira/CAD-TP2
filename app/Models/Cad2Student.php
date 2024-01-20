<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad2Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'd_o_b',
        'user_id',
        'city_id'
    ];
    public $timestamps = false;

    public function city() {
        return $this->belongsTo(Cad2City::class);
    }

    public function blogPost() {
        return $this->hasMany(Cad2BlogPost::class);
    }

    public function user() {
        return $this->hasOne(Cad2User::class);
    }
}
