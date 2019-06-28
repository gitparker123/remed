<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

use Illuminate\Support\Facades\DB;

class Appointment extends Model {
	use ObservantTrait;
	
    protected $table = 'Appointment';

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function list(){
        $list = DB::table('appointment')
                ->join('doctor', 'doctor.id', '=', 'appointment.doctor_id')
                ->join('users', 'users.id', '=', 'appointment.user_id')
                ->select('appointment.*', 'doctor.name as doctor_name', 'users.name as user_name');
        if($doctor = request('doctor'))
                $list->orderBy('doctor.name')
                     ->get();
        return $list;
    }

    public static function time_options() {
        $rows= array();
        for($i = 9; $i <= 16; $i++){
            $rows[$i] = ($i > 12) ? ($i - 11)." AM  ~  ".($i - 12)." PM":($i - 1)." AM  ~  ".$i." AM";
        }
        return $rows;
    }

}
