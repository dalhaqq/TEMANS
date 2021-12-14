      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('/') }}">TEMANS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">TMS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            @role('owner')
            <li {{ Route::currentRouteName() == 'operators.index' ? 'class=active' : ''}}><a class="nav-link" href="{{ route('operators.index') }}"><i class="far fa-user"></i> <span>Kelola Operator</span></a></li>
            <li {{ Route::currentRouteName() == 'stands.index' ? 'class=active' : ''}}><a class="nav-link" href="{{ route('stands.index') }}"><i class="far fa-square"></i> <span>Kelola Stand</span></a></li>
            @endrole
            @role('operator')
            <li {{ Route::currentRouteName() == 'stands.index' ? 'class=active' : ''}}><a class="nav-link" href="{{ route('stands.index') }}"><i class="far fa-square"></i> <span>Kelola Stand</span></a></li>
            <li {{ Route::currentRouteName() == 'tenants.index' ? 'class=active' : ''}}><a class="nav-link" href="{{ route('tenants.index') }}"><i class="far fa-user"></i> <span>Kelola Tenant</span></a></li>
            @endrole
            @role('tenant')
            <li {{ Route::currentRouteName() == 'stands.list' ? 'class=active' : ''}}><a class="nav-link" href="{{ route('stands.list') }}"><i class="far fa-square"></i> <span>Lihat Stand</span></a></li>
            @endrole
          </ul>
        </aside>
      </div>
