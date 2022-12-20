@include('admin.partials.head')

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
	@include('admin.partials.header')
	@include('admin.partials.left-sidebar')
  
  

  @yield('main-content')

  @include('admin.partials.footer')
  <!-- Control Sidebar -->
  @include('admin.partials.right-popup')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	@include('admin.partials.right-side-icon')
	<!-- Sidebar -->
		
	@include('admin.partials.chat-boot')
	
	<!-- Page Content overlay -->
	
	@include('admin.partials.footer-js')
	
	
</body>
</html>
