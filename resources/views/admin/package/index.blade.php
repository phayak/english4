@extends('layouts.admin')

@section('package') opened @endsection
@section('package_index') menu-active @endsection
@section('package_ul') display: block; @endsection

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
							<span><h3>แพ็คเกจ ทั้งหมด</h3> <span class="pull-right" style="margin-top:-30px;padding-right: 20px;">{{ $packages->links() }}</span></span>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">รูปที่ใช้</th>
									<th style="text-align: center;">ประเภท</th>
									<th style="text-align: center;">แพ็คเกจ</th>
									<th style="text-align: center;">ราคา</th>
									<th style="text-align: center;">รายละเอียด</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($packages AS $no => $data)
								<tr>
									<td style="text-align: center;">
										{{$no+1}}
									</td>
									<td style="text-align: center;"><img src="{{asset($data->img)}}" height="40" width="auto" alt=""></td>
									<td style="text-align: center;">{{ $data->type }}</td>
									<td style="text-align: center;">{{$data->name}}</td>
									
									<td style="text-align: center;">{{ number_format($data->price) }} บาท</td>
									<td style="text-align: center;">{{ $data->description}}</td>
									
									
									<td style="text-align: center;">
										<a href="" class="btn btn-info btn-sm fw300">แก้ไข</a>
										<!-- <button class="btn btn-danger btn-sm fw300" style="margin-top: -2px;">ลบ</button> -->
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
