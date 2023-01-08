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
					<span class="menu-title">User Profile</span>
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
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Leave-Application" or $page == "Leave-Details") { echo ' hover show'; } ?>">
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
					<span class="menu-title">Absence</span>
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
				</div>
				<!--end:Menu sub-->
			</div>

			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Add-Employee" or $page == "Employee-Details" or $page == "Leave-Approval" or $page == "Edit-Employee-Details") { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Add-Employee" or $page == "Employee-Details" or $page == "Leave-Approval" or $page == "Edit-Employee-Details") { echo 'active'; } ?>">
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
						<a class="menu-link <?php if ($page == "Employee-Details") { echo 'active'; } ?>"  href="?page=Employee-Details">
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
						<a class="menu-link <?php if ($page == "Add-Employee") { echo 'active'; } ?>"  href="?page=Add-Employee">
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
						<a class="menu-link <?php if ($page == "Leave-Approval") { echo 'active'; } ?>"  href="?page=Leave-Approval">
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


			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Promote-Users" or $page == "User-Details" or $page == "Edit-User-Details") { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Promote-Users" or $page == "User-Details" or $page == "Edit-User-Details") { echo 'active'; } ?>">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
						<span class="svg-icon svg-icon-2">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="currentColor"></path>
														<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="currentColor"></path>
														<path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="currentColor"></path>
														<path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="currentColor"></path>
													</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">Users</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "User-Details") { echo 'active'; } ?>"  href="?page=User-Details">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">User Details</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Add-Employee") { echo 'active'; } ?>"  href="?page=Add-Employee">
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
						<a class="menu-link <?php if ($page == "Leave-Approval") { echo 'active'; } ?>"  href="?page=Leave-Approval">
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

			
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Edit-Branches" or $page == "Edit-Departments" or $page == "Edit-Organization") { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Edit-Branches" or $page == "Edit-Departments" or $page == "Edit-Organization") { echo 'active'; } ?>">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
						<span class="svg-icon svg-icon-2">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="currentColor"></path>
														<path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="currentColor"></path>
													</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">Settings</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Edit-Organization") { echo 'active'; } ?>"  href="?page=Edit-Organization">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Edit Organization</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Edit-Branches") { echo 'active'; } ?>"  href="?page=Edit-Branch">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Edit Branches</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Edit-Departments") { echo 'active'; } ?>"  href="?page=Edit-Department">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Edit Departments</span>
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






