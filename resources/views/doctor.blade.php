@extends('layouts.app')

@section('content')
<input type="hidden" id="page_id" value="doctorinfo">
<div class="container">
{!! $grid !!}
</div>
@endsection
