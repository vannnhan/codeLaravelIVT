@extends('Admin/Master')
@section('title', 'Quản lý file cá nhân')
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Quản lý file</h3>
        </div>
        <div class="box-body">
          <iframe src="{{asset('')}}laravel-filemanager?type=file" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Quản lý tập tin của nhân viên
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop