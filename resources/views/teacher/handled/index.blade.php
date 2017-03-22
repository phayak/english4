@extends('layouts.teacher')

@section('addclass') opened @endsection
@section('addclass_ul') display: block; @endsection
@section('active_sub_hand') menu-active @endsection

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
                                    <i class="font-icon font-icon-expand"></i>
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
                                <th align="center"><div>Action</div></th>
                                <th align="center"><div>comment</div></th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach ($data AS $booked)
                            <tr>
                                <td nowrap align="center"><span class="semibold">{{$i}}</span></td>
                                <td nowrap align="center"><span class="semibold"><?php echo \Carbon\Carbon::parse($booked['date'])->format('d/m/Y'); ?></span> </td>
                                <td nowrap align="center"><?php echo \Carbon\Carbon::parse($booked['start_time'])->addMinutes(60)->format('H:i a'); ?> - <?php echo \Carbon\Carbon::parse($booked['end_time'])->addMinutes(60)->format('H:i a'); ?></td>
                                <td  align="center">
                                    <a href="javascript:void(0)" onclick="window.open('/admin/teacher/regularclass/'+{{$booked['user_id']}}, 'newwindow', 'width=800, height=900'); return false;">
                                    {{$booked['name']}}
                                    </a>
                                </td>
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
                                    @if($booked['datetime_start'] > $timenow)
                                    <a class="btn btn-sm btn-success"><i class="fa fa-external-link" aria-hidden="true"></i> wait</a>
                                    @elseif(($booked['datetime_end'] >= $timenow) AND ($booked['datetime_start'] <= $timenow))
                                    <a href="https://appear.in/english4speak-{{$booked['room_video']}}" target="_bank" class="btn btn-sm btn-info"><i class="fa fa-external-link" aria-hidden="true"></i> link</a>
                                    @elseif($booked['datetime_end'] < $timenow)
                                    <!-- <a class="btn btn-danger">Pass</a> -->
                                    @else
                                    <!-- <a class="btn btn-danger">No</a> -->
                                    @endif
                                    
                                </td>
                                <td  align="center">
                                    @if($booked['status'] == 0)
                                    <span class="label label-warning">wait</span>
                                    @elseif($booked['status'] == 1)
                                    <span class="label label-success">Past</span>
                                    @elseif($booked['status'] == 2)
                                    <span class="label label-danger">miss</span>
                                    @else
                                    <span class="label label-default">offset</span>
                                    @endif
                                </td>
                                <td  align="center">
                                    @if($booked['class_type'] == 1)
                                        Trial
                                    @else
                                        Nomal
                                    @endif
                                </td>

                                
                                <td  align="center">
                                    <select name="order_id" id="select_wait" class="bootstrap-select bootstrap-select-arrow">
                                        @if($booked['status'] == 0)
                                            <option value="" style="display: none;">wait</option>
                                            <option id="{{$booked['booking_id']}}" value="1">past</option>
                                            <option id="{{$booked['booking_id']}}" value="2">miss</option>
                                            <option id="{{$booked['booking_id']}}" value="3">offset</option>
                                        @elseif($booked['status'] == 1)
                                            <option value="" style="display: none;">wait</option>
                                            <option id="{{$booked['booking_id']}}" value="1" selected class="selectpass">past</option>
                                            <option id="{{$booked['booking_id']}}" value="2">miss</option>
                                            <option id="{{$booked['booking_id']}}" value="3">offset</option>
                                        @elseif($booked['status'] == 2)
                                            <option value="" style="display: none;">wait</option>
                                            <option id="{{$booked['booking_id']}}" value="1">past</option>
                                            <option id="{{$booked['booking_id']}}" value="2" selected class="selectpass">miss</option>
                                            <option id="{{$booked['booking_id']}}" value="3">offset</option>
                                        @else
                                            <option value="" style="display: none;">wait</option>
                                            <option id="{{$booked['booking_id']}}" value="1">past</option>
                                            <option id="{{$booked['booking_id']}}" value="2">miss</option>
                                            <option id="{{$booked['booking_id']}}" value="3" selected class="selectpass">offset</option>
                                        @endif
                                       
                                    </select>
                                </td>
                                <td  align="center">
                                    <!-- {{url('/admin/teacher/comment?class_teacher_id='.$booked['booking_id'].'&&userid='.$booked['user_id'])}} -->
                                    <a href="javascript:void(0)" onclick="window.open('/admin/teacher/comment?class_teacher_id='+{{$booked['booking_id']}}+'&&userid='+{{$booked['user_id']}}, 'newwindow', 'width=800, height=900'); return false;"  class="btn btn-info btn-sm">comment ({{$booked['comment']}})</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                          

                        </table>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->

           
        </div>

    </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')
<script src="{{asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/lib/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

<script>

$(document).ready(function(){

    var token = window.Laravel.csrfToken;
    
    $('tr td #select_wait').change(function() {
        var value = $(this)[0].value;
        var select_id = $(this).find(':selected').attr('id');
        // console.log(select_id+'-'+value);
        $.ajax({
            url: "{{url('admin/teacher/handled/action')}}",
            type: 'POST',
            dataType: 'json',
            data: {_token: token,booking_id: select_id,val:value},
            success: function (data) {
                console.log(data);

            },
            error: function (data) {
                // Error while calling the controller (HTTP Response Code different as 200 OK
                console.log('Error:', data);
            }
        });

        location.reload();
    });

    
});    
</script>
@endsection
