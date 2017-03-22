@extends('layouts.nav')


@section('style')
<style type="text/css">
    .nav-tabs {
        border-bottom: 2px dashed #ddd;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff;
        cursor: default;
        background-color: #EA741A;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .nav >li >a {
        background-color: #EA741A;
        position: relative;
        display: block;
        padding: 10px 15px;

    }
    .nav >li >a:hover{
        background-color: rgb(255, 110, 0);
        color: #fff;
    }
    
    .btn-credit {
        width: 260px;
        height: 48px;
        margin: 10px auto -54px;
        line-height: 48px;
        background: -webkit-linear-gradient(left, #435975, #1089bf);
        border:0px;
        color: white;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }
    .btn-credit:hover {
        background: linear-gradient(to right, #435975, #1089bf);
    }
    .input-card {
        background-color: #eee;
        border: 1px solid #ddd;
        height: 35px;
        text-align: center;
    }
</style>
@endsection
@section('content')
<!-- <div class="page-content"> -->

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>

@endif
<div class="container-fluid bg-package">
    <div class="container">
        <div class="box-package-buy">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <br>
                <center><h3>แพ็คเกจที่ท่านเลือก</h3></center>
                <div class="row">
                    <div class="col-md-5"><center><img src="{{asset($package->img)}}" width="100%" alt=""></center></div>
                    <div class="col-md-7">
                        <div><h5><center>{{$package->name}}</center></h5></div>
                        <div><h6><center>{!! $package->description2 !!}</center></h6></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <div style="border-top:2px dashed #ddd;padding-top: 10px;color:red;"><h4><center>คูปองส่วนลด</center></h4></div> -->
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <input type="text" class="form-control input-pomotion" id="input-pomotion">
                            <div class="input-group-btn">
                                <a href="javascript:void(0)" id="confirm" class="btn btn-pomotion kanit f-w300">ยืนยัน</a>
                            </div>
                        </div>
                
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <div class="row">
                            <div class="col-md-6"><h5>ราคาเพ็คเกจ</h5></div>
                            <div class="col-md-3"><h5>{{number_format($package->price)}} <input type="hidden" id="package-price" value="{{$package->price}}"></h5></div>
                            <div class="col-md-3"><h5>บาท</h5></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><h5>จำนวน</h5></div>
                            <div class="col-md-3"><h5>1</h5></div>
                            <div class="col-md-3"><h5>เดือน</h5></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><h5>ส่วนลด</h5></div>
                            <div class="col-md-3"><h5><span id="discount-coupon" style="color:red;">-</span></h5></div>
                            <div class="col-md-3"><h5>บาท</h5></div>
                        </div>
                        <div class="row">
                            <div style="border-top:2px dashed #ddd;padding-top: 10px;color:red;"></div>
                            <div class="col-md-6"><h5>ราคาสุทธิ</h5></div>
                            <div class="col-md-3"><h5><span id="discount-coupon-total">{{number_format($package->price)}}</span></h5></div>
                            <div class="col-md-3"><h5>บาท</h5></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="border-left:3px solid #455978;height: 100%">
                <br>
                <h3>กรุณาเลือกวิธีชำระเงิน</h3>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs responsive" role="tablist" style="border:0px;">
                            <li role="presentation" class=""><a href="#banktab" class="order-pay1" aria-controls="home" role="tab" data-toggle="tab">ชำระผ่านบัญชีธนาคาร</a></li>
                            <!-- <li role="presentation" class="active"><a href="#credittab" class="order-pay2" aria-controls="profile" role="tab" data-toggle="tab">ชำระผ่านบัตรเครดิต</a></li> -->
                        </ul>

                        <div class="tab-content">
                            <!-- bank tabs -->
                            <div role="tabpanel" class="tab-pane active" id="banktab">
                                <div class="col-md-12">
                                    <div><center><h2 style="color: #414141;padding-top: 15px">ชำระผ่านบัญชีธนาคาร</h2></center></div>
                                    <div style="border-top:2px dashed #ddd;padding-top: 10px;margin-top:15px;"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <center><img src="{{asset('assets/img/kbank.jpg')}}" width="60%" height="auto" alt=""></center>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="f-w300 f18 margin5">ธนาคารกสิกรไทย</div>
                                            <div class="f-w300 f18 margin5">เลขที่บัญชี <font color="red">012-8-41221-2</font></div>
                                            <div class="f-w300 f18 margin5">ประเภทบัญชี ออมทรัพย์</div>
                                            <div class="f-w300 f18 margin5">บริษัท อิงลิช ฟอร์ สปีค จำกัด</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="border-top:1px dashed #414141;padding-top: 10px;margin-top:15px;"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <center><img src="{{asset('assets/img/ktb.jpg')}}" width="60%" height="auto" alt=""></center>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="f-w300 f18 margin5">ธนาคารกสิกรไทย</div>
                                            <div class="f-w300 f18 margin5">เลขที่บัญชี <font color="red">033-0-81366-8</font></div>
                                            <div class="f-w300 f18 margin5">ประเภทบัญชี ออมทรัพย์</div>
                                            <div class="f-w300 f18 margin5">บริษัท อิงลิช ฟอร์ สปีค จำกัด</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="border-top:1px dashed #414141;padding-top: 10px;margin-top:15px;"></div>
                                            <div class="pull-right">
                                                <form action="{{url('package')}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="coupon_id" id="coupon_id" value="">
                                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                                    <input type="hidden" name="pay_type" value="bank">
                                                    <button type="submit" class="btn btn-pomotion kanit f-w300">ยืนยันการสั่งซื้อ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div><h6 class="f-w300 f18 margin15"><font color="red">* </font> หลังจากโอนเงิน ท่านสามารถเข้าสู่ระบบเพื่อแจ้งชำระเงินได้ด้วยตนเอง หรือจะแจ้งผ่านทาง Fackbook,Line, Email หรือ Skype ก็ได้ 
            ท่านจะเริ่มใช้งานได้เมื่อเราได้รับการยืนยันการชำระเงินแล้ว (ไม่เกิน 24 ชั่วโมง)</h6></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- credit tabs -->
                            <!-- <div role="tabpanel" class="tab-pane" id="credittab">
                                <div class="col-md-12">
                                    <div><center><h2 style="color: #414141;padding-top: 15px">ชำระผ่านบัตรเครดิต</h2></center></div>
                                    <div style="border-top:2px dashed #ddd;padding-top: 10px;margin-top:15px;"></div>
                                    <div class="margin15">
                                        <form id="card" class="form-horizontal">

                                            <input type="hidden" data-balance="amount" value="{{$package->price}}">
                                            <div class="form-group">
                                                <label class="control-label col-sm-5" for="name">* ชื่อ-สกุล เช่น John Doe</label>
                                                <div class="col-sm-5">
                                                    <input data-omise="card_name" class="input-card" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-5" for="name">* เลขบัตรเครดิต</label>
                                                <div class="col-sm-5">
                                                    <input data-omise="card_number" class="input-card" placeholder="number" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-5" for="name">* วันหมดอายุ (Card Expiry Date)</label>
                                                <div class="col-sm-5">
                                                    <input data-omise="card_expm" class="input-card" placeholder="mm" value="" size="4">/<input data-omise="card_expy"  class="input-card" placeholder="yy" value="" size="8">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-5" for="name">* CVV</label>
                                                <div class="col-sm-5">
                                                    <input data-omise="security_code" class="input-card" value="" placeholder="cvv" size="3">
                                                </div>
                                            </div>
                                            <br>
                                            <?php $tax = $package->price*0.0365; ?>
                                            <?php $vat = $tax*0.07; ?>
                                            <center>ค่าบริการบัตรเครดิตจำนวน <b><?php echo number_format($tax+$vat, 2, '.', ''); ?> บาท</b></center>
                                            <br>
                                            <div class="form-group">
                                            <center><button type="submit" class="btn-credit">ชำระเงิน THB {{number_format($package->price+$tax+$vat, 2, '.', '')}}</button></center>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="response"></div>

                                    <div class="margin20">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                              <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  <font size="3" color="back">* ข้อตกลงการทำรายการ</font>
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                              <div class="panel-body">
                                                <font color="red" style="font-weight: 300;">* หากท่านได้ชำระค่าบริการเรียนภาษาอังกฤษออนไลน์เรียบร้อยแล้ว ในกรณีที่ท่านมิได้เข้าเรียนตามแพ็คเกจที่สมัคร เราขอสงวนสิทธิ์ในการคืนเงินให้แก่ท่าน ไม่ว่ากรณีใดก็ตาม</font>
                                              </div>
                                            </div>
                                          </div>
                                       
                                        
                                    </div>
                                    
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                    <!-- <div class="col-md-6">
                        <center>
                        <div class="order-payment1">
                            ชำระผ่านบัญชีธนาคาร
                        </div>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>
                        <div class="order-payment2">
                            ชำระผ่านบัตรเครดิต
                        </div>
                        </center>
                    </div> -->
                </div>
            </div>

        </div>
    </div>

    <div class="container" style="margin-top:50px;"></div>
</div>

<!-- </div> --><!--.page-content-->

@endsection

@section('script')
<!-- <script src="https://cdn.omise.co/card.js"></script> -->
<script>
    var token = window.Laravel.csrfToken;
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    
    
    $("#confirm").click(function() {
        var code = $("#input-pomotion").val();

        $.ajax({
            url: "{{url('package/coupon')}}",
            type: 'POST',
            dataType: 'json',
            data: {_token: token,code: code},
            success: function (data) {
                
                if (data.code == '0') {
                    swal('ไม่สำเร็จ','ท่านใส่ คูปองส่วนลด ไม่ถูกต้อง','error');
                    // console.log('code ไม่ถูกต้อง');
                }else if(data.unit == '0') {
                    swal('ไม่สำเร็จ','จำนวน คูปองส่วนลด เต็มแล้ว','error');
                    // console.log('unit เต็มแล้ว');
                }else if(data.exp == '0') {
                    swal('ไม่สำเร็จ','คูปองของท่าน หมดอายุการใช้งาน','error');
                    // console.log('exp หมดเขตการใช้งาน code');
                }else if(data.couponnull == '0') {
                    swal('ไม่สำเร็จ','คุณไม่ได้กรอก คูปอง','error');
                    // console.log('exp หมดเขตการใช้งาน code');
                } else {
                    swal('สำเร็จ','ท่าน สามารถใช้ คูปองส่วนลดนี้ได้','success');
                    $("#input-pomotion").prop('disabled', true);
                    $("#coupon_id").val(data.coupon_id);
                    var package_price = $("#package-price").val();
                    var discount_price_coupon = (package_price*data.coupon_discount/100);
                    var discount_price_total = (package_price-discount_price_coupon);
                    $("#discount-coupon").html('').append(addCommas(discount_price_coupon));


                    $("#discount-coupon-total").html('').append(addCommas(discount_price_total));
                }
            },
            error: function (data) {
                // Error while calling the controller (HTTP Response Code different as 200 OK
                console.log('Error:', data);
            }
        });

    });
    
    
</script>
<script>
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show');
    })

