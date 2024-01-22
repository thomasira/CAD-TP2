<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad2Blogpost extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'article',
        'student_id',
        'created_at',
        'updated_at'
    ];
    public function student() {
        return $this->belongsTo(Cad2Student::class, 'student_id', 'user_id');
    }
}