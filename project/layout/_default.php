<?php
	$page=isset($_GET['page']) ? $_GET['page'] : 'index';  // Get the page name from the URL and set it to page, if it is null set page to index
?>

<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
	<!--begin::Page-->
	<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
		<?php include 'layout/partials/_header.php' ?>
		<!--begin::Wrapper-->
		<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
			<?php include 'layout/partials/_sidebar.php' ?>
			<!--begin::Main-->
			<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
				<!--begin::Content wrapper-->
				<div class="d-flex flex-column flex-column-fluid">
					
					<?php 
					if ($page == 'index') {
	                    include 'layout/partials/_content.php  '; 
					}
					else if ($page == 'Personal-Info') {
						include '..\project\pages\User_Profile\PersonalInfo.php';
					}
					else if ($page == 'Employment_Info') {
						include '..\project\pages\User_Profile\Employment_Info.php';
					}
					else if ($page == 'Leave_Aplication') {
						include '..\project\pages\Absence\Leave_Aplication.php';
					}
					else if ($page == 'Leave_Details') {
						include '..\project\pages\Absence\Leave_Details.php';
					}
					else if ($page == 'Employee_Details') {
						include '..\project\pages\Employees\Employee_Details.php';
					}
					else if ($page == 'Add_Employee') {
						include '..\project\pages\Employees\Add_Employee.php';
					}
					else if ($page == 'Leave_Aproval') {
						include '..\project\pages\Employees\Leave_Aproval.php';
					}
					
					?>
				
				</div>
				<!--end::Content wrapper-->
				<?php include 'layout/partials/_footer.php' ?>
			</div>
			<!--end:::Main-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::App-->
<?php include 'partials/_drawers.php' ?>