{{-- {{dd($TotalValueCont)}} --}}
@extends('Admin/Master')
@section('title','Trang chủ')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý hệ thống
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        @if(Auth::user()->role == '1')
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$countCo}}</h3>
  
                <p>Số lượng công ty</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$countCus}}</h3>
  
                <p>Tổng khách hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$contract}}</h3>
  
                <p>Hợp đồng trong tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>Tháng này</h3>
                <p><b>{{number_format($TotalValueCont).' VNĐ'}}</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endif

        <div class="row">
          @if(Auth::user()->role == '1' || Auth::user()->role == '4')
            <div class="col-md-9">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiến độ hợp đồng đang thực hiện</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="progress" class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên hợp đồng</th>
                      <th>Mã hợp đồng</th>
                      <th>Công ty</th>
                      <th>Tiến độ</th>
                      <th style="width: 40px">Progress</th>
                    </tr>
                    <?php $i =1 ?>
                    @foreach($contractProgress as $progress)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$progress->Contracttype['name']}}</td>
                      <td>{{$progress->code}}</td>
                      <td>{{$progress->Company['co_name']}}</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: {{$progress->progress}}%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">{{$progress->progress==null ? 0 : $progress->progress}}%</span></td>
                    </tr>
                    @endforeach
                  </table>
                  <center><a href="admin/contract/show-3">Xem thêm</a></center>
                </div>
              </div>
              <!-- /.box -->
            </div>
          @endif

          @if(Auth::user()->role == '2')
            <div class="col-md-9">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tiến độ hợp đồng</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="progress" class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên hợp đồng</th>
                      <th>Mã hợp đồng</th>
                      <th>Công ty</th>
                      <th>Tiến độ</th>
                      <th style="width: 40px">Progress</th>
                    </tr>
                    <?php $i =1 ?>
                    @foreach($myContractProgress as $progress)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$progress->Contracttype['name']}}</td>
                      <td>{{$progress->code}}</td>
                      <td>{{$progress->Company['co_name']}}</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: {{$progress->progress}}%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">{{$progress->progress==null ? 0 : $progress->progress}}%</span></td>
                    </tr>
                    @endforeach
                  </table>
                  <center><a href="admin/contract/show-3">Xem thêm</a></center>
                </div>
              </div>
              <!-- /.box -->
            </div>
          @endif

          <div class="col-md-3">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Hợp đồng sắp hết hạn</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="progress" class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Mã hợp đồng</th>
                      <th>Công ty</th>
                    </tr>
                    <?php $i =1 ?>
                    @foreach($expiredContract as $expired)
                    <tr>
                      <td>{{$i++}}</td>
                      <td><a href="admin/contract/info/{{$expired->id}}">{{$expired->code}}</a></td>
                      <td>{{$expired->Company['co_name']}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
@stop