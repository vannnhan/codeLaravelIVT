{{--  {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title','Danh sách công ty')
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
    @if (isset($message))
      <div class="alert alert-success">
      {{ $message }}
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="row">

      <div class="box-body">
        <div class="col-xs-12">
            <a href="{{route('getAddCompany')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm công ty</a>
        </div>
      </div>

        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">DANH SÁCH CÔNG TY</h3>  
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  {{--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>  --}}
                </div> 
        
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {{$data->links()}}
              <table id="example2" class="table table-bordered table-striped">
                <p><b>Tổng số công ty trong danh sách: {{$data->total()}}</b></p>
                <thead>
                <tr>
                  <th>Tên công ty</th>
                  <th>Mã số thuế</th>
                  <th>Địa chỉ</th>
                  <th>Địa bàn</th>
                  <th>Trạng thái</th>
                  <th>Nhân viên chăm sóc</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $d)
                <tr>
                  <td><a href="admin/company/info/{{$d->id}}">{{$d->co_name}}</td>
                  <td>{{ $d->co_vat }}</td>
                  <td>{{ $d->co_address }}</td>
                  <td>{{ isset($d->City->city_name) ? $d->City->city_name : 'Trống' }}</td>
                  <td>{{ isset($d->Type->cotype_name) ? $d->Type->cotype_name : 'Trống' }}</td>
                  <td>{{ isset($d->UserAssign->name) ? $d->UserAssign->name : 'Tự do' }}</td>
                  <td><a href="admin/company/edit/{{$d->id}}" title="Sửa"><i class="fa fa-edit"></i></a></td>
                </tr>
                @endforeach                
                </tbody>
                {{--  <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>  --}}
              </table>
              {{$data->links()}}
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
