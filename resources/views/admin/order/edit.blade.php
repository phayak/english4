@extends('layouts.admin')

@section('order_open') opened @endsection
@section('order_index') menu-active @endsection
@section('order_ul') display: block; @endsection

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
                        <h3>แก้ไข คูปอง</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{url('es4p')}}">deashboard</a></li>
                            <li><a href="{{url('es4p/order')}}">ทั้งหมด</a></li>
                            <li class="active">รายการสั่งซื้อทั้งหมด</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical box-typical-padding">
            <!-- <h5 class="m-t-lg with-border">Horizontal Inputs</h5> -->
                <form action="{{url('/es4p/order/'.$order->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ช่องทาง</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="unit" maxlength="4" placeholder="Unit" required="" value="{{ $order->pay_type }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ชื่อลูกค้า</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control input-sm" readonly name="" id="txt_checkText" placeholder="Code" value="{{ $order->userName }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">แพ็คเกจ</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="Name" value="{{ $order->userPackage }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Coupon</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="discount" maxlength="2" placeholder="Discount" value="{{ $order->coupon_id }}"></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">ราคาทั้งหมด</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="" readonly id="" placeholder="" value="{{ $order->price_total }}"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">วันที่เริ่ม</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="date" class="form-control" name="" readonly id="" placeholder="" value="{{ $order->date_start }}"></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleSelect" class="col-sm-2 form-control-label">สถานะ</label>
                        <div class="col-sm-10">
                            <select id="" class="form-control" name="status">
                                <option value="1" {{ $order->status == 1 ? 'selected="selected"' : '' }}>เริ่มใช้งาน</option>
                                <option value="0" {{ $order->status == 0 ? 'selected="selected"' : '' }}>ปิดการใช้งาน</option>
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
