
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
            <i class="fa fa-gift"></i> <span>Coupon Management</span>
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

        <!-- CMS nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>CMS Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/cms') }}"><i class="fa fa-circle-o"></i> List CMS</a></li>
            <!-- Nav list for Product Management according to role of logged user start -->
            @if(Gate::check('isSuperAdmin') )
              <li><a href="{{ url('/admin/cms/create') }}"><i class="fa fa-circle-o"></i> Add CMS</a></li>
            @endif
            <!-- Nav list for Product Management according to role of logged user End -->
          </ul>
        </li>
        <!-- CMS nav End-->


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

        <!-- Order   nav start-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('order.list') }}"><i class="fa fa-circle-o"></i> List Order</a></li>
          </ul>
        </li>
        <!-- Order nav End-->

         <!-- Report   nav start-->
         <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('sale.report') }}"><i class="fa fa-circle-o"></i> Sale Report</a></li>
            <li><a href="{{ route('customer.report') }}"><i class="fa fa-circle-o"></i> Customer Registered Report </a></li>
            <li><a href="{{ route('coupon.report') }}"><i class="fa fa-circle-o"></i> Coupons Report </a></li>
          </ul>
        </li>
        <!-- Report nav End-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
