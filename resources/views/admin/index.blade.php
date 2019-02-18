@include('admin.layouts.header')
@include('admin.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Admin
      <small>Control panel</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('admin.layouts.message')
    @yield('content')
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@include('admin.layouts.footer')