<!--begin::Engage widget 10-->
<div class="card card-flush h-md-100">
	<!--begin::Body-->
	<div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
		<!--begin::Wrapper-->
		<div class="mb-10">
			<!--begin::Title-->
			<div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
			<span class="me-2">Welcome to 
			<span class="position-relative d-inline-block text-primary">
				<a href="" class="text-primary opacity-75-hover">Hera</a>!
				<!--begin::Separator-->
				<span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-primary border-bottom w-100"></span>
				<!--end::Separator-->
			</span></span><br> <font size="-1">The Modern Human Resource Management System</font></div>
			<!--end::Title-->
			<!--begin::Action 
		
					<div class="text-center">
				<a href='?page=Employee-Details' class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_view_employees">Explore Employees</a>
			</div>
		-->
			<div class="text-center">
				<a href='?page=Employee-Details' class="btn btn-sm btn-dark fw-bold">Explore Employees</a>
			</div>
			<!--begin::Action-->
		</div>
		<!--begin::Wrapper-->
		<!--begin::Illustration-->
		<img class="mx-auto h-150px h-lg-200px theme-light-show" src="assets/media/illustrations/misc/upgrade.svg" alt="" />
		<img class="mx-auto h-150px h-lg-200px theme-dark-show" src="assets/media/illustrations/misc/upgrade-dark.svg" alt="" />
		<!--end::Illustration-->
	</div>
	<!--end::Body-->
</div>
<!--end::Engage widget 10-->

		<!--begin::Modal - Upgrade plan-->
		<div class="modal fade" id="kt_view_employees" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">View Employees</h1>
							<div class="text-muted fw-semibold fs-5">To see more details
							<a href="?page=Employee-Detail" class="link-primary fw-bold">Visit Employee Details Page</a>.</div>
						</div>
						<!--end::Heading-->

						<?php include 'pages\employee\details.php'; ?>
						<!--begin::Actions-->
						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" id="kt_view_employees_btn">
								<!--begin::Indicator label-->
								<span class="indicator-label">Upgrade Plan</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Upgrade plan-->