<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">

    <a>
      <img src="{{ asset('img/lightblockswhite.png') }}" class="img-responsive inner-logo center-block" id="sidebar-logo" alt="">
    </a>
  
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
      <!-- begin sidebar user -->
      <ul class="nav">
        <li class="nav-profile">
          <a href="javascript:;" data-toggle="nav-profile">
            <div class="cover with-shadow"></div>
            <div class="image">
              <img src="../assets/img/user/user-13.jpg" alt="" />
            </div>
            <div class="info">
              <!--<b class="caret pull-right"></b>-->
              {{ Auth::user()->first_name }} 
              <small>{{ Auth::user()->email }}</small>
              
            </div>
          </a>
        </li>
      </ul>
      <!-- end sidebar user -->
      <!-- begin sidebar nav -->
     
      <ul class="nav">
        <li class="nav-header">Menu</li>
  
        <li class="has-sub ">
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-th-large" aria-hidden="true"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="has-sub ">
            <a id="signal-dropdown" href="#signals" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-th-large" aria-hidden="true"></i><span>Trade signals</span></a>
            <ul class="collapse side" id="signals" style="line-height: 2 !important;">

                <li>
                    <a href="{{route('admin.get.signals')}}"> Create Signal</a>
                </li>
                <li>
                    <a href="{{route('unsent.signals')}}">Unsent Signals</a>
                </li>

            </ul>
        </li>

        {{-- <li class="has-sub ">
          <a href="" data-toggle="modal" data-target="#invest-modal">
            <i class="icon fa fa-plus"></i>
            <span>Investments</span>
          </a>
        </li> --}}
  
        {{-- <li class="has-sub ">
          <a href="{{route('bank.account')}}">
            <i class="fa fa-university" aria-hidden="true"></i>
            <span>Bank Transfer</span>
          </a>
        </li> --}}
  
        {{-- <li class="has-sub ">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-wallet" aria-hidden="true"></i>
            <span>My Wallet</span>
          </a>
        </li> --}}
  
        {{-- <li class="has-sub ">
          <a href="{{route('all.transaction')}}">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span>Transactions</span>
          </a>
        </li> --}}
{{--   
        <li class="has-sub ">
          <a href="{{route('settings')}}">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>Settings</span>
          </a>
        </li> --}}
  
      </ul>
  
  
      {{-- End of Super admin menu --}}
      <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
  </div>
  <div class="sidebar-bg"></div>
  <!-- end #sidebar -->
  