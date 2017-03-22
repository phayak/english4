@extends('layouts.teacher')

@section('addclass') opened @endsection
@section('addclass_ul') display: block; @endsection
@section('active_sub_new') menu-active @endsection
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugin/datepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Add Class : Teacher</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Add Class</a></li>
                                <li class="active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>

            <section class="card">
                <div class="card-block">    
                    <form action="{{url('admin/teacher/class')}}" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <h5 class="with-border">Today : <?php echo $today_PH; ?> Philippines Time</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInput">choice</label>
                                <div class="input-group date">
                                  <input type="text" id="datepicker-ajax" class="form-control" name="date" readonly value="<?php echo \Carbon\Carbon::Now('Asia/Manila')->format('d/m/Y'); ?>"><span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                               <!--  <div class='input-group date'>
                                    <input id="daterange3" ata-date-end-date="+2d" type="text" value="" class="form-control">
                                    <span class="input-group-addon">
                                        <i class="font-icon font-icon-calend"></i>
                                    </span>
                                </div> -->
                            </div>
                        </div>
<!--                         <div class="col-md-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Start Time</label>
                                <input type="time" class="form-control maxlength-simple" id="exampleInput" name="start_time" placeholder="start_time" maxlength="15">
                            </fieldset>
                        </div> -->
                    </div><!--.row-->

                    <h5 class="with-border">Add Class Time</h5>
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="checkbox-bird orange">
                                <input type="checkbox" id="select-all"/>
                                <label for="select-all">Check All</label>
                            </div>
                        </div>
                        @foreach ($Times AS $Time)
                        <div class="col-md-3">
                            <div class="checkbox-bird">
                                <input type="checkbox" id="check-bird-{{$Time->id}}" name="time[]" value="{{$Time->id}}" />
                                <label for="check-bird-{{$Time->id}}"><?php echo \Carbon\Carbon::parse($Time->time_th)->addMinutes(60)->format('H:i A'); ?></label>
                            </div>
                        </div>
                        @endforeach

                    </div><!--.row-->

                    <h5 class="with-border"></h5>
                    <button class="btn btn-inline btn-primary ladda-button" data-style="expand-left"><span class="ladda-label">Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </form>
                </div>
            </section>
        </div><!--.container-fluid-->
    </div><!--.page-content-->
@endsection
@section('script')
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/spin.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda-button-init.js')}}"></script>
<script>
    $('#select-all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        }
        else {
            $(':checkbox').each(function() {
                 this.checked = false;
            });
        }
    });
</script>

<!-- Date Picker -->
<script src="{{asset('assets/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
<script src="{{asset('assets/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>

<script src="{{asset('assets/plugin/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugin/datepicker/locales/bootstrap-datepicker.th.min.js')}}"></script>

<script src="{{asset('assets/js/moment-with-locales.min.js')}}"></script>
<script>
    $(function() {
        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            appendText: "yyyy-mm-dd",
            autoSize: true,
            language: "en",
            startDate: "<?php echo \Carbon\Carbon::Now('Asia/Manila')->format('d/m/Y'); ?>",
            autoclose: true,
            todayHighlight: true,
            altFormat: "yy-mm-dd",
            onSelect: function (date) {
                alert('top');
                // Your CSS changes, just in case you still need them        
            }
        });

        // function cb(start, end) {
        //     $('#reportrange span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
        // }
        // cb(moment().subtract(29, 'days'), moment());

        // $('#daterange').daterangepicker({
        //     "timePicker": true,
        //     ranges: {
        //         'Today': [moment(), moment()],
        //         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //         'This Month': [moment().startOf('month'), moment().endOf('month')],
        //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //     },
        //     "linkedCalendars": false,
        //     "autoUpdateInput": false,
        //     "alwaysShowCalendars": true,
        //     "showWeekNumbers": true,
        //     "showDropdowns": true,
        //     "showISOWeekNumbers": true
        // });

        // $('#daterange2').daterangepicker();

        // $('#daterange3').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: false,
        //     dateFormat: 'dd-mm-yy'

        // });

        // $('#daterange').on('show.daterangepicker', function(ev, picker) {
        //     /*$('.daterangepicker select').selectpicker({
        //         size: 10
        //     });*/
        // });
    });
</script>
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
