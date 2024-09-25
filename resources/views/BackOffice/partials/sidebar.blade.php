<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{route('dashboard')}}"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('bootstrap-components')}}" ><i class="icon bi bi-circle-fill"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://icons.getbootstrap.com/" target="_blank" rel="noopener"><i class="icon bi bi-circle-fill"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="{{route('ui-cards')}}" ><i class="icon bi bi-circle-fill"></i> Cards</a></li>
            <li><a class="treeview-item" href="{{route('widgets')}}" ><i class="icon bi bi-circle-fill"></i> Widgets</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-ui-checks"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('form-components')}}"><i class="icon bi bi-circle-fill"></i> Form Components</a></li>
            <li><a class="treeview-item"  href="{{route('form-samples')}}" ><i class="icon bi bi-circle-fill"></i> Form Samples</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-table"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('table-basic')}}" ><i class="icon bi bi-circle-fill"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="{{route('table-data-table')}}" ><i class="icon bi bi-circle-fill"></i> Data Tables</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-file-earmark"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
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
        <li><a class="app-menu__item" href="{{route('docs')}}"><i class="app-menu__icon bi bi-code-square"></i><span class="app-menu__label">Docs</span></a></li>
      </ul>
    </aside>