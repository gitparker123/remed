<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

use \App\Service;

class ServiceController extends CrudController{

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(Service::list());
		$this->filter->add('doctor_id','Doctor Name','select')->options(\App\Doctor::options());
		$this->filter->add('name', 'Name', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('id', 'ID');
		$this->grid->add('doctor_name', 'Doctor');
		$this->grid->add('name', 'Name');
		$this->grid->add('price', 'Price');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Service());

		$this->edit->label('Edit Service');

		$this->edit->add('doctor_id','Doctor','select')->options(\App\Doctor::options());

		$this->edit->add('name', 'Name', 'text')->rule('required');
	
		$this->edit->add('price', 'Price', 'text')->rule('required');

       
        return $this->returnEditView();
    }    
}
