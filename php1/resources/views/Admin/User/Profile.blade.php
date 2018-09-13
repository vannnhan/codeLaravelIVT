@extends('Admin\Master')
@section('title', 'Trang thông tin cá nhân')
@section('main')  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        User Profile
    </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-12">

        <!-- Profile Image -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('upload/user/{{Auth::user()->cover != null ? Auth::user()->user.'/' : ''}}{{Auth::user()->cover != null ? 'cover/' : ''}}{{Auth::user()->cover!= null ? Auth::user()->cover : 'cover.jpg'}}') center center;">
                <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
                <h5 class="widget-user-desc">{{Auth::user()->Role['name']}}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="upload/user/{{Auth::user()->avatar != "avatar.png" ? Auth::user()->user.'/' : ''}}{{Auth::user()->avatar != "avatar.png" ? 'avatar/' : ''}}{{Auth::user()->avatar}}" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                <div class="col-sm-4 border-right">

                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">

                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                    <h5 class="description-header">
                        <button data-toggle="modal" data-target="#modal-avatar" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Đổi Avatar</button>
                        <button data-toggle="modal" data-target="#modal-cover" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Đổi Cover</button>
                    </h5>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>

        </div>
        <!-- /.col -->
        <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Thông tin</a></li>
            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
            <div class="active tab-pane" id="activity">
                
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                        <span class="bg-red">
                        10 Feb. 2014
                        </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                        <span class="bg-green">
                        3 Jan. 2014
                        </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
                </ul>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">

            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<form action="{{route('UpdateAvatarCover', Auth::id() )}}" method="POST" role="form" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal fade" id="modal-avatar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sửa avatar</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{$data->cover}}" name="old_cover">    
                    <input type="hidden" value="{{$data->avatar}}" name="old_avatar">
                    <input type="hidden" value="{{$data->user}}" name="old_user"> 
                    <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" name="profile_avatar">
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

<form action="{{route('UpdateAvatarCover', Auth::id() )}}" method="POST" role="form" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="modal fade" id="modal-cover">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sửa Cover</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{$data->avatar}}" name="old_avatar">    
                    <input type="hidden" value="{{$data->cover}}" name="old_cover">
                    <input type="hidden" value="{{$data->user}}" name="old_user"> 
                    <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" name="profile_cover">
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>
@stop