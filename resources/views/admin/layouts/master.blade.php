@include('admin.templetes.head')

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
	@include('admin.templetes.header')
	@include('admin.templetes.left-sidebar')
  
  

  @yield('main-content')

  @include('admin.templetes.footer')
  <!-- Control Sidebar -->
  @include('admin.templetes.right-popup')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	@include('admin.templetes.right-side-icon')
	<!-- Sidebar -->
		
	@include('admin.templetes.chat-boot')
	
	<!-- Page Content overlay -->
	
	@include('admin.templetes.footer-js')
	
	
</body>
</html>
