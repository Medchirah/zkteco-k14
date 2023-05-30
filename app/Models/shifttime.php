<?php

namespace App\Models;

use App\Models\employe;
use App\Models\tabletime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shifttime extends Model
{
    use HasFactory;
    protected $fillable=['name',
    'date_entre',
    'date_sortie',
    'p_entre',
    'p_sortie',
    'debut_entre',
    'fin_entre',
    'debut_sortie',
    'fin_sortie'];
    
     public function employe()
     {
      return $this->belongsToMany(employe::class,'tabletime');
     }
     public function tabletime()
     {
        return $this->hasMany(tabletime::class);
     }
}
