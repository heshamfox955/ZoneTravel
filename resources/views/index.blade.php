@include('layouts.header')
@include('layouts.navbar')
<div id="scroll-top" style="display: block;     width: 50px;
    height: 50px;
    color: #DDD;
    background-color: #e61c5d;
    text-align: center;
    position: fixed;
    right: 15px;
    bottom: 10px;
    z-index: 999999;
    border-radius: 50%;
    cursor: pointer;">
    <i class="fa fa-chevron-up fa-3x"></i>
</div>
@yield('content')
@include('layouts.footer')