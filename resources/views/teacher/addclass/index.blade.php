@extends('layouts.teacher')

@section('addclass') opened @endsection
@section('addclass_ul') display: block; @endsection
@section('active_sub_schedule') menu-active @endsection

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
                            <h3>My Schedule : Teacher</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Schedule</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
        <div class="row">
            
            <div class="col-xl-12">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Today Class : <?php echo \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d H:i A'); ?> Philippines Time</h3>
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
                                <th align="center"><div>Create Date & Time</div></th>
                                <th align="center"><div>Update Date & Time</div></th>
                                <th align="center"><div>Option</div></th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($TeacherTimes AS $teacher)
                            <tr>
                                <td nowrap align="center"><span class="semibold">{{$i}}</span></td>
                                <td nowrap align="center"><span class="semibold"> {{ $teacher->date_teacher->format('d/m/Y') }}</span></td>
                                <td nowrap align="center">
                                    <?php echo \Carbon\Carbon::parse($teacher->crated_at)->format('d/m/Y'); ?> | <?php echo \Carbon\Carbon::parse($teacher->crated_at)->format('H:i'); ?>
                                
                                </td>

                                <td nowrap align="center"><?php echo \Carbon\Carbon::parse($teacher->updated_at)->format('d/m/Y'); ?> | <?php echo \Carbon\Carbon::parse($teacher->updated_at)->format('H:i'); ?></td>
                                <td align="center">
                                    <a href="{{url('admin/teacher/class/'.$teacher->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
                                   <!--  <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</button> -->
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

<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
