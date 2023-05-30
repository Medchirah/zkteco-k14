<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\employe;
use App\Models\shifttime;
use App\Models\tabletime;
use App\Models\timerecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class timerecord extends Model
{
    use HasFactory;
    protected $fillable=['employe_id','device_id','time_in','time_out','durration','tabletime_id'];
    public function device()
    {
        return $this->belongsTo(device::class);
    }
    public function employe()
    {
        return $this->belongsTo(employe::class);
    }
    public function tabletime()
    {
        return $this->belongsTo(tabletime::class);
    }

   
    
   
   
    public function getDurrationAttribute()
    {
        if ($this->time_in && $this->time_out) {
            $timeIn = Carbon::parse($this->time_in);
            $timeOut = Carbon::parse($this->time_out);

            $duration = $timeOut->diff($timeIn);
            $hours = $duration->h;
            $minutes = $duration->i;
            $seconds = $duration->s;
            
            
            $formattedDuration= "$hours:$minutes:$seconds";
            $this->setAttribute('durration', $formattedDuration);
            $this->save();
            return $formattedDuration;
        }
        return null;
    }
    
    public function calculateLateIn()
    {
       /* $dateEntre = $this->tabletime/*->timerecord->first()->shifttime->date_entre; // Récupérer l'emploi du temps de l'employé
        $scheduledArrivalTime = Carbon::parse($dateEntre); // Convertir l'heure d'arrivée spécifiée en objet Carbon
        $actualArrivalTime = Carbon::parse($this->time_in); // Convertir l'heure d'arrivée enregistrée en objet Carbon

        if ($actualArrivalTime->greaterThan($scheduledArrivalTime)) {
            $lateInMinutes = $actualArrivalTime->diffInMinutes($scheduledArrivalTime);
        } else {
            $lateInMinutes = 0; // Pas de retard
        }

        $this->late_in = $lateInMinutes;
        $this->save();
        */
        $employeId = 1;
        $timerecord=timerecord->leftjoin('employes','timerecords.employes_id','employes.id')
        
        ->leftjoin('tabletimes','tabletimes.employes_id','timerecords.employes_id')
        ->leftjoin('shifttime','timerecords.shifttime_id','shifttime.id');
        

    }
    
}