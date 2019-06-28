<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

use \App\Appointment;

class AppointmentController extends CrudController{

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(Appointment::list());
		$this->filter->add('doctor_id','Doctor Name','select')->options(\App\Doctor::options());
		$this->filter->add('user_id','User Name','select')->options(\App\User::options());
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('id', 'ID');
		$this->grid->add('doctor_name', 'Doctor');
		$this->grid->add('user_name', 'User');
		$this->grid->add('rdate', 'Date');
		$this->grid->add('time', 'Time');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Appointment());

		$this->edit->label('Edit Appointment');

		$this->edit->add('doctor_id','Doctor','select')->options(\App\Doctor::options());

		$this->edit->add('user_id','User','select')->options(\App\User::options());
	
		$this->edit->add('rdate', 'Date', 'text')->rule('required');

		$this->edit->add('time','Time','select')->options(\App\Appointment::time_options());
       
        return $this->returnEditView();
    }    
}
