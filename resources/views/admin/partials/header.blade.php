<!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a href="index.html" class="navbar-brand">
              <img alt="stack admin logo" src="https://www.stricklands.com/img/logos/stricklands-logo.png" width="150" 
              class="brand-logo">
              {{-- <h2 class="brand-text">Stack</h2> --}}
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div id="navbar-mobile" class="collapse navbar-collapse">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
              <div class="search-input">
                
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{asset('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span>
                <span class="user-name">
                  {{ Auth::user()->fld_usr_fname }}
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <!-- <a href="#" class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
                <a href="#" class="dropdown-item"><i class="ft-mail"></i> My Inbox</a>
                <a href="#" class="dropdown-item"><i class="ft-check-square"></i> Task</a>
                <a href="#" class="dropdown-item"><i class="ft-message-square"></i> Chats</a> -->
                <div class="dropdown-divider"></div><a href="{{ route('logout') }}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>



  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" navigation-header">
          <span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General"
          class=" ft-minus"></i>
        </li>
        <li class=" nav-item">
          <a href="{{ route('index-dashboard') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
        </li>  
        <li class=" nav-item">
          <a href="#"><i class="fa fa-list" aria-hidden="true"></i><span data-i18n="" class="menu-title">Inventory</span></a>
          <ul class="menu-content">
            <li><a href="{{ route('inventory-search') }}" class="menu-item">Search</a>
            </li>
            <li><a href="{{ route('inventory-search') }}?vLoc=All&vNewUsed=All&vType=All&vRetail=80000&vYear=All&vMake=All&vModel=&vOdometer=All&vFourDays=Y" class="menu-item">4 Days</a>
            </li>
            <li><a href="{{ route('inventory-search') }}?vLoc=All&vNewUsed=All&vType=All&vRetail=80000&vYear=All&vMake=All&vModel=&vOdometer=All&v14Days=Y" class="menu-item">14 Days</a>
            </li>
            <li><a href="{{ route('inventory-list-print') }}" class="menu-item">Print</a>
            </li>
            <li><a href="{{ route('inventory-count') }}" class="menu-item">Inventory Count</a>
            </li>
            <li><a href="{{ route('inventory-description') }}" class="menu-item">Inventory Descriptions</a>
            </li>
            <li><a href="{{ route('inventory-tradein-listviews') }}" class="menu-item">Trade in List View</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>