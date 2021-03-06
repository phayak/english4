<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="brown @yield('dashboard')">
            <a href="{{url('es4p')}}">
                <i class="font-icon font-icon-home"></i>
                <span class="lbl">Dashboard</span>
            </a>
        </li>
        <li class="green with-sub @yield('user_open')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">นักเรียน</span>
            </span>
            <ul style="@yield('user_ul')">
                <li class="@yield('user_index')"><a href="{{url('es4p/user')}}"><span class="lbl fw300">ดูทั้งหมด</span></a></li>
                <li class="@yield('user_create')"><a href="{{url('es4p/user/create')}}"><span class="lbl fw300">เพิ่ม นักเรียน</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('teacher')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">ครูผู้สอน</span>
            </span>
            <ul style="@yield('teacher_ul')">
                <li class="@yield('teacher_index')"><a href="{{url('es4p/teacher')}}"><span class="lbl fw300">ดูทั้งหมด</span></a></li>
                <li class="@yield('teacher_create')"><a href="{{url('es4p/teacher/create')}}"><span class="lbl fw300">เพิ่ม ครูผู้สอน</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('order')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">รายการสั่งซื้อ</span>
            </span>
            <ul style="@yield('order_ul')">
                <li class="@yield('order_index')"><a href="{{url('es4p/order')}}"><span class="lbl">ดูทั้งหมด</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('payment')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">แจ้งการโอนเงิน</span>
            </span>
            <ul style="@yield('payment_ul')">
                <li class="@yield('payment_index')"><a href="{{url('es4p/payment')}}"><span class="lbl">ดูทั้งหมด</a></li>
            </ul>
        </li>
        <li class="red @yield('contacts')">
            <a href="{{url('es4p/contact')}}" class="label-right">
                <i class="font-icon font-icon-contacts"></i>
                <span class="lbl fw300">การติดต่อ</span>
                <span class="label label-custom label-pill label-danger">@yield('contact_count')</span>
            </a>
        </li>
        <li class="purple with-sub @yield('coupon')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">คูปอง</span>
            </span>
            <ul style="@yield('coupon_ul')">
                <li class="@yield('coupon_index')"><a href="{{url('es4p/coupon')}}"><span class="lbl">ดูทั้งหมด</span></a></li>
                <li class="@yield('coupon_create')"><a href="{{url('es4p/coupon/create')}}"><span class="lbl">สร้างคูปอง</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('package')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">แพ็คเกจ</span>
            </span>
            <ul style="@yield('package_ul')">
                <li class="@yield('package_index')"><a href="{{url('es4p/package')}}"><span class="lbl">ดูทั้งหมด</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('bank')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">บัญชีธนาคาร</span>
            </span>
            <ul style="@yield('bank_ul')">
                <li class="@yield('bank_index')"><a href="{{url('es4p/bank')}}"><span class="lbl">ดูทั้งหมด</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub @yield('article')">
            <span>
                <i class="font-icon font-icon-user active"></i>
                <span class="lbl fw300">บทความ</span>
            </span>
            <ul style="@yield('article_ul')">
                <li class="@yield('article_index')"><a href="{{url('es4p/article')}}"><span class="lbl">ดูทั้งหมด</span></a></li>
                <li class="@yield('article_create')"><a href="{{url('es4p/article/create')}}"><span class="lbl">สร้าง บทความ</span></a></li>
            </ul>
        </li>

        <!-- <li class="green">
            <a href="#">
                <i class="font-icon font-icon-cart"></i>
                <span class="lbl">Marketplace</span>
            </a>
        </li>
        <li class="gold">
            <a href="#">
                <i class="font-icon font-icon-speed"></i>
                <span class="lbl">Performance</span>
            </a>
        </li>
        <li class="blue">
            <a href="#">
                <i class="font-icon font-icon-users"></i>
                <span class="lbl">Community</span>
            </a>
        </li>
        <li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-comments active"></i>
                <span class="lbl">Messages</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Inbox</span><span class="label label-custom label-pill label-danger">4</span></a></li>
                <li><a href="#"><span class="lbl">Sent mail</span></a></li>
                <li><a href="#"><span class="lbl">Bin</span></a></li>
            </ul>
        </li>
        <li class="orange-red with-sub">
            <span>
                <i class="font-icon font-icon-help"></i>
                <span class="lbl">Support</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Feedback</span></a></li>
                <li><a href="#"><span class="lbl">FAQ</span></a></li>
            </ul>
        </li>
        <li class="grey">
            <a href="#">
                <i class="font-icon font-icon-dashboard"></i>
                <span class="lbl">Dashboards</span>
            </a>
        </li>
        <li class="red">
            <a href="#" class="label-right">
                <i class="font-icon font-icon-contacts"></i>
                <span class="lbl">Contacts</span>
                <span class="label label-custom label-pill label-danger">35</span>
            </a>
        </li>
        <li class="aquamarine">
            <a href="#">
                <i class="font-icon font-icon-build"></i>
                <span class="lbl">Companies</span>
            </a>
        </li>
        <li class="magenta">
            <a href="#">
                <i class="font-icon font-icon-calend"></i>
                <span class="lbl">Calendar</span>
            </a>
        </li>
        <li class="blue-dirty">
            <a href="#">
                <i class="font-icon font-icon-edit"></i>
                <span class="lbl">Forms</span>
            </a>
        </li>
        <li class="coral">
            <a href="#">
                <i class="font-icon font-icon-chart"></i>
                <span class="lbl">Reports</span>
            </a>
        </li>
        <li class="pink-red">
            <a href="#">
                <i class="font-icon font-icon-zigzag"></i>
                <span class="lbl">Activity</span>
            </a>
        </li>
        <li class="gold">
            <a href="#">
                <i class="font-icon font-icon-tablet"></i>
                <span class="lbl">Tables</span>
            </a>
        </li>
        <li class="magenta">
            <a href="#">
                <i class="font-icon font-icon-widget"></i>
                <span class="lbl">Widges</span>
            </a>
        </li>
        <li class="pink">
            <a href="#">
                <i class="font-icon font-icon-map"></i>
                <span class="lbl">Maps</span>
            </a>
        </li>
        <li class="blue-darker">
            <a href="#">
                <i class="font-icon font-icon-chart-2"></i>
                <span class="lbl">Charts</span>
            </a>
        </li>
        <li class="grey">
            <a href="#">
                <i class="font-icon font-icon-doc"></i>
                <span class="lbl">Documentation</span>
            </a>
        </li>
        <li class="blue-sky">
            <a href="#">
                <i class="font-icon font-icon-question"></i>
                <span class="lbl">Help</span>
            </a>
        </li>
        <li class="coral">
            <a href="#">
                <i class="font-icon font-icon-cogwheel"></i>
                <span class="lbl">Settings</span>
            </a>
        </li>
        <li class="magenta">
            <a href="#">
                <i class="font-icon font-icon-user"></i>
                <span class="lbl">Profile</span>
            </a>
        </li>
        <li class="blue-dirty">
            <a href="#">
                <i class="font-icon font-icon-notebook"></i>
                <span class="lbl">Tasks</span>
            </a>
        </li>
        <li class="aquamarine">
            <a href="#">
                <i class="font-icon font-icon-mail"></i>
                <span class="lbl">Contact form</span>
            </a>
        </li>
        <li class="pink">
            <a href="#">
                <i class="font-icon font-icon-users-group"></i>
                <span class="lbl">Group</span>
            </a>
        </li>
        <li class="gold">
            <a href="#">
                <i class="font-icon font-icon-picture-2"></i>
                <span class="lbl">Gallery</span>
            </a>
        </li>
        <li class="brown">
            <a href="#">
                <i class="font-icon font-icon-event"></i>
                <span class="lbl">Event</span>
            </a>
        </li>
        <li class="red">
            <a href="#">
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">Project</span>
            </a>
        </li>
        <li class="red">
            <a href="#">
                <i class="fa fa-binoculars"></i>
                <span class="lbl">Font Awesome</span>
            </a>
        </li> -->
    </ul>
</nav><!--.side-menu-->