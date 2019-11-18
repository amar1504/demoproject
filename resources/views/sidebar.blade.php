
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        @if(isset(Auth::user()->image) && Auth::user()->image!="")
        <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-circle" alt="User Image">
        @else
        <img src="{{ asset('storage/users/user.jpg') }}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">&nbsp;&nbsp;&nbsp;MAIN NAVIGATION</li>


        <li class="">
          <a href="{{ url('/home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>

        </li>


        <!-- User Management nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/users') }}"><i class="fa fa-circle-o"></i> List User</a></li>
            <!-- Nav list for User Management according to role of logged user Start-->
            @if(Gate::check('isAdmin') || Gate::check('isSuperAdmin'))
              <li><a href="{{ url('/admin/users/create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
            @endif
            <!-- Nav list for User Management according to role of logged user  End-->
          </ul>
        </li>
        <!-- User Management nav End-->
      
        <!-- Role Management nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Role Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/roles') }}"><i class="fa fa-circle-o"></i> List Role</a></li>
            <!-- Nav list for Role Management according to role of logged user Start -->
            @if(Gate::check('isSuperAdmin'))
            <li><a href="{{ url('/admin/roles/create') }}"><i class="fa fa-circle-o"></i> Add Role</a></li>
            @endif
            <!-- Nav list for Role Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Role Management nav End-->

        <!-- Configuration Management nav start-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i> <span>Configuration Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/configuration') }}"><i class="fa fa-circle-o"></i> List Configuration</a></li>
            <!-- Nav list for Configuration Management according to role of logged user start -->
            @if( Gate::check('isSuperAdmin'))
            <li><a href="{{ url('/admin/configuration/create') }}"><i class="fa fa-circle-o"></i> Add Configuration</a></li>
            @endif
            <!-- Nav list for Configuration Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Configuration Management nav End-->

        <!-- Banner Management nav start-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-photo"></i> <span>Banner Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/banner') }}"><i class="fa fa-circle-o"></i> List Banner</a></li>
            <!-- Nav list for Banner Management according to role of logged user start -->
            @if( Gate::check('isSuperAdmin'))
            <li><a href="{{ url('/admin/banner/create') }}"><i class="fa fa-circle-o"></i> Add Banner</a></li>
            @endif
            <!-- Nav list for Banner Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Banner Management nav End-->

        <!-- Category Management nav start-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('/admin/category') }}"><i class="fa fa-circle-o"></i> List Category</a></li>
            <li><a href="{{ route('subcateory.list')  }}"><i class="fa fa-circle-o"></i> List Subcategory</a></li>
            <!-- Nav list for Category Management according to role of logged user start -->
            @if(Gate::check('isSuperAdmin') )
              <li><a href="{{ url('/admin/category/create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
            @endif
            <!-- Nav list for Category Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Category Management nav End-->

        <!-- Product Management nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Product Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/product') }}"><i class="fa fa-circle-o"></i> List Product</a></li>
            <!-- Nav list for Product Management according to role of logged user start -->
            @if(Gate::check('isSuperAdmin') )
              <li><a href="{{ url('/admin/product/create') }}"><i class="fa fa-circle-o"></i> Add Product</a></li>
            @endif
            <!-- Nav list for Product Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Product Management nav End-->


        <!-- Coupon Management nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-percent"></i> <span>Coupon Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/coupon') }}"><i class="fa fa-circle-o"></i> List Coupon</a></li>
            <!-- Nav list for Product Management according to role of logged user start -->
            @if(Gate::check('isSuperAdmin') )
              <li><a href="{{ url('/admin/coupon/create') }}"><i class="fa fa-circle-o"></i> Add Coupon</a></li>
            @endif
            <!-- Nav list for Product Management according to role of logged user End -->
          </ul>
        </li>
        <!-- Coupon Management nav End-->

        <!-- Contact Us  nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i> <span>Contact Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('contactus.list') }}"><i class="fa fa-circle-o"></i> List Contact Us</a></li>
          </ul>
        </li>
        <!-- Contact Us nav End-->


        <!--
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
