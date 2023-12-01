<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    // feedback has one reclmation
    public function reclamations(){
        return $this->belongsTo(reclamtion::class);
    }

    // feedback has one admin
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
