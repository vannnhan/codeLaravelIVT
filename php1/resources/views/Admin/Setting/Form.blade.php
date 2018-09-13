@extends('Admin/Master')
@section('title', 'Quản lý loại hợp đồng')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form email
            <small>Form email gửi khách hàng</small>
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
          {{--  <div class="callout callout-info">
            <h4>Danh sách thành phố !</h4>
          </div>  --}}
    
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh Sách Form Email</h3>
                </div>
                <!-- Thông báo lỗi --> 
                @if (count($errors) > 0)
                <div class="callout callout-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
                @endif
                @if(Session::has('message'))
                  <div class="alert alert-success">
                    <li>{{Session::get('message')}}</li>
                  </div>
                @endif
                <!-- Kết thúc thông báo lỗi -->

                <div class="box-body">
                  <a type="button" class="btn btn-default" href="{{route('addForm')}}">Thêm Form</a>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Tên</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
      
                      @foreach($data as $d)                      
                      <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->code}}</td>
                        <td>{{$d->name}}</td>
                        <td>
                          <a type="button" class="btn btn-default" href="admin/setting/formview/{{$d->id}}">View</a>
                          <a type="button" class="btn btn-default" href="admin/setting/editform/{{$d->id}}">Edit</a>
                        </td>
                      </tr>
                      @endforeach                
                      </tbody>
                    </table>
                </div>

              </div>
            </div>
          </div>           
        </section>
        <!-- /.content -->
      </div>
@stop