@extends('layouts.teacher')

@section('style')
<style type="text/css">
    .box-typical.box-typical-dashboard {
        height: 400px !important;
    }
</style>

@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-4">
                        <section class="widget widget-simple-sm">
                            <div class="widget-simple-sm-statistic">
                                <div class="number">{{$teacher_booking_count}}</div>
                                <div class="caption color-blue">Booking Day</div>
                            </div>
                            <div class="widget-simple-sm-bottom statistic"><strong></strong></div>
                        </section><!--.widget-simple-sm-->
                    </div>
                    <div class="col-xl-4">
                        <section class="widget widget-simple-sm">
                            <div class="widget-simple-sm-statistic">
                                <div class="number">{{$user_booking_count}}</div>
                                <div class="caption color-purple">User booking Class</div>
                            </div>
                            <div class="widget-simple-sm-bottom statistic"><strong></strong></div>
                        </section><!--.widget-simple-sm-->
                    </div><!--.col-->
                    <div class="col-xl-4">
                        <section class="widget widget-simple-sm">
                            <div class="widget-simple-sm-statistic">
                                <div class="number">{{$comment_count}}</div>
                                <div class="caption color-purple">Comment</div>
                            </div>
                            <div class="widget-simple-sm-bottom statistic"><strong></strong></div>
                        </section><!--.widget-simple-sm-->
                    </div><!--.col-->

                </div><!--.row-->
            </div><!--.col-->
        </div><!--.row-->
        <div class="row">
            
            <div class="col-xl-12">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Today Class : 20-05-2016</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <button type="button" class="action-btn action-btn-expand">
                                    <i class="font-icon font-icon-expand"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <table class="tbl-typical">
                            <tr>
                                <th align="center"><div>Date</div></th>
                                <th><div>Status</div></th>
                                <th><div>Subject</div></th>
                                <th align="center"><div>Department</div></th>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Today</span> 8:30</td>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Website down for one week</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Today</span> 16:30</td>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Restoring default settings</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Yesterday</span></td>
                                <td>
                                    <span class="label label-warning">Progress</span>
                                </td>
                                <td>Loosing control on server</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center">23th May</td>
                                <td>
                                    <span class="label label-danger">Closed</span>
                                </td>
                                <td>Authorizations keys</td>
                                <td align="center">Support</td>
                            </tr>
                        </table>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->

            <div class="col-xl-12">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Class coming</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <button type="button" class="action-btn action-btn-expand">
                                    <i class="font-icon font-icon-expand"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <table class="tbl-typical">
                            <tr>
                                <th align="center"><div>Date</div></th>
                                <th><div>Status</div></th>
                                <th><div>Subject</div></th>
                                <th align="center"><div>Department</div></th>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Today</span> 8:30</td>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Website down for one week</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Today</span> 16:30</td>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Restoring default settings</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center"><span class="semibold">Yesterday</span></td>
                                <td>
                                    <span class="label label-warning">Progress</span>
                                </td>
                                <td>Loosing control on server</td>
                                <td align="center">Support</td>
                            </tr>
                            <tr>
                                <td nowrap align="center">23th May</td>
                                <td>
                                    <span class="label label-danger">Closed</span>
                                </td>
                                <td>Authorizations keys</td>
                                <td align="center">Support</td>
                            </tr>
                        </table>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->

            <div class="col-xl-6">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Comments</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <button type="button" class="action-btn action-btn-expand">
                                    <i class="font-icon font-icon-expand"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <article class="comment-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="{{asset('assets/img/photo-64-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <span class="user-card-row-name"><a href="#">Matt McGill</a></span>
                                    </div>
                                    <div class="tbl-cell tbl-cell-date">
                                        <span class="semibold">Today</span>
                                        12:45
                                    </div>
                                </div>
                            </div>
                            <div class="comment-item-txt">
                                <p>That’s a great idea! I’m sure we could start this project as soon as possible.</p>
                                <p>Let’s meet tomorow!</p>
                            </div>
                            <div class="comment-item-meta">
                                <a href="#" class="star">
                                    <i class="font-icon font-icon-star"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-re"></i>
                                </a>
                                <!--Реализация кнопками-->
                                <!--<button type="button" class="star">-->
                                <!--<i class="font-icon font-icon-star"></i>-->
                                <!--</button>-->
                                <!--<button type="button">-->
                                <!--<i class="font-icon font-icon-re"></i>-->
                                <!--</button>-->
                            </div>
                        </article>
                        <article class="comment-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="{{asset('assets/img/photo-64-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <span class="user-card-row-name"><a href="#">Tim Collins</a></span>
                                    </div>
                                    <div class="tbl-cell tbl-cell-date">
                                        <span class="semibold">Today</span>
                                        12:45
                                    </div>
                                </div>
                            </div>
                            <div class="comment-item-txt">
                                <p>That’s a great idea! I’m sure we could start this project as soon as possible.</p>
                                <p>Let’s meet tomorow!</p>
                            </div>
                            <div class="comment-item-meta">
                                <a href="#" class="star active">
                                    <i class="font-icon font-icon-star"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-re"></i>
                                </a>
                                <!--Реализация кнопками-->
                                <!--<button type="button" class="star">-->
                                <!--<i class="font-icon font-icon-star"></i>-->
                                <!--</button>-->
                                <!--<button type="button">-->
                                <!--<i class="font-icon font-icon-re"></i>-->
                                <!--</button>-->
                            </div>
                        </article>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->

            <div class="col-xl-6">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Contacts</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <button type="button" class="action-btn action-btn-expand">
                                    <i class="font-icon font-icon-expand"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <div class="contact-row-list">
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="{{asset('assets/img/photo-64-2.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Tim Collins</a></p>
                                            <p class="user-card-row-mail"><a href="#">timcolins@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">Director at Tony’s</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="{{asset('assets/img/photo-64-1.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="{{asset('assets/img/photo-64-3.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
                                            <p class="user-card-row-mail"><a href="#">mollybr@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">Assistan</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="{{asset('assets/img/photo-64-4.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="img/photo-64-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Tim Collins</a></p>
                                            <p class="user-card-row-mail"><a href="#">timcolins@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">Director at Tony’s</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="img/photo-64-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="img/photo-64-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
                                            <p class="user-card-row-mail"><a href="#">mollybr@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">Assistan</div>
                                    </div>
                                </div>
                            </article>
                            <article class="contact-row">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="img/photo-64-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                            <p class="user-card-row-mail"><a href="#">maggysmith@mail.com</a></p>
                                        </div>
                                        <div class="tbl-cell tbl-cell-status">PR Manager</div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-dashboard-->
            </div><!--.col-->
        </div><!--.row-->

    </div><!--.container-fluid-->

</div><!--.page-content-->


@endsection
@section('script')

<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
