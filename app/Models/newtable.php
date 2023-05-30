<?php

namespace App\Models;

use App\Models\employe;
use App\Models\departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class newtable extends Model
{
    use HasFactory;
    protected $fillable=['nom_employe','nom_departement','gender','date debut de thavaille','device','shifttime','check-In','check-out','duration','date jour','late_in','late_out','early_in','early_out'];
    
}
