{{-- {{dd($data)}} --}}
@extends('Admin/Master')
@section('title','Tìm kiếm công ty')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DANH SÁCH CÔNG TY CẦN TÌM
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @if(!isset($data))
        <div class="box-body">
        <center><H1>Không có công ty nào</H1></center>
        </div>
        @else
        @foreach($data as $d)
        <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Tên công ty</th>
                      <th>Mã số thuế</th>
                      <th>Địa chỉ</th>
                      <th>Địa bàn</th>
                      <th>Trạng thái</th>
                      <th>Nhân viên chăm sóc</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="admin/company/info/{{$d->id}}">{{$d->co_name}}</td>
                      <td>{{ $d->co_vat }}</td>
                      <td>{{ $d->co_address }}</td>
                      <td>{{ $d->City->city_name }}</td>
                      <td>{{ $d->Type->cotype_name }}</td>
                      <td>{{ $d->user_assign }}</td>
                    </tr>
                  </tbody>
                </table>

              </div>
        @endforeach
        @endif
    </section>
    <!-- /.content -->
</div>
@stop
