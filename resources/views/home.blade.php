@extends('layouts.app')

@section('content')
<input type="hidden" id="page_id" value="doctorinfo">
<div class="container" style="padding-top:100px;">
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
                                    <th>ID</th>
                                    <th width="20%">Specialization</th>
                                    <th width="20%">Doctor</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Phone</th>
                                    <th width="20%">Address</th>
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
@endsection
