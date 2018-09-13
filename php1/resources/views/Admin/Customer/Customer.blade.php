{{--  {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title', 'Danh sách khách hàng')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            QUẢN LÝ KHÁCH HÀNG
            <small>của nhân viên </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Vạn Liên Hoa</a></li>
            <li><a href="#">Công ty</a></li>
            <li class="active">Danh sách</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">    
            <div class="col-xs-12">
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">DANH SÁCH KHÁCH HÀNG</h3>  
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      {{--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>  --}}
                    </div> 
            
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Tên khách hàng</th>
                      <th>Điện thoại</th>
                      <th>Email</th>
                      <th>Công ty</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
    
                    @foreach($data as $d)
                    <tr>
                      <td>{{ $d->cus_name }}</td>
                      <td>{{ $d->cus_phone }}</td>
                      <td>{{ $d->cus_email }}</td>
                      <td>{{ $d->Company['co_name']}}</td>
                      <td><a href="admin/customer/edit/{{$d->id}}" title="Sửa" ><i class="fa fa-edit"></i></a></td>
                    </tr>
                    @endforeach
    
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
</div>
@stop