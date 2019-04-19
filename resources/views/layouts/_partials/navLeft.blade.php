<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="./img/logo.png" alt="LaraStart Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Lara Start</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./img/man.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
         <li class="nav-item router-link-active">
           <router-link to="/dashboard" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt teal"></i>
             <p>
               Dashboard
               {{-- <span class="right badge badge-danger">New</span> --}}
             </p>
           </router-link>
         </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-cog orange"></i>
            <p>
              Management
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle-notch"></i>
                <p>Page1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle-notch"></i>
                <p>Page2</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <router-link to="/profile" class="nav-link">
            <i class="nav-icon fas fa-user blue"></i>
            <p>
              Profile
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </router-link>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="fas fa-power-off red"></i>
              <p>
                  {{ __('Logout') }}
              </p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
