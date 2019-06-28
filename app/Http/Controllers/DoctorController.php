<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use \App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends CrudController{

    public function all($entity){
		parent::all($entity); 
		$this->filter = \DataFilter::source(Doctor::list());
		$this->filter->add('spec_id','Specialization','select')->options(\App\Specialization::options());
		$this->filter->add('name', 'Name', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('spec_name','Specialization');
		$this->grid->add('name', 'Name');
		$this->grid->add('email', 'Email');
		$this->grid->add('phone', 'PhoneNumber');
		$this->grid->add('address', 'Address');
		$this->addStylesToGrid();

                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Doctor());

		$this->edit->label('Edit Doctor');

		$this->edit->add('spec_id','Specialization','select')->options(\App\Specialization::options());

		$this->edit->add('name', 'Name', 'text');
	
		$this->edit->add('email', 'Email', 'text')->rule('required');

		$this->edit->add('phone', 'PhoneNumber', 'text')->rule('required');

		$this->edit->add('address', 'Address', 'text')->rule('required');
       
        return $this->returnEditView();
    }    
}
