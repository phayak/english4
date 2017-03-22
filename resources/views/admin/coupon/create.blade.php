@extends('layouts.admin')

@section('coupon') opened @endsection
@section('coupon_create') menu-active @endsection
@section('coupon_ul') display: block; @endsection

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
                        <h3>สร้าง คูปอง</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{url('es4p')}}">deashboard</a></li>
                            <li><a href="{{url('es4p/coupon')}}">ทั้งหมด</a></li>
                            <li class="active">คูปอง</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical box-typical-padding">
            <!-- <h5 class="m-t-lg with-border">Horizontal Inputs</h5> -->
                <form action="{{url('/es4p/coupon')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Unit จำนวนที่จะมี</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="unit" id="unit" maxlength="4" placeholder="Unit" required></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Code</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" onkeyup="isEnglishchar();" class="form-control input-sm" name="code" id="txt_checkText" placeholder="Code"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Name ชื่อ Coupon ส่วนลด</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="name" id="" placeholder="Name"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Discount ส่วนลด (%)</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="discount" id="discount" maxlength="2" placeholder="Discount "></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Start Date วันที่เริ่ม คูปอง</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="date" class="form-control" name="coupon_date_start" id="" placeholder=""></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">End Date วันที่หมด คูปอง</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="date" class="form-control" name="coupon_date_end" id="" placeholder=""></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleSelect" class="col-sm-2 form-control-label">Select</label>
                        <div class="col-sm-10">
                            <select id="" class="form-control" name="status">
                                <option value="1">เริ่มใช้งาน</option>
                                <option value="0">ปิดการใช้งาน</option>
                            </select>
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
				
    </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')

<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.alphanumeric.js')}}"></script>
<script type="text/javascript"> 
function isEnglishchar(str){   
    var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._-";   
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
$(document).ready(function(){
    // เพียงสั้นๆแค่นี้แหละ
    $('#unit').numeric();
    $('#discount').numeric();
 
});
</script>
@endsection
