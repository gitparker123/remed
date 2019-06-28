<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Grids\DoctorGridInterface;
// use App\Doctor;
// use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Appointment;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function appointment(){
        $options_spec = $this->getSelectList('specialization', '');
        $options_doc  = $this->getSelectList('doctor', ''); 
        return view('appointment', compact('options_spec', 'options_doc'));
    }

    public function docTable(Request $request){
        $data = DB::table ( 'doctor' )->leftJoin('specialization as spec', 'spec.id', '=', 'doctor.spec_id' );
        $search = $request->input('search.value');
        if($search != null){
            $data
                ->where('spec.name', 'like', '%'.$search.'%')
                ->orWhere('doctor.name', 'like', '%'.$search.'%')
                ->orWhere('doctor.email', 'like', '%'.$search.'%')
                ->orWhere('doctor.phone', 'like', '%'.$search.'%')
                ->orWhere('doctor.address', 'like', '%'.$search.'%');
        }
        $data->select ('doctor.id',
                'spec.name as specialization',
                'doctor.name',
                'doctor.email',
                'doctor.phone',
                'doctor.address'
        );
        return datatables()->of($data)
                ->addColumn('action', 'action_button')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
    }
    private function getSelectList($tbl, $where) {
        $data = DB::table($tbl);
        if($tbl == 'doctor' && $where != '-1') $data->where('spec_id', '=', $where);
        $optionlist = $data->get();
        $options = "<option value='-1'> - </option>";
        for($i = 0; $i < count($optionlist); $i++){
            $options .= "<option value='".$optionlist[$i]->id."'>".$optionlist[$i]->name."</option>";
        }
        return $options;
    }
    public function getDocList(Request $request){
        $spec_id = $request->input('spec_id');
        $where = "spec_id = ".$spec_id;
        $options = $this->getSelectList('doctor', $spec_id);
        $result['option'] = 'doclist';
        $result['result'] = "success";
        $result['type'] = $request->input('type');
        $result['options'] = $options;
        echo json_encode($result);exit;
    }
    public function serTable(Request $request){
        $data = DB::table ( 'service' )->leftJoin('doctor', 'doctor.id', '=', 'service.doctor_id' );
        $search = $request->input('search.value');
        if($search != null){
            $data
                ->where('doctor.name', 'like', '%'.$search.'%')
                ->orWhere('service.name', 'like', '%'.$search.'%')
                ->orWhere('service.email', 'like', '%'.$search.'%')
                ->orWhere('service.phone', 'like', '%'.$search.'%')
                ->orWhere('service.address', 'like', '%'.$search.'%');
        }
        $data->select ('service.id',
                'doctor.name as doctor',
                'service.name',
                'service.price',
                'service.note'
        );
        return datatables()->of($data)
                ->addColumn('action', 'action_button')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
    }
    public function appTable(Request $request){
        $user_id = Auth::id();
        $spec_id   = $request->input('specialization');
        $doctor_id = $request->input('doctor');
        $date_from = $request->input('from');
        $date_to   = $request->input('to');
        $data = DB::table ( 'appointment' )
                    ->leftJoin('doctor', 'doctor.id', '=', 'appointment.doctor_id' )
                    ->where('appointment.user_id', '=', $user_id);
        if($spec_id != null && $spec_id != '-1') {
            $data->where('doctor.spec_id', '=', $spec_id);
        }
        if($doctor_id != null && $doctor_id != '-1') {
            $data->where('doctor.id', '=', $doctor_id);
        }
        if($date_from != null && $date_from != '') {
            $data->where('appointment.date_from', '>=', $date_from);
        }
        if($date_to != null && $date_to != '') {
            $data->where('appointment.date_to', '<=', $date_to);
        }
        $data->select ('appointment.id',
                'doctor.name as doctor',
                'appointment.date_from',
                'appointment.date_to',
                'appointment.note',
                'appointment.created_at',
                'appointment.updated_at'
        );
        $action_buttons = '
        <button type="button" name="update" class="btn btn-primary btn-md" data-toggle="modal" data-target="#editbox"><span class="glyphicon glyphicon-edit"></span></button>
        <button type="button" name="delete" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></button>';
        return datatables()->of($data)
                ->addColumn('action', $action_buttons)
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
    }
    public function createAppointment(Request $request){
        $doctor = $request->input('doctor');
        $date_from = $request->input('from');
        $date_to = $request->input('to');
        $note = $request->input('note');
        $newAppointment = new Appointment;
        $newAppointment->user_id = Auth::id();
        $user = Auth::user();
        $user_id = $user->id;
        $newAppointment->user_id = $user_id;
        $newAppointment->doctor_id = $doctor;
        $newAppointment->date_from = $date_from;
        $newAppointment->date_to = $date_to;
        $newAppointment->note = $note;
        $newAppointment->save();
        $result['option'] = 'create_appointment';
        $result['result'] = "success";
        echo json_encode($result);exit;
    }

    public function updateAppointment(Request $request){
        $id = $request->input('id');
        $doctor = $request->input('doctor');
        $date_from = $request->input('from');
        $date_to = $request->input('to');
        $note = $request->input('note');
        $appointment = Appointment::find($id);
        $appointment->doctor_id = $doctor;
        $appointment->date_from = $date_from;
        $appointment->date_to = $date_to;
        $appointment->note = $note;
        $appointment->save();
        $result['option'] = 'update_appointment';
        $result['result'] = "success";
        echo json_encode($result);exit;
    }

    public function deleteAppointment(Request $request){
        $id = $request->input('id');
        $appointment = Appointment::find($id);
        $appointment->delete();
        $result['option'] = 'delete_appointment';
        $result['result'] = "success";
        echo json_encode($result);exit;
    }

}
