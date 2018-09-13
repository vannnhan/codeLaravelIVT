 {{-- {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title', 'Quản lý hợp đồng')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QUẢN LÝ HỢP ĐỒNG
        <small>của nhân viên</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">DANH SÁCH HỢP ĐỒNG</h3>  
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  {{--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>  --}}
                </div> 
            </div>
            @if(Session::has('message'))
              <div class="alert alert-success">
                <strong>Thông báo: </strong>{{Session::get('message')}}<br/>
              </div>
            @endif
            @if(Session::has('redmessage'))
              <div class="alert alert-danger">
                <strong>Thông báo: </strong>{{Session::get('redmessage')}}<br/>
              </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                {{$data->links()}}
                <p><b>Số lượng hợp đồng: {{$data->total()}}</b></p>
                <thead>
                <tr>
                  <th>Tên hợp đồng</th>
                  <th>Mã hợp đồng</th>
                  <th>Của công ty</th>
                  <th>Giá trị</th>
                  <th>Của nhân viên</th>
                  <th>Ngày hết hạn</th>
                  <th>Tình trạng</th>
                  <th>Tiến độ</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $d)
                <tr>
                  <td><a href="admin/contract/info/{{$d->id}}" title="Chi tiết">{{ $d->Contracttype->name }}</a></td>
                  <td>{{ $d->code }}</td>
                  <td>{{ $d->Company['co_name'] }}</td>
                  <td>{{ number_format($d->value) }} VNĐ</td>
                  <td>{{ $d->UserCreated['name'] }}</td>
                  <td>{{ date("d-m-Y",strtotime($d->day_end))}}</td>
                  <td>{!! $d->ContractStatus['name'] !!}</td>
                  <td><span class="badge bg-light-blue">{{$d->progress==null ? 0 : $d->progress}}%</span></td>
                  <td>
                    <a href="admin/contract/info/{{$d->id}}" title="Chi tiết"><i class="fa fa-eye"></i></a>
                    @if(Auth::user()->hasRole('1'))
                    <a href="{{route('DeleteContract',$d->id)}}" title="Xóa hợp đồng"><i class="fa fa-trash"></i></a>
                    @endif
                  </td>
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