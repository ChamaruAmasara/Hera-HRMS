<?php
	$page=isset($_GET['page']) ? $_GET['page'] : 'index';  // Get the page name from the URL and set it to page, if it is null set page to index
?>



<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div style = "position:relative; top:0px;" id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"  data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
			<!--begin:Menu item-->
			<div class="menu-item pt-5">
				<!--begin:Menu content-->
				<div class="menu-content">
					<span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
				</div>
				<!--end:Menu content-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Personal-Info" or $page == "Employment-Info") { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Personal-Info" or $page == "Employment-Info") { echo 'active'; } ?>">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
						<span class="svg-icon svg-icon-2">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
								<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">My Profile</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Personal-Info") { echo 'active'; } ?>"  href="?page=Personal-Info">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Personal Info</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Employment-Info") { echo 'active'; } ?>"  href="?page=Employment-Info">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Employment Info</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
				</div>
				<!--end:Menu sub-->
			</div>
			<!--end:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Leave-Application" or $page == "Leave-Details" or $page == "Leave-Approval" ) { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Leave-Application" or $page == "Leave-Details") { echo ' active'; } ?>">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
						<span class="svg-icon svg-icon-2">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="currentColor" />
								<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">Leaves</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Leave-Application") { echo 'active'; } ?>"  href="?page=Leave-Application">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Leave Aplication</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Leave-Details") { echo 'active'; } ?>"  href="?page=Leave-Details">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Leave Details</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<?php 

					//Leave approval
					//admin, secondmanagement, supervisor, hradmin has access to the leave approval
					if (in_array($_SESSION['UserAccountLevelID'],array(1,3,4,5))){
						include PROJECT_ROOT_PATH.'/layout/partials/sidebar/_menu-1.php' ;
						} ?>
				</div>
				<!--end:Menu sub-->
			</div>


			<?php 

			//Employees
			//admin, secondmanagement, hradmin has access to the Employee management and settings
			if (in_array($_SESSION['UserAccountLevelID'],array(1,3,4,6))){
				include PROJECT_ROOT_PATH.'/layout/partials/sidebar/_menu-2.php' ;
				} 


			//Settings items
			//admin, secondmanagement, has access to the Employee management and settings
			if (in_array($_SESSION['UserAccountLevelID'],array(1,3,6))){
				include PROJECT_ROOT_PATH.'/layout/partials/sidebar/_menu-3.php' ;
				} 
			?>

		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->






