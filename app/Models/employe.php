<?php

namespace App\Models;

use App\Models\device;
use App\Models\shifttime;
use App\Models\tabletime;
use App\Models\timerecord;
use App\Models\departement;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employe extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable=['nom','device_id',
    'nomDept',
    'nomDevice',
    'photo',
    'gender',
    'empriente',
    'date_travail',
    'departement_id'
    ];
    public function departement()
    {
        return $this->belongsTo(departement::class);
    }
    
    public function timerecord()
    {
   
       return $this->hasMany(timerecord::class);
    }
    public function device()
    {
   
       return $this->belongsTo(device::class);
    }
    public function tabletime(): HasMany
    {
        return $this->hasMany(tabletime::class);
    }
    public function shifttime(): HasMany
    {
        return $this->belongsToMany(shifttime::class);
    }
}
