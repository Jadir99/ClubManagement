<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'feedbacks';
    // feedback has one reclmation
    public function reclamations(){
        return $this->belongsTo(Reclamation::class);
    }

    // feedback has one admin
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
