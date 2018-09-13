<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tiến độ hợp đồng #{{$data->code}}</title>
  <base href="{{asset('')}}">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="Theme/Customer/Timeline/css/style.css">
  <link rel="stylesheet" href="Theme/Customer/Timeline/css/style-per.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
</head>

<body>
   <div class="timeline-container">
    <img src="images/logo.png" alt="Công ty môi trường Vạn Liên Hoa" width="auto">
    <h1 class="project-name">Tiến độ hợp đồng #{{$data->code}}</h1>
    <div class="holder">
      <div class="bar cf" data-percent="{{$data->progress==null ? 0 : $data->progress}}%"><span class="label">Tiến độ</span></div>
    </div>
    <div id="timeline">
        
        @if($data->status == '4')
          <div class="timeline-item">
            <div class="timeline-icon success">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
            </div>
            <div class="timeline-content right">
              <h2><center>{{$data->updated_at}}</center></h2>
              <h2>Hoàn thành hợp đồng #{{$data->code}}</h2>
              <span class="time-stamp">Thời gian: <b>{{date('H:i d-m-Y',strtotime($data->updated_at))}}<b></b></span>

              <p>
                  Hồ sơ của quý khách đã hoàn tất<br/>
              </p>
              
            </div>
          </div>
        @endif

        <?php $i=1 ?>
        @foreach($data->ContractAction as $d)
          <?php $i++ ?>
          <div class="timeline-item">
            <div class="timeline-icon">
              <i class="fa {{$i%2==0 ? ' fa-arrow-circle-left'  : 'fa-arrow-circle-right'}}" aria-hidden="true"></i>
            </div>
            <div class="timeline-content {{$i%2==0 ? ''  : 'right'}}">
              <h2>
                <center>
                  <span class="time-stamp"><b>{{date('H:i d-m-Y',strtotime($data->created_at))}}<b></b></span>
                </center>
              </h2>
              <h2>{{$d->name}}</h2>
              <p>
                  {{$d->note}}<br/>
                  @if($d->images!==null)
                  <a href="{{$d->images}}" target="_blank"><img src="{{$d->images}}" width="200px" alt="Vạn Liên Hoa" class="margin"></a>
                  @endif
              </p>
              
            </div>
          </div>
        @endforeach

        <div class="timeline-item right">
          <div class="timeline-icon success">
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <div class="timeline-content">
            <h2><center>{{$data->created_at}}</center></h2>
            <h2>Hợp đồng bắt đầu có hiệu lực</h2>
            <p>
              Hợp đồng <b>#{{$data->code}}<br/>
              {{$data->Contracttype->name}}</b> được khởi tạo.<br/>
              Ngày bắt đầu: <b>{{$data->day_begin}}</b><br/>
              Ngày kết thúc: <b>{{$data->day_end}}</b><br/>
            </p>
            
          </div>
        </div>    

    </div>

  </div>
  </div>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="Theme/Customer/Timeline/js/index.js"></script>
<script src="Theme/Customer/Timeline/js/js-per.js"></script>
</html>
