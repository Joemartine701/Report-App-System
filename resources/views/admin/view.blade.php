
@extends('home')

@section('content')
@if(Auth::user()->usertype == 'adm')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Weekly Report</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Weekly Report</h6>
    </div>
    <div class="card-body">
        <p></p>
        <p class="mb-0"></p>
    </div>
</div>

@endif
@endsection