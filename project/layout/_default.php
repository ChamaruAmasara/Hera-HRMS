<?php
	$page=isset($_GET['page']) ? $_GET['page'] : 'index';  // Get the page name from the URL and set it to page, if it is null set page to index
	$SubPage=isset($_GET['SubPage']) ? $_GET['SubPage'] : '';
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
	                    include PROJECT_ROOT_PATH.'/layout/partials/_content.php'; 
					}
					else if ($SubPage == 'Employee-Info' AND $page == 'Employee-Details') {
						include PROJECT_ROOT_PATH.'\pages\employee\info.php';
					}
					else if ($page == 'Personal-Info') {
						include PROJECT_ROOT_PATH.'/pages/user/profile.php';
					}
					else if ($page == 'Employment-Info') {
						include PROJECT_ROOT_PATH.'/pages/user/employment.php';
					}
					else if ($page == 'Leave-Application') {
						include PROJECT_ROOT_PATH.'/pages/leave/application.php';
					}
					else if ($page == 'Leave-Details') {
						include PROJECT_ROOT_PATH.'/pages/leave/details.php';
					}					
					else if ($page == 'Employee-Details') {
						include PROJECT_ROOT_PATH.'/pages/employee/details.php';
					}
					else if ($page == 'Add-Employee') {
						include PROJECT_ROOT_PATH.'/pages/employee/add.php';
					}
					else if ($page == 'Leave-Approval' AND $SubPage == 'ViewLeaveAplication') {
						include PROJECT_ROOT_PATH.'\pages\employee\ViewLeaveAplication.php';
					}
					else if ($page == 'Leave-Approval') {
						include PROJECT_ROOT_PATH.'/pages/employee/leaveApproval.php';
					}
					else if ($page == 'Edit-Organization') {
						include PROJECT_ROOT_PATH.'/pages/employee/editorganization.php';
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