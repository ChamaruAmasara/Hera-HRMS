

			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Promote-Employees" or $page == "Edit-Branches" or $page == "Edit-Departments" or $page == "Edit-Organization" or $page == "leaveConfig" or $page == "Edit-Branch" or $page == "Edit-Department") { echo ' hover show'; } ?>">
				<!--begin:Menu link-->
				<span class="menu-link <?php if ($page == "Promote-Employees" or $page == "Edit-Branches" or $page == "Edit-Departments" or $page == "Edit-Organization" or $page == "leaveConfig" or $page == "Edit-Branch" or $page == "Edit-Department") { echo 'active'; } ?>">
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
						<a class="menu-link <?php if ($page == "Promote-Employees") { echo 'active'; } ?>"  href="?page=Promote-Employees">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Manage User Accounts</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

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
						<a class="menu-link <?php if ($page == "leaveConfig") { echo 'active'; } ?>"  href="?page=leaveConfig">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Configure Leave Counts</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php if ($page == "Edit-Branch") { echo 'active'; } ?>"  href="?page=Edit-Branch">
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
						<a class="menu-link <?php if ($page == "Edit-Department") { echo 'active'; } ?>"  href="?page=Edit-Department">
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