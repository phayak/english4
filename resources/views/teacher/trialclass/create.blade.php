@extends('layouts.teacher')

@section('trial') opened @endsection
@section('trial_ul') display: block; @endsection
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
                            <h3>Trial Class Student</h3>
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
                    <form action="{{url('admin/teacher/trialclass')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                    <input type="hidden" name="teacher_id" value="{{$data['teacher_id']}}">
                    <input type="hidden" name="user_booking_id" value="{{$data['user_booking_id']}}">

                    <h5 class="with-border">1.please introduce yourself</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">a.Name of the student :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="a1" placeholder="Name of the student" maxlength="50">
                                <!-- <small class="text-muted">Max length 50</small> -->
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">b.Nickname :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="b1" placeholder="Nickname" maxlength="15">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">c.Date of Birth :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="c1" placeholder="Date of Birth" maxlength="30">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">d.Age :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="d1"  placeholder="Age" maxlength="30">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">e.Gender :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="e1" placeholder="Gender" maxlength="30">
                            </fieldset>
                        </div> 
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">f.Occupation :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="f1" placeholder="Occupation" maxlength="30">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Instructor’s Comment :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="instructor1" placeholder="Instructor’s Comment" maxlength="200">
                            </fieldset>
                        </div>
                    </div><!--.row-->

                    <h5 class="with-border">2.Please describe your favorite activity (Such as sports, hobbies etc.) </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">a.Favorite activity :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="a2" placeholder="Favorite activity" maxlength="200">
                                <!-- <small class="text-muted">Max length 50</small> -->
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">b.Further explanation on the activity :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="b2" placeholder="Further explanation on the activity" maxlength="200">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">c. How often do you do the activity ?</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="c2" placeholder="How often do you do the activity" maxlength="200">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Instructor’s Comment :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="instructor2" placeholder="Instructor’s Comment" maxlength="200">
                            </fieldset>
                        </div>
                       
                    </div><!--.row-->

                    <h5 class="with-border">3.Motivation for English learning </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">a.Goal: </label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="a3" placeholder="Goal" maxlength="200">
                                <!-- <small class="text-muted">Max length 50</small> -->
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">b.Expectation from English4Speak :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="b3" placeholder="Expectation from English4Speak" maxlength="200">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Instructor’s Comment :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="instructor3" placeholder="Instructor’s Comment" maxlength="200">
                            </fieldset>
                        </div>

                         <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">4.Academic Interest : </label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="academic4" placeholder="Academic Interest" maxlength="200">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">5.English Proficiency (Refer to Proficiency Table) :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="english5" placeholder="English Proficiency" maxlength="200">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">6.Instructor’s Comments on student’s strength and weaknesses :</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="english6" placeholder="Instructor’s" maxlength="200">
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
