@extends('layouts.admin')

@section('article') opened @endsection
@section('article_create') menu-active @endsection
@section('article_ul') display: block; @endsection

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
                        <h3>สร้าง บทความ</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{url('es4p')}}">deashboard</a></li>
                            <li><a href="{{url('es4p/article')}}">ทั้งหมด</a></li>
                            <li class="active">บทความ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical box-typical-padding">
            <!-- <h5 class="m-t-lg with-border">Horizontal Inputs</h5> -->
                <form action="{{url('/es4p/article')}}" method="post">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="exampleSelect" class="form-control-label">category หมวดหมู่</label>
                        <select class="form-control" name="status">
                            <option value="">เลือก</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">img รูป</label>
                        <input type="text" class="form-control" name="img" placeholder="รูป" required>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">img facebook รูปแสดงใน social</label>
                        <input type="text" class="form-control" name="img_facebook" placeholder="รูป" required>
                    </div>



                    <div class="form-group">
                        <label class="form-control-label">subject หัวข้อ</label>
                        <input type="text" class="form-control" name="subject" maxlength="255" placeholder="หัวข้อ" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">title รายละเอียด ย่อ</label>
                        <input type="text" class="form-control" name="title" maxlength="255" placeholder="รายละเอียด ย่อ" required>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">บทความ</label>
                        <textarea name="body" class="form-control" cols="30" rows="10" style="width: 100%;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect" class="form-control-label">สถานะ</label>
                        <select id="" class="form-control" name="status">
                            <option value="1">เริ่มใช้งาน</option>
                            <option value="0">ปิดการใช้งาน</option>
                        </select>
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
