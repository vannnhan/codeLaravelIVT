@extends('Admin/Master')
@section('title', 'Thêm Form Mail')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Code: #{{$data->code}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
            <i class="fa fa-globe"></i> {{$data->name}}
            <small class="pull-right">Date: {{$data->created_at}}</small>
            </h2>
        </div>
        <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! $data->content !!}
            </div>
        </div>

        <!-- this row will not appear when printing -->
        <div class="row no-print">
        <div class="col-xs-12">
            <a href="{{route('Form')}}" class="btn btn-primary pull-left"><i class="fa fa-print"></i> Back</a>
            <a type="button" class="btn btn-success pull-right" href="admin/setting/editform/{{$data->id}}"><i class="fa fa-credit-card"></i> Edit
            </a>
        </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
@stop