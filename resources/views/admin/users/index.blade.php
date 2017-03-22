@extends('layouts.admin')

@section('user_open') opened @endsection
@section('user_index') menu-active @endsection
@section('user_ul') display: block; @endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
<!-- <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> -->
<style>
ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}
ul.pagination li
{
    display: inline;
    float: left;
    border: 1px solid #ddd;
    margin: 0 4px;
    text-decoration: none;
}
ul.pagination li.active {
    padding: 4px 8px;
    background-color: #455978;
    border:1px solid #455978;
    color: #fff;
}

ul.pagination li a {
    color: black;
    float: left;
    padding: 4px 8px;
    text-decoration: none;
    transition: background-color .3s;
/*    border: 1px solid #ddd;*/

}

ul.pagination li a.active {
    background-color: #4CAF50;
    float: left;
    color: white;
    border: 1px solid #4CAF50;
}

ul.pagination li a:hover:not(.active) {
    background-color: #455978;
}
</style>
@endsection

@section('content')
<div class="page-content">
    <header class="page-content-header widgets-header">
            <div class="container-fluid">
                <div class="tbl tbl-outer">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">ผู้เรียนทั้งหมด</div>
                                        <div class="amount color-blue">750000</div>
                                        <!-- <div class="amount-sm">20 750 000</div> -->
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="79"
                                             data-barcolor="#00a8ff"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Pages/Visit</div>
                                        <div class="amount">2,4</div>
                                        <div class="amount-sm">2,3</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#929faa"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Visit Duration</div>
                                        <div class="amount">2m23s</div>
                                        <div class="amount-sm">2m10s</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#ac6bec"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Revenue</div>
                                        <div class="amount">N/A</div>
                                        <div class="amount-sm">N/A</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#929faa"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header><!--.page-content-header-->

        <div class="container-fluid">

            <section class="box-typical">
                <header class="box-typical-header">
                    <div class="tbl-row">
                        <div class="tbl-cell tbl-cell-title">
                            <span><h3>ตารางนักเรียน</h3> <span class="pull-right" style="margin-top:-30px;padding-right: 20px;">{{ $datas->links() }} <a href="{{url('es4p/user/create')}}" class="btn btn-success btn-sm pull-right"><span class="lbl fw300">เพิ่ม นักเรียน</span></a></span></span>
                        </div>
                    </div>
                </header>
                <div class="box-typical-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">รุป</th>
                                    <th style="text-align: center;">ประเภทสมาชิก</th>
                                    <th style="text-align: center;">ชื่อผู้ใช้</th>
                                    <th style="text-align: center;">ชื่อ-นามสกุล</th>
                                    <th style="text-align: center;">อีเมล์</th>
                                    <th style="text-align: center;">เพศ / อายุ</th>
                                    <th style="text-align: center;">สถานะ</th>
                                    <th style="text-align: center;">วันที่สมัคร</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas AS $no => $data)
                                <tr>
                                    <td style="text-align: center;">
                                        {{$no+1}}
                                    </td>
                                    <td class="table-photo" style="text-align: center;">
                                        @if(!($data->img_path == NULL || $data->img_path == ''))
                                        <img src="{{asset($data->img_path)}}" class="profile-img" width="90%" height="auto" alt="">
                                        @else
                                        <img src="{{asset('assets/img/avatar-sign.png')}}" class="profile-img" width="90%" height="auto" alt="">
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if($data->login_type == '' || $data->login_type == NULL)
                                            <span class="label label-success">สมาชิก</span>
                                        @else
                                            <span class="label label-primary">facebook</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{$data->name}}</td>
                                    <td style="text-align: center;">{{$data->fname}}-{{$data->lname}}</td>
                                    <td style="text-align: center;">{{$data->email}}</td>
                                    <td>
                                        @if($data->sex == 1)
                                        <div class="font-13 color-blue-grey-lighter uppercase"><center>ชาย</center></div>
                                        @elseif($data->sex == 2)
                                        <div class="font-13 color-blue-grey-lighter uppercase"><center>หญิง</center></div>
                                        @else
                                        <div class="font-13 color-blue-grey-lighter uppercase"><center>-</center></div>
                                        @endif
                                        <center><?php echo $_age = floor((time() - strtotime($data->birth_date)) / 31556926); ?></center>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="font-11 color-blue-grey-lighter uppercase">ใช้งาน</div>
                                        <span style="color: #46c35f;">Online</span>
                                        <!-- <span style="color: #fb6067;">Offline</span> -->
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="font-11 color-blue-grey-lighter uppercase">เวลา {{$data->created_at}}</div>
                                        {{$data->created_at}}
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('es4p/user/'.$data->id.'/edit') }}" class="btn btn-info btn-sm fw300">แก้ไข</a>
                                        <button class="btn btn-danger btn-sm fw300" style="margin-top: -2px;">ลบ</button>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td class="table-check">
                                        <div class="checkbox checkbox-only">
                                            <input type="checkbox" id="tbl-check-2"/>
                                            <label for="tbl-check-2"></label>
                                        </div>
                                    </td>
                                    <td><a href="#">Value</a></td>
                                    <td>Revene for last quarter in state America.</td>
                                    <td width="150">
                                        <div class="progress-with-amount">
                                            <progress class="progress progress-no-margin" value="50" max="100">50%</progress>
                                            <div class="progress-with-amount-number">50%</div>
                                        </div>
                                    </td>
                                    <td nowrap="nowrap">27.051<span class="caret caret-up color-green"></span></td>
                                    <td>
                                        <div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
                                        0%
                                    </td>
                                    <td colspan="2" width="40%">
                                        <div class="bar-chart-wrapper">
                                            <span class="bar-chart">2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,1</span>
                                            <div class="val left">0</div>
                                            <div class="val right">1,57 м</div>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </section>
        </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')

<script src="{{asset('assets/js/app.js')}}"></script>
@endsection