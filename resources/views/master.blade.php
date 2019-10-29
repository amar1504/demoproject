@include('header') <!-- include header blade -->

@include('sidebar') <!-- include sidebar blade -->

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box col-lg-12 col-xs-6">
            @yield('content') <!-- include Content -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /. Main content -->
  </div>
<!--/. Content Wrapper. Contains page content -->
  
@include('footer') <!-- include Footer blade -->