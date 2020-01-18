<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
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
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="has-sub ">
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>Invest</span>
        </a>
      </li>

      <li class="has-sub ">
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>Deposit</span>
        </a>
      </li>

      <li class="has-sub ">
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>My Wallet</span>
        </a>
      </li>

      <li class="has-sub ">
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>Transactions</span>
        </a>
      </li>

      <li class="has-sub ">
        <a href="/dashboard">
          <i class="fa fa-th-large"></i>
          <span>Settings</span>
        </a>
      </li>

    </ul>


    {{-- End of Super admin menu --}}
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
