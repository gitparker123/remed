<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

use Illuminate\Support\Facades\DB;

class Doctor extends Model {
	use ObservantTrait;
	
    protected $table = 'Doctor';

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }

    public static function service(){
        return $this->hasMany('App\Service');
    }

    public static function options() {
        $list = DB::table('doctor')->get();
        $rows= array();
        for($i = 0; $i < count($list); $i++){
            $rows[$list[$i]->id] = $list[$i]->name;
        }
        return $rows;
    }

    public static function list(){
        $list = DB::table('doctor')
                ->join('specialization', 'specialization.id', '=', 'doctor.spec_id')
                ->select('doctor.*', 'specialization.name as spec_name');
        if($spec = request('specialization'))
                $list->orderBy('specialization.name')
                     ->get();
        return $list;
    }

    public static function list_view(){
        return DB::table('doctor')
                ->join('specialization', 'specialization.id', '=', 'doctor.spec_id')
                ->select('doctor.*', 'specialization.name as spec_name')
                ->paginate(10);
    }
}
