@extends('layouts.admin')

@section('payment_open') opened @endsection
@section('payment_index') menu-active @endsection
@section('payment_ul') display: block; @endsection

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
                                        <div class="title">การสมัครแพ็คเกจ</div>
                                        <div class="amount color-blue"> บาท</div>
                                        <div class="amount-sm"> รายการ</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="100"
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
                                        <div class="title">ยังไม่ชำระเงิน</div>
                                        <div class="amount"> บาท</div>
                                        <div class="amount-sm"> รายการ</div>
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
                                        <div class="title">รอยืนยัน</div>
                                        <div class="amount"> บาท</div>
                                        <div class="amount-sm"> รายการ</div>
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
                                        <div class="title">ชำระเงินแล้ว</div>
                                        <div class="amount"> บาท</div>
                                        <div class="amount-sm">รายการ</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="100"
                                             data-barcolor="#46c35f"
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
							<span><h3>การชำระเงิน</h3> <span class="pull-right" style="margin-top:-30px;padding-right: 20px;">{{ $payments->links() }}</span></span>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">ชื่อลูกค้า</th>
									<th style="text-align: center;">เวลาทำรายการ</th>
									<th style="text-align: center;">ชื่อแพ็คเกจ</th>
									<th style="text-align: center;">ธนาคารที่โอน</th>
									<th style="text-align: center;">วันที่โอน</th>
									<th style="text-align: center;">เวลาที่โอน</th>
									<th style="text-align: center;">จำนวนเงิน</th>
									<th style="text-align: center;">สลิป</th>
									<th style="text-align: center;">สถานะ</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($payments AS $no => $data)
								<tr>
									<td style="text-align: center;">
										{{$no+1}}
									</td>
									<td style="text-align: center;">{{$data->userName}}</td>
									<td style="text-align: center;"><?php echo \Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i'); ?></td>
									<td style="text-align: center;"> {{$data->userPackage}} </td>
									<td style="text-align: center;">{{ $data->name_bank}}</td>
									<td style="text-align: center;"><?php echo \Carbon\Carbon::parse($data->date)->format('d/m/Y'); ?></td>
									<td style="text-align: center;"><?php echo \Carbon\Carbon::parse($data->time)->format('H:i'); ?></td>
									<td style="text-align: center;"> {{ number_format($data->price_total) }} บาท</td>
									<td style="text-align: center;">
										@if($data->file_slip != '' || $data->file_slip != NULL)
										<a href="{{asset($data->file_slip)}}">ดูสลิป</a>
										@else
										 ไม่มีสลิป
										@endif
									</td>
									<td style="text-align: center;">
										<div class="font-11 color-blue-grey-lighter uppercase">ใช้งาน</div>
										@if($data->status == 1)
										<span style="color: #46c35f;">ยืนยันแล้ว</span>
										@elseif($data->status == 2)
										<span style="color: #fdad2a;">รอยืนยัน</span>
										@else
										<span style="color: #00a8ff;">ยังไม่ยืนยัน</span>
										@endif
										<!-- <span style="color: #fb6067;">Offline</span> -->
									</td>
									
									<td style="text-align: center;">
										<a href="{{ url('es4p/payment/'.$data->id.'/edit') }}" class="btn btn-info btn-sm fw300">แก้ไข</a>
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
