@extends('layouts.teacher')

@section('regular') opened @endsection
@section('regular_ul') display: block; @endsection
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/ladda-button/ladda-themeless.min.css')}}">
<style type="text/css">
    .checkbox-detailed input+label {
        height: 60px !important;
        background-color: #e0f4ff !important;
    }
</style>
@endsection

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Regular Class Student</h3>
                           <!--  <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Regular Class</a></li>
                                <li class="active">Create</li>
                            </ol> -->
                        </div>
                    </div>
                </div>
            </header>

            <section class="card">
                <div class="card-block">    
                    <form action="{{url('admin/teacher/regularclass')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                    <input type="hidden" name="teacher_id" value="{{$data['teacher_id']}}">
                    <input type="hidden" name="user_booking_id" value="{{$data['user_booking_id']}}">
                    <h5 class="with-border">1. Please rate the last learning session. </h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="checkbox-detailed">
                                <input type="radio" name="reg1" value="1" id="check-det-1" checked/>
                                <label for="check-det-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Excellent</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input type="radio" name="reg1" value="2" id="check-det-2"/>
                                <label for="check-det-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Good</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg1" value="3" id="check-det-3"/>
                                <label for="check-det-3">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Fair</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg1" value="4" id="check-det-4"/>
                                <label for="check-det-4">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Bad</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg1" value="5" id="check-det-5"/>
                                <label for="check-det-5">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Very Bad</span>
                                    </span>
                                </span>
                                </label>
                            </div>

                        </div>
                    </div><!--.row-->
                    
                    <h5 class="with-border">2. How relevant was the topic with your English goal? </h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="checkbox-detailed">
                                <input type="radio" name="reg2" value="1" id="check-goal-1" checked/>
                                <label for="check-goal-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Highly Relevant </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input type="radio" name="reg2" value="2" id="check-goal-2"/>
                                <label for="check-goal-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Relevant </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg2" value="3" id="check-goal-3"/>
                                <label for="check-goal-3">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Neutral</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg2" value="4" id="check-goal-4"/>
                                <label for="check-goal-4">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Irrelevant</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg2" value="5" id="check-goal-5"/>
                                <label for="check-goal-5">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Irrelevant and Waste of Time</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div><!--.col-->

                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Please elaborate</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="reg2elaborate" placeholder="Please elaborate" maxlength="150">
                            </fieldset>
                        </div><!--.col-->
                    </div><!--.row-->

                    <h5 class="with-border">3. How much do you like your instructor’s teaching style?</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="checkbox-detailed">
                                <input type="radio" name="reg3" value="5" id="check-style-5" checked/>
                                <label for="check-style-5">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">5 </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input type="radio" name="reg3" value="4" id="check-style-4"/>
                                <label for="check-style-4">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">4 </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg3" value="3" id="check-style-3"/>
                                <label for="check-style-3">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">3</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg3" value="2" id="check-style-2"/>
                                <label for="check-style-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">2</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg3" value="1" id="check-style-1"/>
                                <label for="check-style-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">1</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div><!--.col-->

                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Please elaborate</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="reg3elaborate" placeholder="Please elaborate" maxlength="150">
                            </fieldset>
                        </div><!--.col-->

                    </div><!--.row-->

                    <h5 class="with-border">4. Will you to book this instructor again?</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="checkbox-detailed">
                                <input type="radio" name="reg4" value="1" id="check-book-5" checked/>
                                <label for="check-book-5">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Strongly Agree </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input type="radio" name="reg4" value="2" id="check-book-4"/>
                                <label for="check-book-4">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Agree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg4" value="3" id="check-book-3"/>
                                <label for="check-book-3">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Neutral</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg4" value="4" id="check-book-2"/>
                                <label for="check-book-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Disagree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg4" value="5" id="check-book-1"/>
                                <label for="check-book-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Strongly Disagree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div><!--.col-->

                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Please elaborate</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="reg4elaborate" placeholder="Please elaborate" maxlength="150">
                            </fieldset>
                        </div><!--.col-->

                    </div><!--.row-->

                    <h5 class="with-border">5. Does the availability of the instructor suitable for you?</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="checkbox-detailed">
                                <input type="radio" name="reg5" value="1" id="check-suitable-5" checked/>
                                <label for="check-suitable-5">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Strongly Agree </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input type="radio" name="reg5" value="2" id="check-suitable-4"/>
                                <label for="check-suitable-4">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Agree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg5" value="3" id="check-suitable-3"/>
                                <label for="check-suitable-3">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Neutral</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg5" value="4" id="check-suitable-2"/>
                                <label for="check-suitable-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Disagree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                             <div class="checkbox-detailed">
                                <input type="radio" name="reg5" value="5" id="check-suitable-1"/>
                                <label for="check-suitable-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Strongly Disagree</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div><!--.col-->

                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Please elaborate</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput" name="reg5elaborate" placeholder="Please elaborate" maxlength="150">
                            </fieldset>
                        </div><!--.col-->
                        
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
