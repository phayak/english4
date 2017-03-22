@extends('layouts.teacher')

@section('addclass') opened @endsection
@section('addclass_ul') display: block; @endsection
@section('active_sub_book') menu-active @endsection

@section('style')
<style type="text/css">
    .box-typical.box-typical-dashboard {
        height: 400px !important;
    }
</style>

@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Booked Class : Teacher</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Booked Class</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
        <div class="row">
            
            <div class="col-xl-12">
                <section class="box-typical box-typical-dashboard" style="height: 700px !important;">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>All User Booked Class</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <button type="button" class="action-btn action-btn-expand">
                                    Click Zoom <i class="font-icon font-icon-expand"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <table class="tbl-typical">
                            <tr>
                                <th align="center"><div>#</div></th>
                                <th align="center"><div>Date</div></th>
                                <th align="center"><div>Time</div></th>
                                <th align="center"><div>Nick Name</div></th>
                                <th align="center"><div>Age</div></th>
                                <th align="center"><div>Sex</div></th>
                                <th align="center"><div>video call</div></th>
                                <th align="center"><div>Status</div></th>
                                <th align="center"><div>Class type</div></th>
                                <th align="center"><div>Note</div></th>
                                <th align="center"><div>Action</div></th>
                            </tr>
                            <?php $i=1; ?>
                            @if($data != '0')
                            @foreach ($data AS $booked)
                            <tr>
                                <td nowrap align="center"><span class="semibold">{{$i}}</span></td>
                                <td nowrap align="center"><span class="semibold"><?php echo \Carbon\Carbon::parse($booked['date'])->format('d/m/Y'); ?></span> </td>
                                <td nowrap align="center"><?php echo \Carbon\Carbon::parse($booked['start_time'])->addMinutes(60)->format('H:i a'); ?> - <?php echo \Carbon\Carbon::parse($booked['end_time'])->addMinutes(60)->format('H:i a'); ?></td>
                                <td  align="center">{{$booked['name']}}</td>
                                <td  align="center">
                                @if(!($booked['birth_date'] == '' || $booked['birth_date'] == NULL))
                                    <?php $_age = floor((time() - strtotime($booked['birth_date'])) / 31556926); echo $_age; ?>
                                @else
                                    -
                                @endif
                                </td>
                                <td  align="center">
                                @if(!($booked['sex'] == '' || $booked['sex'] == NULL))
                                    @if($booked['sex'] == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                @else
                                    -
                                @endif
                                </td>
                                <td  align="center">
                                    @if($booked['datetime_start'] > $timeVdo)
                                    <a class="btn btn-sm btn-success"><i class="fa fa-external-link" aria-hidden="true"></i> wait</a>
                                    @elseif(($booked['datetime_end'] >= $timenow) AND ($booked['datetime_start'] <= $timeVdo))
                                    <a href="https://appear.in/english4speak-{{$booked['room_video']}}" target="_bank" class="btn btn-sm btn-info"><i class="fa fa-external-link" aria-hidden="true"></i> link</a>
                                    @elseif($booked['datetime_end'] < $timeVdo)
                                    <!-- <a class="btn btn-danger">Pass</a> -->
                                    -
                                    @else
                                    <!-- <a class="btn btn-danger">No</a> -->-
                                    @endif
                                    
                                </td>
                                <td  align="center">
                                    @if($booked['datetime_start'] > $timeVdo)
                                    waiting
                                    @elseif(($booked['datetime_end'] >= $timenow) AND ($booked['datetime_start'] <= $timeVdo))
                                    learning
                                    @elseif($booked['datetime_end'] < $timeVdo)
                                    Past
                                    @else
                                    <!-- <a class="btn btn-danger">No</a> -->
                                    @endif
                                </td>
                                <td  align="center">
                             
                                    <?php 
                                    switch ($booked['class_type']) {
                                        case "1":
                                            echo 'Trial';
                                            break;
                                        case "2":
                                            echo 'Nomal';
                                            break;
                                        case "3":
                                            echo 'Makeup';
                                            break;
                                        default:
                                            echo "Unknown";
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    @if($booked['datetime_start'] > $timenow)
                                    <span class="label label-warning">waiting</span>
                                    @elseif(($booked['datetime_end'] >= $timenow) AND ($booked['datetime_start'] <= $timenow))
        
                                        @if($booked['class_type'] == 1)
                                            <a href="javascript:void(0)" onclick="window.open('/admin/teacher/trialclass/create?userid='+{{$booked['user_id']}}+'&&booking_id='+{{$booked['booking_id']}}, 'newwindow', 'width=800, height=900'); return false;" class="btn btn-sm btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> note</a>
                                        @else
                                            <a href="javascript:void(0)" onclick="window.open('/admin/teacher/regularclass/create?userid='+{{$booked['user_id']}}+'&&booking_id='+{{$booked['booking_id']}}, 'newwindow', 'width=800, height=900'); return false;" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> note</a>
                                            
                                        @endif
                                    @elseif($booked['datetime_end'] < $timenow)
                                    <!-- assessment -->
                                        @if($booked['class_type'] == 1)
                                             <a href="javascript:void(0)" onclick="window.open('/admin/teacher/trialclass/create?userid='+{{$booked['user_id']}}+'&&booking_id='+{{$booked['booking_id']}}, 'newwindow', 'width=800, height=900'); return false;" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> note</a>
                                        @else
                                            <a href="javascript:void(0)" onclick="window.open('/admin/teacher/regularclass/create?userid='+{{$booked['user_id']}}+'&&booking_id='+{{$booked['booking_id']}}, 'newwindow', 'width=800, height=900'); return false;" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> note</a>
                                            
                                        @endif
                                    
                                    @else
                                    <!-- <a class="btn btn-danger">No</a> -->
                                    @endif
                                </td>
                                <td  align="center">
                                
                                     <a href="{{url('admin/teacher/trialclass/create')}}" target="_blank" class="btn btn-sm btn-danger">Student's Profile</a>
                                    
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            @else
                            <br><br>
                            <center><h3>- No Data -</h3></center>
                            @endif

                        </table>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->

           
        </div>

    </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')

<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
