@extends('layouts.nav')

@section('content')
<!-- <div class="page-content"> -->

<div class="container-fluid bg-box-1">
    <div class="container">
    	<label style="font-size: 20px;color:#fff; margin-top: 50px;text-align: center;line-height: 30px;">แนะนำ ติชม ติดต่อ</label>
        <div class="col-md-8 col-md-offset-2">
        	<h1 style="font-size: 20px;color:#fff; margin-top: 30px;text-align: center;line-height: 30px;">หากคุณอยากได้ข้อมูลเพิ่มเติม มีข้อสงสัย หรือมีปัญหาการใช้บริการ ทีมงานพร้อมตอบรับทุกคำถาม และคำติชมของคุณตลอดเวลา
			
        	</h1>
        </div>
		<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
			@if (session()->has('flash_notification.message'))
			    <div class="alert alert-{{ session('flash_notification.level') }}">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			        {!! session('flash_notification.message') !!}
			    </div>
			@endif
		</div>
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        	<form action="{{url('contact')}}" method="post">
        		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			  	<div class="form-group">
			  		<font color="red">{{ $errors->first('name', 'กรุณาใส่ ชื่อผู้ติดต่อ') }}</font>
			    	<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="ชื่อผู้ติดต่อ">
			  	</div>
			  	<div class="form-group">
			  		<font color="red">{{ $errors->first('email', 'กรุณาใส่ ที่อยู่อีเมล์') }}</font>
			    	<input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="ที่อยู่อีเมล์">
			  	</div>
			  	<div class="form-group">
			  		<font color="red">{{ $errors->first('subject', 'กรุณาใส่ เรื่องที่ติดต่อ') }}</font>
			    	<input type="text" class="form-control" name="subject" value="{{old('subject')}}" placeholder="เรื่องที่ติดต่อ">
			  	</div>
			  	<div class="form-group">
			  		<font color="red">{{ $errors->first('msg', 'กรุณาใส่ ข้อความ') }}</font>
			    	<textarea class="form-control" rows="3" name="msg" id="comment" placeholder="ข้อความ">{{old('msg')}}</textarea>
			  	</div>
				<div class="form-group" style="margin-bottom:40px;">
  					<button type="submit" class="btn btn-default pull-right btn-sm">ส่งข้อความ</button>
  				</div>
			</form>

			<div style="padding-top:40px;"></div>
        </div>
    </div>
</div>
<!-- </div> --><!--.page-content-->
@endsection
@section('script')

	
@endsection