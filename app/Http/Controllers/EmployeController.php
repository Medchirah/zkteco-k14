<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeController extends Controller
{
    
    public function report(Request $request,)
    {
        DB::table('newtables')->truncate();
        $employes=DB::table('employes');
       
        $employes=$employes
        ->select()
        ->leftjoin('departements','employes.departement_id','departements.id')
        
        ->leftjoin('devices','devices.id','employes.device_id')
        ->leftjoin('tabletimes','tabletimes.employe_id','employes.id')
        ->leftjoin('shifttimes','shifttime_id','shifttimes.id')
       ->leftJoin('timerecords','timerecords.employe_id','employes.id')
        ->get();
        


       foreach ($employes as $employe) {
                
                $entre=Carbon::parse($employe->date_entre);
                $sortie=Carbon::parse($employe->date_sortie);
                $time_in= Carbon::parse($employe->time_in);
                $time_out=Carbon::parse($employe->time_out);
                if ($time_in>=$entre) {
                    $diff=$time_in->diff($entre)->format('%H:%I:%S');
                    $diff1="00:00:00";
                }
                else if($time_in<=$entre)
                     {
                        $diff="00:00:00";
                        $diff1=$entre->diff($time_in)->format('%H:%I:%S');} 
                if ($sortie>=$time_out) {
                    $diff3="00:00:00";
                    $diff2=$sortie->diff( $time_out)->format('%H:%I:%S');
                }   
                else if($sortie<=$time_out) {
                      $diff3=$sortie->diff( $time_out)->format('%H:%I:%S');
                      $diff2="00:00:00";
                    } 
                     
                
                DB::table('newtables')->insert([
                'nom_employe' => $employe->nom,
                'nom_departement' => $employe->nomDept,
                'gender' => $employe->gender,
                'date debut de thavaille' =>$employe->date_travail,
                'device' => $employe->nomDevice,
                'shifttime' => $employe->name,
                'check-In' => $employe->time_in,
                'check-out' => $employe->time_out,
                'duration' => $employe->durration,
               
                'late_in'=> $diff ,
                'early_in'=> $diff1 ,
                'early_out'=> $diff2,
                'late_out'=> $diff3 ,
                'date jour' => $employe->created_at,

                // Insérez d'autres colonnes de jointure ici
            ]);
        }
       
        return view('report',['employes'=>$employes]);
       
    }
}
