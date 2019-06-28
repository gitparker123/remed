<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;
use Illuminate\Support\Facades\DB;

class Specialization extends Model {
	use ObservantTrait;
	
    protected $table = 'Specialization';

    public static function doctor(){
        return $this->hasMany('App\Doctor');
    }

    public static function options() {
        $list = DB::table('specialization')->get();
        $rows= array();
        for($i = 0; $i < count($list); $i++){
            $rows[$list[$i]->id] = $list[$i]->name;
        }
        return $rows;
    }

}
