@extends('layouts.admin')

@section('payment_open') opened @endsection
@section('payment_index') menu-active @endsection
@section('payment_ul') display: block; @endsection

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
                        <h3>แก้ไข แจ้งการโอนเงิน</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{url('es4p')}}">deashboard</a></li>
                            <li><a href="{{url('es4p/payment')}}">ทั้งหมด</a></li>
                            <li class="active">แก้ไข แจ้งการโอนเงิน</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical box-typical-padding">
            <!-- <h5 class="m-t-lg with-border">Horizontal Inputs</h5> -->
                <form action="{{url('/es4p/payment/'.$payment->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ชื่อลูกค้า</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="unit" maxlength="4" placeholder="Unit" required="" value="{{ $payment->userName }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">เวลาทำรายการ</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control input-sm" readonly name="" id="txt_checkText" placeholder="Code" value="<?php echo \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y H:i'); ?>"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ชื่อแพ็คเกจ</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="Name" value="{{ $payment->userPackage }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ธนาคารที่โอน</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="discount" maxlength="2" placeholder="Discount" value="{{ $payment->name_bank }}"></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">วันที่โอน</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="" value="{{ $payment->date }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">เวลาที่โอน</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="" value="{{ $payment->time }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">จำนวนเงิน</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="" value="{{ $payment->price_total }}"></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">สลิป</label>
                        <div class="col-sm-10">
                            @if($payment->file_slip != "" || $payment->file_slip != NULL)
                            <img src="{{$payment->file_slip}}" alt="">
                            @else
                            <h4>ไม่มีสลิป</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleSelect" class="col-sm-2 form-control-label">สถานะ</label>
                        <div class="col-sm-10">
                            <select id="" class="form-control" name="status">
                                <option value="1" {{ $payment->status == 1 ? 'selected="selected"' : '' }}>ยืนยัน</option>
                                <option value="0" {{ $payment->status == 0 ? 'selected="selected"' : '' }}>ยังไม่ยืนยัน</option>
                                <option value="0" {{ $payment->status == 2 ? 'selected="selected"' : '' }}>รอยืนยัน</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-sm pull-right">แก้ไข</button>
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
