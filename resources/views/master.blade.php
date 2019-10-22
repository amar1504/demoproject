@include('header') <!-- include header blade -->

@include('sidebar') <!-- include sidebar blade -->

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- /. Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
            @yield('content') <!-- include Content -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /. Main content -->
  </div>
<!--/. Content Wrapper. Contains page content -->
  
@include('footer') <!-- include Footer blade -->