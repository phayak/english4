@extends('layouts.admin')

@section('bank') opened @endsection
@section('bank_index') menu-active @endsection
@section('bank_ul') display: block; @endsection

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
    

    	<div class="container-fluid">

			<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<span><h3>แพ็คเกจ ทั้งหมด</h3> <span class="pull-right" style="margin-top:-30px;padding-right: 20px;">{{ $banks->links() }}</span></span>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="text-align: center;">#</th>
									<!-- <th style="text-align: center;">รูป</th> -->
									<th style="text-align: center;">ชื่อธนาคาร</th>
									<th style="text-align: center;">เลขบัญชี</th>
									<th style="text-align: center;">ชื่อเจ้าของบัญชี</th>
									<th style="text-align: center;">สถานะ</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($banks AS $no => $data)
								<tr>
									<td style="text-align: center;">
										{{$no+1}}
									</td>
									<td style="text-align: center;">{{ $data->name_bank }}</td>
									<td style="text-align: center;">{{ $data->number_bank }}</td>
									
									<td style="text-align: center;">{{ $data->name_book }} บาท</td>
									<td style="text-align: center;">
										<div class="font-11 color-blue-grey-lighter uppercase">ใช้งาน</div>
										@if($data->status == 1)
										<span style="color: #46c35f;">เปิดการใช้งาน</span>
										@else
										<span style="color: #fb6067;">ปิดการใช้งาน</span>
										@endif
										<!-- <span style="color: #fb6067;">Offline</span> -->
									</td>
									
									<td style="text-align: center;">
										<a href="" class="btn btn-info btn-sm fw300">แก้ไข</a>
										<button class="btn btn-danger btn-sm fw300" style="margin-top: -2px;">ลบ</button>
									</td>
								</tr>
								@endforeach
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
