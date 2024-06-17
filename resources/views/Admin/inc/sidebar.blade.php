<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home/" class="brand-link">
      <img src="{{asset('Admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HomePage</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{asset('Admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
      
          {{-- <a href="#" class="d-block"> {{ Auth::Admin()->name }}
    
          </a> --}}
         
        </div>
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class=""></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/user/" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/feedback/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedbacks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/product/productsPendingOrRejecting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request To Sell</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/product/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/charity" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Charities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/donation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
           
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>