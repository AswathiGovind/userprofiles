<!DOCTYPE html>

<html lang="en" class="no-js">

@include('admin/includes/adminheader')

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
@include('admin/includes/adminsidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
        @yield('content')
	</div>
	<!-- END CONTENT -->
@include('admin/includes/adminfooter')
</html>