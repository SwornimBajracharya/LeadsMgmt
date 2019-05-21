<!-- side-nav starts -->
<nav class="navbar-default side-navbar" role="navigation">
  <!-- sidebar collapse starts -->
  <div class="sidebar-collapse" id="" style="">
    <ul class="side-menu">
      <li class="side-profile-wrapper">
        <div class="side-profile">
          <!--sidbar profile image-->
          <div class="profile-image">
            <img src="{{asset('assets/images/image.jpg')}}" height="80" width="80" alt="" style="border-radius: 50%;">
          </div>
          <div class="profile-name">
            <span class="user-name">{{Auth::user()->name}}</span><br>
            <span class="user-des">{{ucfirst(Auth::user()->user_type)}}</span><br>
            <span class="user-desc">
              @if(Auth::user()->user_type == "admin")
                Welcome Admin user (Business Department). You are assigned with user management actions.
              @elseif (Auth::user()->user_type == "counselor")
                Welcome counselor user. You are assigned with all the actions related to leads.
              @endif
            </span>
          </div>
        </div><!--sidebar profile image ends here-->
      </li>
      <li class="side-menu menu-active">
        <i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;
        <a href="{{route('dashboard.getIndex')}}">DASHBOARD</a>
      </li>
      <!-- <li class="side-menu ">
        <i class="glyphicon glyphicon-align-left"></i>&nbsp;&nbsp;
        <a href="#">MY MENU1</a>
        <i class="glyphicon glyphicon-menu-left pull-right side-menu-arrow" style="font-size: 11px;"></i>
      </li> -->
      @if(Auth::user()->user_type == "admin")
        <!--counselor menu-->
        <li class="side-menu">
          <i class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;
          <a href="#" class="main-link">COUNSELORS</a>
          <i class="glyphicon glyphicon-menu-down pull-right side-menu-arrow" style="font-size: 11px;"></i>
          <!--sub menu-child menu-->
          <ul class="side-child-menu">
            <li class="side-child-li">
              <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
              <a href="{{route('counselor.getNew')}}">Add New</a>
            </li>
            <li class="side-child-li">
              <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
              <a href="{{route('counselor.getIndex')}}">List Counselors</a>
            </li>
          </ul><!--sub ul-child ul ends here-->
        </li><!--counselor menu ends-->
      @endif
      @if(Auth::user()->user_type == "counselor")
        <!--leads menu-->
        <li class="side-menu">
          <i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;
          <a href="#" class="main-link">LEADS</a>
          <i class="glyphicon glyphicon-menu-down pull-right side-menu-arrow" style="font-size: 11px;"></i>
          <!--sub menu-child menu-->
          <ul class="side-child-menu">
            <li class="side-child-li">
              <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
              <a href="{{route('lead.getNew')}}">Add New</a>
            </li>
            <li class="side-child-li">
              <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
              <a href="{{route('lead.getIndex')}}">List All Leads</a>
            </li>
            <li class="side-child-li">
              <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
              <a href="{{route('lead.getFollowups')}}">Lead Followups</a>
            </li>
          </ul><!--sub ul-child ul ends here-->
        </li><!--leads menu ends-->
       <li class="side-menu">
          <i class="glyphicon glyphicon-indent-left"></i>&nbsp;&nbsp;
          <a href="{{route('lead.getStudents')}}">LIST STUDENTS</a>
        </li>
      @endif
      @if(Auth::user()->user_type == 'top_management' || Auth::user()->user_type == "admin")
      <!--report menu-->
      <li class="side-menu">
        <i class="glyphicon glyphicon glyphicon-align-left"></i>&nbsp;&nbsp;
        <a href="#" class="main-link">MIS REPORTS</a>
        <i class="glyphicon glyphicon-menu-down pull-right side-menu-arrow" style="font-size: 11px;"></i>
        <!--sub menu-child menu-->
        <ul class="side-child-menu">
          <li class="side-child-li">
            <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
            <a href="{{route('report.getCounselorReport')}}">Counsellor Report</a>
          </li>
          <li class="side-child-li">
            <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
            <a href="{{route('report.getActiveLeadsReport')}}">Active Leads Report</a>
          </li>
          <li class="side-child-li">
            <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
            <a href="{{route('report.getStatusReport')}}">Status Report</a>
          </li>
          <li class="side-child-li">
            <i class="glyphicon glyphicon-none"></i>&nbsp;&nbsp;
            <a href="#">Customized Report</a>
          </li>
        </ul><!--sub ul-child ul ends here-->
      </li><!--report menu ends-->
      @endif
      <!-- <li class="side-menu">
        <i class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;
        <a href="#" class="main-link">MENUUU</a>
      </li> -->
      <li class="side-menu">
        <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;
        <a href="#">My Profile</a>
      </li>
      <li class="side-menu">
        <i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;
        <a href="{{URL::to('logout')}}">LOG ME OUT</a>
      </li>
    </ul>
  </div><!-- sidebar collapse ends -->
</nav><!--side-nav ends here-->
<!--nav header starts-->
<div class="nav-header">
  <div class="left-nav pull-left">
    <p style="font-weight: 600;color: #34495e;font-size: 14px;">Leads Mgmt. System <br>ISMT College</p>
  </div>
  <div class="right-nav pull-left">
    <!--menu hamburger icon-->
    <div class="menu-bar display-table pull-left">
      <i class="glyphicon glyphicon-menu-hamburger display-table-cell"></i>
    </div><!--menu hamburger icon ends-->
    <!--navbar right contents-->
    <div class="row nav-menu-right pull-left" style="background-color: white;">
      <div class="row col-md-4 col-sm-4 col-xs-4">
      <form role="search" class="navbar-form-custom" method="post" action="#" id="nav-search">
        <div class="form-group">
          <input type="text" placeholder="Search something special" class="form-control" name="search">
        </div>
      </form></div>
      <a href="{{URL::to('logout')}}"><div class="row col-md-1 col-sm-1 col-xs-1 logout-wrapper pull-right display-table">
        <i class="glyphicon glyphicon-log-out display-table-cell" style="color: #58B72B" data-toggle="tooltip" data-placement="bottom" title="Log Out"></i>
      </div></a>
    </div><!--navbar right contents wrapper ends-->
  </div>
</div><!--nav header ends here-->