@extends('layouts.admin')

@section('teacher') opened @endsection
@section('teacher_create') menu-active @endsection
@section('teacher_ul') display: block; @endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>สร้าง ครูผู้สอน</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{url('es4p')}}">deashboard</a></li>
                            <li><a href="{{url('es4p/user')}}">ทั้งหมด</a></li>
                            <li class="active">สร้าง ครูผู้สอน</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="card">
            <div class="card-block">
                <h5 class="with-border">เพิ่มครูผู้สอน</h5>
                <form action="{{url('/es4p/teacher/'.$user->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInput">ชื่อ First Name</label>
                            <input type="text" class="form-control maxlength-simple" id="exampleInput" value="{{$user->fname}}" name="fname" placeholder="First Name" maxlength="30">
                            <!-- <small class="text-muted">Max length 15, simple</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">นามสกุล Last Name</label>
                            <input type="text" class="form-control maxlength-custom-message" name="lname" value="{{$user->lname}}" id="exampleInputEmail1" placeholder="Last Name" maxlength="30">
                            <!-- <small class="text-muted">Max length 20, custom message</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputPassword1">ชื่อเล่น Nick Name</label>
                            <input type="text" class="form-control maxlength-always-show" name="name" value="{{$user->name}}" id="exampleInputPassword1" placeholder="Nick Name" maxlength="10">
                            <!-- <small class="text-muted">Max length 10, always show</small> -->
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInput">อีเมล์</label>
                            <input type="email" class="form-control maxlength-simple" name="email" value="{{$user->email}}" readonly onkeyup="isEnglishchar();" id="exampleInput" placeholder="Enter email" maxlength="30">
                            <!-- <small class="text-muted">Max length 15, simple</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">รหัสผ่าน</label>
                            <input type="password" class="form-control maxlength-custom-message" value="{{$user->password_see}}" name="password" id="hide-show-password" placeholder="password" maxlength="30">
                            <!-- <small class="text-muted">Max length 20, custom message</small> -->
                        </fieldset>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInput">เลือกรูปโปรไพล์</label>
                            <input type="file" class="form-control maxlength-simple input-sm" name="img">
                            <!-- <small class="text-muted">Max length 15, simple</small> -->
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInput">วันเดือนปีเกิด</label>
                            <input type="date" class="form-control maxlength-simple input-sm" name="birth_date" id="exampleInput" placeholder="Enter email" maxlength="30">
                            <!-- <small class="text-muted">Max length 15, simple</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="">เพศ</label>
                            <select id="" class="form-control" name="sex">
                                <option value="1" {{ $user->sex == 1 ? 'selected="selected"' : '' }}>ชาย</option>
                                <option value="2" {{ $user->sex == 2 ? 'selected="selected"' : '' }}>หญิง</option>
                            </select>
                            <!-- <small class="text-muted">Max length 20, custom message</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="unit">เบอร์โทร</label>
                            <input type="text" class="form-control maxlength-custom-message" id="unit" name="tel" placeholder="080000000" maxlength="10">
                            <!-- <small class="text-muted">Max length 20, custom message</small> -->
                        </fieldset>
                    </div>
                </div>



                <div class="form-group row">
                        <label class="col-sm-2 form-control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-sm pull-right">สร้าง</button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        				
    </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')

<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.alphanumeric.js')}}"></script>

<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
<script src="{{asset('assets/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

<script type="text/javascript"> 
function isEnglishchar(str){   
    var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@._-";   
    var str_length=str.length;   
    var isEnglish=true;   
    var Char_At="";   
    for(i=0;i<str_length;i++){   
        Char_At=str.charAt(i);   
        if(orgi_text.indexOf(Char_At)==-1){   
            isEnglish=false;   
            break;
        }      
    }   
    return isEnglish; 
}  
</script>
<script type="text/javascript"> 
function isNumber(str){   
    var orgi_text="1234567890";   
    var str_length=str.length;   
    var isNumber=true;   
    var Char_At="";   
    for(i=0;i<str_length;i++){   
        Char_At=str.charAt(i);   
        if(orgi_text.indexOf(Char_At)==-1){   
                isNumber=false;
            break;
        }      
    }   
    return isNumber; 
}  
</script>
<script type="text/javascript">
$(document).ready(function(){
    // เพียงสั้นๆแค่นี้แหละ
    $('#unit').numeric();
    $('#discount').numeric();
 
});
</script>
@endsection
