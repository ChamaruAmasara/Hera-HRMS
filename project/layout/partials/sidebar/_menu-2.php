
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if ($page == "Add-Employee" or $page == "Employee-Details" or $page == "Edit-Employee-Details") { echo ' hover show'; } ?>">
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


				</div>
				<!--end:Menu sub-->
			</div>
			<!--end:Menu item-->

