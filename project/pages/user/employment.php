<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

<?php include '..\project\layout\partials\_profile-header.php'; ?>

<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
										<!--begin::Card header-->
										<div class="card-header cursor-pointer">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Employment Details</h3>
											</div>
											<!--end::Card title-->
											
										</div>
										<!--begin::Card header-->
										<!--begin::Card body-->
										<div class="card-body p-9">
											<!--begin::Row-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Job Title</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo $jobTitle  ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Pay Grade</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<span class="fw-semibold text-gray-800 fs-6"><?php echo $payGrade  ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Employment State</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $empStat  ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Supervisor name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $supervisorName  ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											
											
										</div>
										<!--end::Card body-->
									</div>
									<!--end::details View-->

	</div>
</div>