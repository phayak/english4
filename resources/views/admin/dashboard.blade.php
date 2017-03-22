@extends('layouts.admin')

<!-- @section('review') opened @endsection -->
@section('dashboard') menu-active opened @endsection
<!-- @section('review_ul') display: block; @endsection -->

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
@endsection

@section('content')
<div class="page-content">
    <header class="page-content-header widgets-header">
            <div class="container-fluid">
                <div class="tbl tbl-outer">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Pageviews</div>
                                        <div class="amount color-blue">20 750 000</div>
                                        <div class="amount-sm">20 750 000</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="79"
                                             data-barcolor="#00a8ff"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Pages/Visit</div>
                                        <div class="amount">2,4</div>
                                        <div class="amount-sm">2,3</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#929faa"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Visit Duration</div>
                                        <div class="amount">2m23s</div>
                                        <div class="amount-sm">2m10s</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#929faa"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbl-cell">
                            <div class="tbl tbl-item">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="title">Revenue</div>
                                        <div class="amount">N/A</div>
                                        <div class="amount-sm">N/A</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-progress">
                                        <div class="circle-progress-bar-typical size-56 pieProgress"
                                             role="progressbar" data-goal="75"
                                             data-barcolor="#929faa"
                                             data-barsize="10"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="pie_progress__number">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header><!--.page-content-header-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="chart-statistic-box">
                    <div class="chart-txt">
                        <div class="chart-txt-top">
                            <p><span class="unit">$</span><span class="number">1540</span></p>
                            <p class="caption">Week income</p>
                        </div>
                        <table class="tbl-data">
                            <tr>
                                <td class="price color-purple">120$</td>
                                <td>Orders</td>
                            </tr>
                            <tr>
                                <td class="price color-yellow">15$</td>
                                <td>Investments</td>
                            </tr>
                            <tr>
                                <td class="price color-lime">55$</td>
                                <td>Others</td>
                            </tr>
                        </table>
                    </div>
                    <div class="chart-container">
                        <div class="chart-container-in">
                            <div id="chart_div"></div>
                            <header class="chart-container-title">Income</header>
                            <div class="chart-container-x">
                                <div class="item"></div>
                                <div class="item">tue</div>
                                <div class="item">wed</div>
                                <div class="item">thu</div>
                                <div class="item">fri</div>
                                <div class="item">sat</div>
                                <div class="item">sun</div>
                                <div class="item">mon</div>
                                <div class="item"></div>
                            </div>
                            <div class="chart-container-y">
                                <div class="item">300</div>
                                <div class="item"></div>
                                <div class="item">250</div>
                                <div class="item"></div>
                                <div class="item">200</div>
                                <div class="item"></div>
                                <div class="item">150</div>
                                <div class="item"></div>
                                <div class="item">100</div>
                                <div class="item"></div>
                                <div class="item">50</div>
                                <div class="item"></div>
                            </div>
                        </div>
                    </div>
                </div><!--.chart-statistic-box-->
            </div><!--.col-->
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-sm-6">
                        <article class="statistic-box red">
                            <div>
                                <div class="number">26</div>
                                <div class="caption"><div>Open tickets</div></div>
                                <!-- <div class="percent">
                                    <div class="arrow up"></div>
                                    <p>15%</p>
                                </div> -->
                            </div>
                        </article>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <article class="statistic-box purple">
                            <div>
                                <div class="number">12</div>
                                <div class="caption"><div>Closes tickets</div></div>
                               <!--  <div class="percent">
                                    <div class="arrow down"></div>
                                    <p>11%</p>
                                </div> -->
                            </div>
                        </article>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <article class="statistic-box yellow">
                            <div>
                                <div class="number">104</div>
                                <div class="caption"><div>New clients</div></div>
                                <!-- <div class="percent">
                                    <div class="arrow down"></div>
                                    <p>5%</p>
                                </div> -->
                            </div>
                        </article>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <article class="statistic-box green">
                            <div>
                                <div class="number">
                                <?php 
                                        $bytes = disk_free_space("."); 
                                        $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
                                        $base = 1024;
                                        $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
                                        echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
                                    ?></div>
                                <div class="caption"><div>Here is an example of a long name</div></div>
                                <!-- <div class="percent">
                                    <div class="arrow up"></div>
                                    <p>84%</p>
                                </div> -->
                            </div>
                        </article>
                    </div><!--.col-->
                </div><!--.row-->
            </div><!--.col-->
        </div><!--.row-->
        <div class="row">
            <div class="col-xl-6">
                <section class="box-typical box-typical-dashboard">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Recent orders</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-actions">
                                <a href="#" class="action-btn">
                                    <i class="font-icon font-icon-close"></i>
                                </a>
                                <button type="button" class="action-btn action-btn-collapse">
                                    <i class="font-icon font-icon-minus"></i>
                                </button>
                                <button type="button" class="action-btn">
                                    <i class="font-icon font-icon-pencil-thin"></i>
                                </button>
                                <button type="button" class="action-btn action-btn-expand">
                                    <i class="font-icon font-icon-expand"></i>
                                </button>
                                <button type="button" class="action-btn">
                                    <i class="font-icon font-icon-filter"></i>
                                </button>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <table class="tbl-typical">
                            <tr>
                                <th><div>Status</div></th>
                                <th><div>Clients</div></th>
                                <th align="center"><div>Orders#</div></th>
                                <th align="center"><div>Date</div></th>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-success">Active</span>
                                </td>
                                <td>John Doe</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Today</span> 8:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-success">Active</span>
                                </td>
                                <td>Thomas Bayer</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Today</span> 16:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-default">Inactive</span>
                                </td>
                                <td>Nicolas Karabat</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Yesterday</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-default">Unpaid</span>
                                    <span class="label label-default">Inactive</span>
                                </td>
                                <td>Alexandre Pome</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center">23th May</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-success">Active</span>
                                </td>
                                <td>John Doe</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Today</span> 8:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-success">Active</span>
                                </td>
                                <td>Thomas Bayer</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Today</span> 16:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-primary">Paid</span>
                                    <span class="label label-default">Inactive</span>
                                </td>
                                <td>Nicolas Karabat</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center"><span class="semibold">Yesterday</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-default">Unpaid</span>
                                    <span class="label label-default">Inactive</span>
                                </td>
                                <td>Alexandre Pome</td>
                                <td align="center">3435362</td>
                                <td class="color-blue-grey" nowrap align="center">23th May</td>
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
                                <h3>Recent tickets</h3>
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
                                <th><div>Status</div></th>
                                <th><div>Subject</div></th>
                                <th align="center"><div>Department</div></th>
                                <th align="center"><div>Date</div></th>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Website down for one week</td>
                                <td align="center">Support</td>
                                <td nowrap align="center"><span class="semibold">Today</span> 8:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-success">Open</span>
                                </td>
                                <td>Restoring default settings</td>
                                <td align="center">Support</td>
                                <td nowrap align="center"><span class="semibold">Today</span> 16:30</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-warning">Progress</span>
                                </td>
                                <td>Loosing control on server</td>
                                <td align="center">Support</td>
                                <td nowrap align="center"><span class="semibold">Yesterday</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label label-danger">Closed</span>
                                </td>
                                <td>Authorizations keys</td>
                                <td align="center">Support</td>
                                <td nowrap align="center">23th May</td>
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
<script type="text/javascript" src="{{asset('https://www.gstatic.com/charts/loader.js')}}"></script>
<script>
    $(document).ready(function(){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Day');
            dataTable.addColumn('number', 'Values');
            // A column for custom tooltip content
            dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
            dataTable.addRows([
                ['MON',  130, ' '],
                ['TUE',  130, '130'],
                ['WED',  180, '180'],
                ['THU',  175, '175'],
                ['FRI',  200, '200'],
                ['SAT',  170, '170'],
                ['SUN',  250, '250'],
                ['MON',  220, '220'],
                ['TUE',  220, ' ']
            ]);

            var options = {
                height: 314,
                legend: 'none',
                areaOpacity: 0.18,
                axisTitlesPosition: 'out',
                hAxis: {
                    title: '',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    textPosition: 'out'
                },
                vAxis: {
                    minValue: 0,
                    textPosition: 'out',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    baselineColor: '#16b4fc',
                    ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
                    gridlines: {
                        color: '#1ba0fc',
                        count: 15
                    },
                },
                lineWidth: 2,
                colors: ['#fff'],
                curveType: 'function',
                pointSize: 5,
                pointShapeType: 'circle',
                pointFillColor: '#f00',
                backgroundColor: {
                    fill: '#008ffb',
                    strokeWidth: 0,
                },
                chartArea:{
                    left:0,
                    top:0,
                    width:'100%',
                    height:'100%'
                },
                fontSize: 11,
                fontName: 'Proxima Nova',
                tooltip: {
                    trigger: 'selection',
                    isHtml: true
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        }
        $(window).resize(function(){
            drawChart();
            setTimeout(function(){
            }, 1000);
        });
    });
</script>
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection
