<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

use Illuminate\Support\Facades\DB;

class Service extends Model {
	use ObservantTrait;
	
    protected $table = 'Service';

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public static function list(){
        $list = DB::table('service')
                ->join('doctor', 'doctor.id', '=', 'service.doctor_id')
                ->select('service.*', 'doctor.name as doctor_name');
        if($doctor = request('doctor'))
                $list->orderBy('doctor.name')
                     ->get();
        return $list;
    }

}
