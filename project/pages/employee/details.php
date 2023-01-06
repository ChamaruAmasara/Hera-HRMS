<?php
	include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
	include_once PROJECT_ROOT_PATH.'/includes/dbconfig.inc.php';
	$connection=openDatabaseConnection();
	
	$allEmployeesSql="SELECT * FROM employee";
	$allEmployeesResult=mysqli_query($connection, $allEmployeesSql);
	$allEmployees=mysqli_fetch_all($allEmployeesResult, MYSQLI_ASSOC);

	$empCountSql="SELECT COUNT(EmployeeID) FROM employee";
	$empCountResult=mysqli_query($connection, $empCountSql);
	$empCount=mysqli_fetch_array($empCountResult, MYSQLI_NUM);
	$empCount=$empCount[0];


?>


						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-fluid">
								<!--begin::Search vertical-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Aside-->
									<div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5">
										<!--begin::Form-->
										<form action="employeeFilter.php" method="post">
											<!--begin::Card-->
											<div class="card">
												<!--begin::Body-->
												<div class="card-body">
													<!--begin:Search-->
													<div class="position-relative">
														<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" id="search"/>
													</div>
													<!--end:Search-->
													<!--begin::Border-->
													<div class="separator separator-dashed my-8"></div>
													<!--end::Border-->


													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Department</label>
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="1" selected="selected">Not Selected</option>
															<option value="2">Engineering</option>
															<option value="3">HR</option>
															<option value="4">Accounting</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Job Title</label>
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="1" selected="selected">Not Selected</option>
															<option value="2" >Software Engineer</option>
															<option value="3">QA Engineer</option>
															<option value="4">Accuntant</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Paygrade</label>
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="1" selected="selected">Not Selected</option>
															<option value="2" >Level 1</option>
															<option value="3">Level 2</option>
															<option value="4">Level 3</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Employment status</label>
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="1" selected="selected">Not Selected</option>
															<option value="2" >Intern Fulltime</option>
															<option value="3">Intern Parttime</option>
															<option value="4">Contract Fulltime</option>
															<option value="5">Contract Parttime</option>
															<option value="6">Permanent</option>
															<option value="7">Freelance</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													



													<!--begin::Action-->
													<div class="d-flex align-items-center justify-content-end">
														<a href="#" class="btn btn-active-light-primary btn-color-gray-400 me-3">Discard</a>
														<a href="#" class="btn btn-primary">Search</a>
													</div>
													<!--end::Action-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::Card-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Aside-->
									<!--begin::Layout-->
									<div class="flex-lg-row-fluid">
										<!--begin::Toolbar-->
										<div class="d-flex flex-wrap flex-stack pb-7">
											<!--begin::Title-->
											<div class="d-flex flex-wrap align-items-center my-1">
												<h3 class="fw-bold me-5 my-1">57 Items Found
												<span class="text-gray-400 fs-6">by Recent Updates ↓</span></h3>
											</div>
											<!--end::Title-->
											<!--begin::Controls-->
											<div class="d-flex flex-wrap my-1">
												<!--begin::Tab nav-->
												<ul class="nav nav-pills me-6 mb-2 mb-sm-0">
													<li class="nav-item m-0">
														<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3 active" data-bs-toggle="tab" href="#kt_project_users_card_pane">
															<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																		<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																		<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																		<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</li>
													<li class="nav-item m-0">
														<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary" data-bs-toggle="tab" href="#kt_project_users_table_pane">
															<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
															<span class="svg-icon svg-icon-2">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
																	<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</li>
												</ul>
												<!--end::Tab nav-->
												<!--begin::Actions-->
												<div class="d-flex my-0">
													<!--begin::Select-->
													<select name="status" data-control="select2" data-hide-search="true" data-placeholder="Filter" class="form-select form-select-sm border-body bg-body w-150px me-5">
														<option value="1">Recently Updated</option>
														<option value="2">Last Month</option>
														<option value="3">Last Quarter</option>
														<option value="4">Last Year</option>
													</select>
													<!--end::Select-->
													<!--begin::Select-->
													<select name="status" data-control="select2" data-hide-search="true" data-placeholder="Export" class="form-select form-select-sm border-body bg-body w-100px">
														<option value="1">Excel</option>
														<option value="1">PDF</option>
														<option value="2">Print</option>
													</select>
													<!--end::Select-->
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Controls-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Tab Content-->
										<div class="tab-content">

											<!-- Card Tabs Begins here -->
											<!--begin::Tab pane-->
											<div id="kt_project_users_card_pane" class="tab-pane fade show active">
												<!--begin::Row-->
												<div class="row g-6 g-xl-9">
													<!--begin::Col-->
													<div class="col-md-6 col-xl-12 col-xxl-6">
														<!--begin::Card-->
														<div class="card">
															<!--begin::Card body-->
															<div class="card-body d-flex flex-center flex-column pt-12 p-9">
																<!--begin::Avatar-->
																<div class="symbol symbol-65px symbol-circle mb-5">
																	<img src="assets/media//avatars/300-2.jpg" alt="image" />
																	<div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
																</div>
																<!--end::Avatar-->
																<!--begin::Name-->
																<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">Karina Clark</a>
																<!--end::Name-->
																<!--begin::Position-->
																<div class="fw-semibold text-gray-400 mb-6">Art Director at Novica Co.</div>
																<!--end::Position-->
																<!--begin::Info-->
																<div class="d-flex flex-center flex-wrap">
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">$14,560</div>
																		<div class="fw-semibold text-gray-400">Earnings</div>
																	</div>
																	<!--end::Stats-->
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">23</div>
																		<div class="fw-semibold text-gray-400">Tasks</div>
																	</div>
																	<!--end::Stats-->
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">$236,400</div>
																		<div class="fw-semibold text-gray-400">Sales</div>
																	</div>
																	<!--end::Stats-->
																</div>
																<!--end::Info-->
															</div>
															<!--end::Card body-->
														</div>
														<!--end::Card-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col-md-6 col-xl-12 col-xxl-6">
														<!--begin::Card-->
														<div class="card">
															<!--begin::Card body-->
															<div class="card-body d-flex flex-center flex-column pt-12 p-9">
																<!--begin::Avatar-->
																<div class="symbol symbol-65px symbol-circle mb-5">
																	<span class="symbol-label fs-2x fw-semibold text-primary bg-light-primary">S</span>
																	<div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
																</div>
																<!--end::Avatar-->
																<!--begin::Name-->
																<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">Sean Bean</a>
																<!--end::Name-->
																<!--begin::Position-->
																<div class="fw-semibold text-gray-400 mb-6">Developer at Loop Inc</div>
																<!--end::Position-->
																<!--begin::Info-->
																<div class="d-flex flex-center flex-wrap">
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">$14,560</div>
																		<div class="fw-semibold text-gray-400">Earnings</div>
																	</div>
																	<!--end::Stats-->
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">23</div>
																		<div class="fw-semibold text-gray-400">Tasks</div>
																	</div>
																	<!--end::Stats-->
																	<!--begin::Stats-->
																	<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																		<div class="fs-6 fw-bold text-gray-700">$236,400</div>
																		<div class="fw-semibold text-gray-400">Sales</div>
																	</div>
																	<!--end::Stats-->
																</div>
																<!--end::Info-->
															</div>
															<!--end::Card body-->
														</div>
														<!--end::Card-->
													</div>
													<!--end::Col-->

												</div>
												<!--end::Row-->
												<!--begin::Pagination-->
												<div class="d-flex flex-stack flex-wrap pt-10">
													<div class="fs-6 fw-semibold text-gray-700">Showing 1 to 10 of 50 entries</div>
													<!--begin::Pages-->
													<ul class="pagination">
														<li class="page-item previous">
															<a href="#" class="page-link">
																<i class="previous"></i>
															</a>
														</li>
														<li class="page-item active">
															<a href="#" class="page-link">1</a>
														</li>
														<li class="page-item">
															<a href="#" class="page-link">2</a>
														</li>
														<li class="page-item">
															<a href="#" class="page-link">3</a>
														</li>
														<li class="page-item">
															<a href="#" class="page-link">4</a>
														</li>
														<li class="page-item">
															<a href="#" class="page-link">5</a>
														</li>
														<li class="page-item">
															<a href="#" class="page-link">6</a>
														</li>
														<li class="page-item next">
															<a href="#" class="page-link">
																<i class="next"></i>
															</a>
														</li>
													</ul>
													<!--end::Pages-->
												</div>
												<!--end::Pagination-->
											</div>
											<!--end::Tab pane-->
											<!-- Card Tabs Ends here -->

											<!-- Row tabs Begins here -->
											<!--begin::Tab pane-->
											<div id="kt_project_users_table_pane" class="tab-pane fade">
												<!--begin::Card-->
												<div class="card card-flush">
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
																<!--begin::Head-->
																<thead class="fs-7 text-gray-400 text-uppercase">
																	<tr>
																			<th class="min-w-250px">Employee</th>
																			<th class="min-w-150px">Birth Date</th>
																			<th class="min-w-90px">Job Title</th>
																			<th class="min-w-90px">Paygrade</th>									
																			<th class="min-w-50px text-end">Details</th>
																			<th class="min-w-90px">Department</th>
																	</tr>
																</thead>
																<!--end::Head-->
																<!--begin::Body-->
																<tbody class="fs-7">
																	<?php
																	
																	for ($i = 0; $i < sizeof($allEmployees); $i++) {
																		
																	    $empID=$allEmployees[$i]['EmployeeID'];

																		$empDetails=new UserDetails(EmployeeID:$empID); 
																		?>
																		<tr>
																			<td>
																				<!--begin::User-->
																				<div class="d-flex align-items-center">
																					<!--begin::Wrapper-->
																					<div class="me-5 position-relative">
																						<!--begin::Avatar-->
																						<div class="symbol symbol-35px symbol-circle">
																							<img alt="Pic" src=<?php echo $empDetails->getProfilePic() ?> />
																						</div>
																						<!--end::Avatar-->
																					</div>
																					<!--end::Wrapper-->
																					<!--begin::Info-->
																					<div class="d-flex flex-column justify-content-center">
																						<a href="" class="mb-1 text-gray-800 text-hover-primary"><?php echo $empDetails->getFullName() ?></a>
																						<div class="fw-semibold fs-6 text-gray-400"><?php echo $empDetails->getEmail() ?></div>
																					</div>
																					<!--end::Info-->
																				</div>
																				<!--end::User-->
																			</td>
																			<td><?php echo $empDetails->getBDay() ?></td>
																			<td><?php echo $empDetails->getJobTitle() ?></td>
																			<td><?php echo $empDetails->getPayGrade() ?></td>
																			<td class="text-end">
																				<a href="#" class="btn btn-light btn-sm">Edit</a>
																			</td>
																			<td><?php echo $empDetails->getDeptName() ?></td>
																		</tr>
																		<?php
																	}
																	?>
															
																	</tbody>
																<!--end::Body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table container-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Tab pane-->
											<!-- Row tabs Ends here -->


										</div>
										<!--end::Tab Content-->
									</div>
									<!--end::Layout-->
								</div>
								<!--begin::Search vertical-->
							</div>
							<!--end::Content container-->
						</div>
						<!--end::Content-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->

		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/apps/projects/users/users.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>