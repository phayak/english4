@extends('layouts.nav')
@section('style')
<style type="text/css">
    .bg-fff {
        background-color: #fff;
    }
    .title-register {
        padding-top: 30px;
        font-size: 25px;
        padding-bottom: 20px;
        text-decoration: underline;
    }
    .text-label {
        font-size: 18px;
    }
    .btn-register {
        background-color: #44567c;
        color: #fff;
        padding-top: 10px;
        padding-left: 78px;
        padding-right: 78px;
        padding-bottom: 10px;
        border-radius: 10px;
        font-size: 18px;
        border: 0;
    }
    .btn-register:hover {
        color: #fff;
        background-color: #5776ba;
    }
    .center {
        text-align: center;
    }
    .input-all {
        border: 1px solid #003475 !important;
    }
    @media screen and (min-width: 991px) {
        }
        @media screen and (max-width: 991px) {
           .btn-register {
                color: #fff;
                padding-top: 10px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 10px;
                border-radius: 10px;
                font-size: 18px;
                border:0;
            }
        }
</style>

@endsection
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-fff center">
            <div class="col-md-4 col-md-offset-4">
                    <div class="title-register">ลงทะเบียน</div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label text-label">กรุณาระบุ อีเมล์ ของท่าน</label>
                                <input type="email" class="form-control input-all" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label text-label">ชื่อ</label>
                                <input type="text" class="form-control input-all" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label text-label">รหัสผ่าน</label>
                            
                                <input type="password" class="form-control input-all" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label text-label">ยืนยัน รหัสผ่าน</label>
                            
                                <input type="password" class="form-control input-all" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn-register">
                                     ลงทะเบียน
                                </button>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
