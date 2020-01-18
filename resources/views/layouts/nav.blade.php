<!-- begin #header -->
<div id="header" class="header navbar-default">
  <!-- begin navbar-header -->
  <div class="navbar-header">
    {{-- <a href="/dashboard" class="navbar-brand"><img src="{{asset('/img/logo/54genesymbol.svg')}}"><b> LightBlocks</b></a> --}}
    <a href="/dashboard" class="navbar-brand">
      <img src="{{ asset('img/lightblockswhite.png') }}" class="img-responsive inner-logo center-block" alt="">
    </a>
    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- end navbar-header -->

  <!-- begin header-nav -->
  <ul class="navbar-nav navbar-right">
    
    <li class="dropdown navbar-user">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../assets/img/user/user-13.jpg" alt="" />
        <span class="d-none d-md-inline">@if(Auth::user()->first_name) {{ Auth::user()->first_name }}@endif</span> <b class="caret"></b>
      </a>
      <div class="dropdown-menu dropdown-menu-right">       
        <a href="{{url('/logout')}}" class="dropdown-item">Log Out</a>
      </div>
    </li>
  </ul>
  <!-- end header navigation right -->
</div>
<!-- end #header -->
