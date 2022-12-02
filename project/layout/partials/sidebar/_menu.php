<?php
	$page=isset($_GET['page']) ? $_GET['page'] : 'index';  // Get the page name from the URL and set it to page, if it is null set page to index
?>


<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div style = "position:relative; top:200px;" id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"  data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
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
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
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
					<span class="menu-title">User Profile</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" <?php if ($page == "Personal-Info") { echo 'active'; } ?> href="?page=Personal-Info">
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
						<a class="menu-link" <?php if ($page == "Employment_Info") { echo 'active'; } ?> href="?page=Employment_Info">
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
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
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
					<span class="menu-title">Absence</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" <?php if ($page == "Leave_Aplication") { echo 'active'; } ?> href="?page=Leave_Aplication">
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
						<a class="menu-link" <?php if ($page == "Leave_Details") { echo 'active'; } ?> href="?page=Leave_Details">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Leave Details</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
				</div>
				<!--end:Menu sub-->
			</div>

			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
						<span class="svg-icon svg-icon-2">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor" />
								<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">Employees</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" <?php if ($page == "Employee_Details") { echo 'active'; } ?> href="?page=Employee_Details">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Employee Details</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" <?php if ($page == "Add_Employee") { echo 'active'; } ?> href="?page=Add_Employee">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Add Employee</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" <?php if ($page == "Leave_Aproval") { echo 'active'; } ?> href="?page=Leave_Aproval">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Leave Aproval</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

				</div>
				<!--end:Menu sub-->
			</div>
			<!--end:Menu item-->

		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->