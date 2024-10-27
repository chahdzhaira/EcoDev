<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : Vite::asset('resources/assets/img/avatars/user-avatar.png') }}" 
         alt="User Image" 
        >
        <div>
        <p class="app-sidebar__user-name">{{ Auth::user()->username }}</p> <!-- Dynamic username -->
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="app-menu__icon bi bi-house"></i><span class="app-menu__label">Home Page</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-people"></i><span class="app-menu__label">Users Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('bootstrap-components')}}" ><i class="icon bi bi-circle-fill"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://icons.getbootstrap.com/" target="_blank" rel="noopener"><i class="icon bi bi-circle-fill"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="{{route('ui-cards')}}" ><i class="icon bi bi-circle-fill"></i> Cards</a></li>
            <li><a class="treeview-item" href="{{route('widgets')}}" ><i class="icon bi bi-circle-fill"></i> Widgets</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-trash"></i><span class="app-menu__label">Waste Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('form-components')}}"><i class="icon bi bi-circle-fill"></i> Form Components</a></li>
            <li><a class="treeview-item"  href="{{route('form-samples')}}" ><i class="icon bi bi-circle-fill"></i> Form Samples</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-box-arrow-in-down"></i><span class="app-menu__label">Deposit.C Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('table-basic')}}" ><i class="icon bi bi-circle-fill"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="{{route('table-data-table')}}" ><i class="icon bi bi-circle-fill"></i> Data Tables</a></li>
          </ul>
        </li>

        <li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon bi bi-truck"></i>
        <span class="app-menu__label">Delivery.C Management</span>
        <i class="treeview-indicator bi bi-chevron-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="treeview-item" href="{{ route('delivery-agences.index') }}">
                <i class="icon bi bi-circle-fill"></i> List of Delivery Agencies
            </a>
        </li>
        <li>
        
    </li>
  
    </ul>
        
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-recycle"></i><span class="app-menu__label">Recycling.C Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item"  href="{{route('blank-page')}}" ><i class="icon bi bi-circle-fill"></i> Blank Page</a></li>
            <li><a class="treeview-item"  href="{{route('page-login')}}" ><i class="icon bi bi-circle-fill"></i> Login Page</a></li>
            <li><a class="treeview-item"  href="{{route('page-lockscreen')}}" ><i class="icon bi bi-circle-fill"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item"  href="{{route('page-user')}}" ><i class="icon bi bi-circle-fill"></i> User Page</a></li>
            <li><a class="treeview-item"  href="{{route('page-invoice')}}" ><i class="icon bi bi-circle-fill"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="{{route('page-mailbox')}}"  ><i class="icon bi bi-circle-fill"></i> Mailbox</a></li>
            <li><a class="treeview-item"  href="{{route('page-error')}}" ><i class="icon bi bi-circle-fill"></i> Error Page</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-cart"></i><span class="app-menu__label">Sales.C Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('table-basic')}}" ><i class="icon bi bi-circle-fill"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="{{route('table-data-table')}}" ><i class="icon bi bi-circle-fill"></i> Data Tables</a></li>
          </ul>
        </li>
<li><a class="app-menu__item {{ request()->routeIs('publication.index') ? 'active' : '' }}" href="{{route('publication.index')}}"><i class="app-menu__icon bi bi-info-circle"></i><span class="app-menu__label">Awareness Management</span></a></li>

        <li>
    <a class="app-menu__item" href="{{ route('index') }}">
        <i class="app-menu__icon bi bi-house-door"></i> <!-- Updated icon -->
        <span class="app-menu__label">Front page</span>
    </a>
</li>

     
        <li>
        <a class="app-menu__item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="app-menu__icon bi bi-door-open"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        </li>

      </ul>
    </aside>