</script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.omise.co/omise.js"></script>
<script>
      (function($, window, undefined) {
        "use strict";
        $(document).ready(function () {

          Omise.setPublicKey("pkey_test_56s5jfqoyw7ymnhmpce");

          $("#card").submit(function() {

            Omise.createToken("card", {
              "name": $("[data-omise=card_name]").val(),
              "number": $("[data-omise=card_number]").val(),
              "expiration_month": $("[data-omise=card_expm]").val(),
              "expiration_year": $("[data-omise=card_expy]").val(),
              "security_code": $("[data-omise=security_code]").val(),
            }, function(statusCode, response) {
              if (response.object == "token") {
                // $("#response").html(response.id);
                
                var balance = $("[data-balance=amount]").val();

                $.ajax({
                    url: "{{url('package/checkout')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: {_token: token,omiseToken: response.id,amount: balance},
                    success: function (data) {
                        console.log(data);
                        if (data == '0') {
                            swal('ไม่สำเร็จ','ท่านไม่สามารถตัดบัตรนี้ได้','error');
                        } else {
                            swal('สำเร็จ','ท่านยืนยันการชำระเงินแล้ว','success');
                        }
                    },
                    error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    // console.log('Error:', data);
                    swal('ไม่สำเร็จ','ท่านไม่สามารถตัดบัตรนี้ได้','error');
                    }
                });

              } else {
                swal('ไม่สำเร็จ','ท่านไม่สามารถตัดบัตรนี้ได้','error');
                // $("#response").html(response.code+": "+response.message)
                console.log(response);
              };
            });
            // Skip submitting form.
            return false;
          });
        });
      })(jQuery, window);
    </script>
@endsection