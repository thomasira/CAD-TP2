<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad2City extends Model
{
    use HasFactory;
    protected $fillable = [
        'city'
    ];

    public function student() {
        return $this->hasMany(Cad2Student::class);
    }
}
