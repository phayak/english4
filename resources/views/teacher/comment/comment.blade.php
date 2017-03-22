@extends('layouts.teacher')

<!-- @section('trial') opened @endsection
@section('trial_ul') display: block; @endsection -->
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
@endsection

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Comment</h3>
                            <!-- <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Trial Class</a></li>
                                <li class="active">Create</li>
                            </ol> -->
                        </div>
                    </div>
                </div>
            </header>

            <section class="card">
                <div class="card-block">    
                    <form action="{{url('/admin/teacher/comment')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="class_teacher_id" value="{{$data['class_teacher_id']}}">
                    <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                    <h5 class="with-border">Student Name : {{$data['user_name']}}</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">comment :</label>
                                <textarea name="text" id=""  rows="10" style="width: 100%;"></textarea>
                                <!-- <small class="text-muted">Max length 50</small> -->
                            </fieldset>
                        </div>                 
                    </div><!--.row-->
                    <button class="btn btn-inline btn-primary ladda-button" data-style="expand-left"><span class="ladda-label">Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </form>
                </div>
            </section>
        </div><!--.container-fluid-->
    </div><!--.page-content-->
@endsection
@section('script')
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/spin.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda.min.js')}}"></script>
<script src="{{asset('assets/js/lib/ladda-button/ladda-button-init.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
