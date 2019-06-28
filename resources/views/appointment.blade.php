@extends('layouts.app')

@section('content')
<style>
.no-padding {
    padding:0px;
}
.no-padding-left {
    padding-left:0px;
}
#date_from .add-on, #date_to .add-on, #c_date_from .add-on, #c_date_to .add-on {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-left:-1px;
}
#from, #to, #c_from, #c_to {
    width:75%;
    height:33px;
}
#dataTable_length select {
    width:100px;
}
.dropdown-menu {
    z-index:10000;
}
</style>
<input type="hidden" id="page_id" value="appointment">
<div class="container" style="padding-top:100px;">
    <div class="row justify-content-center">
        <form id="search_form" action="#" method="get">
        <div class="col-md-3">
            <div class="form-group">
                <div class='input-group date'>
                    <span class="input-group-addon">specialization</span>
                    <select type='text' class="form-control" id="specialization" name="specialization">
                    {!! $options_spec !!}
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2 no-padding-left">
            <div class="form-group">
                <div class='input-group date'>
                    <span class="input-group-addon">doctor</span>
                    <select type='text' class="form-control" id="doctor" name="doctor">
                    {!! $options_doc !!}
                    </select>
                </div>
            </div>
        </div>
        <div class='col-md-2 no-padding-left'>
            <div class="form-group">
                <div id="date_from" class="input-group input-append">
                  <input id="from" name="from" data-format="yyyy-MM-dd" type="text"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </i>
                  </span>
                </div>
            </div>
        </div>
        <div class='col-md-2 no-padding-left'>
            <div class="form-group">
                <div id="date_to" class="input-group input-append">
                  <input id="to" name="to" data-format="yyyy-MM-dd" type="text"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </i>
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        <button type="submit" id="search" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
        <button type="button" id="create" class="btn btn-primary" data-toggle="modal" data-target="#editbox"><span class="glyphicon glyphicon-ok"></span> Create </button>
        </div>
    </form>
    </div>
    <div class="row justify-content-center">
        <div class= "col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <!-- <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; margin-top:20px;margin-bottom:20px;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table" cellspacing="0" width="100%" id = "dataTable" name ="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">Doctor</th>
                                    <th width="15%">From</th>
                                    <th width="15%">To</th>
                                    <th width="15%">Note</th>
                                    <th width="15%">Create Time</th>
                                    <th width="15%">Update Time</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
            </div>                
        </div>
    </div>
</div>
<!-- Modal -->
<button id="open_editbox" style="display:none;" data-toggle="modal" data-target="#editbox"></button>
<div class="modal fade" id="editbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Create Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="create_form" action="#">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <label class="control-label col-sm-3" for="c_specialization">Specialization:</label>
                <div class="col-sm-9">
                <select type='text' class="form-control" id="c_specialization" name="specialization">
                    {!! $options_spec !!}
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="c_doctor">Doctor:</label>
                <div class="col-sm-9">
                <select type='text' class="form-control" id="c_doctor" name="doctor">
                    {!! $options_doc !!}
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="c_date_from">Password:</label>
                <div class="col-sm-4"> 
                    <div id="c_date_from" class="input-group input-append">
                    <input id="c_from" name="from" data-format="yyyy-MM-dd HH:mm" type="text"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </i>
                    </span>
                    </div>
                </div>
                <div class="col-sm-4"> 
                    <div id="c_date_to" class="input-group input-append">
                    <input id="c_to" name="to" data-format="yyyy-MM-dd HH:mm" type="text"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </i>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="note">Description:</label>
                <div class="col-sm-9">
                <textarea id="note" name="note" style="width:100%;height:50px;"></textarea>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection
