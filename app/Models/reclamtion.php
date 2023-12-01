<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamtion extends Model
{
    use HasFactory;

    // reclamation has one adherant
    public function adherant(){
        return $this->belongsTo(User::class);
    }

    // reclamation has many feedbacks 
    public function feedbacks(){
        return $this->hasMany( feedback::class,'reclamation_id');
    }
}
