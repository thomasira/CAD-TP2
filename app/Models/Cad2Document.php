<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad2Document extends Model
{
    use HasFactory;
    
        public $fillable = [
            'name',
            'filename',
            'student_id'
        ];

        public function student() {
            return $this->belongsTo(Cad2Student::class, 'student_id', 'user_id');
        }
}
