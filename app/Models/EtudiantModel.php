<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantModel extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $fillable = ["*"];
    
    protected $primaryKey = "id";
}
