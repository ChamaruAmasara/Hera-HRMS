<?php
	
	
	$filter=array('Department'=>'0','Job_Title'=>'0','Paygrade'=>'0','Employment_status'=>'0');
	$conditions = array('1=1', '1=1', '1=1', '1=1');
	// Handle submitions
	if(isset($_POST['submit'])){
		echo "submitted";
		$filter['Department'] = $_POST['Department'];
		$filter['Job_Title'] = $_POST['Job_Title'];
		$filter['Paygrade'] = $_POST['Paygrade'];
		$filter['Employment_status'] = $_POST['Employment_status'];
	}


	switch ($filter['Department']) {
		case '0':
			break;
		case 'Engineering':
			$conditions[0] = "DepartmentName = 'Engineering'";
			break;
		case 'HR':
			$conditions[0] = "DepartmentName = 'HR'";
			break;
		case 'Accounting':
			$conditions[0] = "DepartmentName = 'Accounting'";
			break;
		default:
			break;
	}
	switch($filter['Job_Title']){
		case '0':
			break;
		case 'Software_Engineer':
			$conditions[1] = "JobTitle = 'Software Engineer'";
			break;
		case 'QA_Engineer':
			$conditions[1] = "JobTitle = 'QA Engineer'";
			break;
		case 'Accountant':
			$conditions[1] = "JobTitle = 'Accountant'";
			break;
		default:
			break;
	}
	switch($filter['Paygrade']){
		case '0':
			break;
		case 'Level_1':
			$conditions[2] = "PayGrade = 'Level 1'";
			break;
		case 'Level_2':
			$conditions[2] = "PayGrade = 'Level 2'";
			break;
		case 'Level_3':
			$conditions[2] = "PayGrade = 'Level 3'";
			break;
		default:
			break;
	}
	switch($filter['Employment_status']){
		case '0':
			break;
		case 'Intern_Fulltime':
			$conditions[3] = "EmploymentStatus = 'Intern Fulltime'";
			break;
		case 'Intern_Parttime':
			$conditions[3] = "EmploymentStatus = 'Intern Parttime'";
			break;
		case 'Contract_Fulltime':
			$conditions[3] = "EmploymentStatus = 'Contract Fulltime'";
			break;
		case 'Contract_Parttime':
			$conditions[3] = "EmploymentStatus = 'Contract Parttime'";
			break;
		case 'Permanent':
			$conditions[3] = "EmploymentStatus = 'Permanent'";
			break;
		case 'Freelance':
			$conditions[3] = "EmploymentStatus = 'Freelance'";
			break;
		default:
			break;
	}
	$condition = implode(' AND ', $conditions);
	$where = "WHERE ".$condition;
	$empDetails = new UserDetails();
	$allEmployees = $empDetails->getAllemployeeSql($where);

	$count=mysqli_num_rows($allEmployees);

	include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
	include_once PROJECT_ROOT_PATH.'/includes/dbconfig.inc.php';
















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
										<form  href="?page=Employee-Details" method="POST">
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
														<input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" />
													</div>
													<!--end:Search-->
													<!--begin::Border-->
													<div class="separator separator-dashed my-8"></div>
													<!--end::Border-->


													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Department</label>
														<!--begin::Select-->
														<select name="Department" class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="0"   <?php if ($filter['Department']=='0') {echo 'selected="selected"';}  ?>>Not Selected</option>
															<option value="Engineering" <?php if ($filter['Department']=="Engineering") {echo 'selected="selected"';}  ?>>Engineering</option>
															<option value="HR" <?php if ($filter['Department']=="HR") {echo 'selected="selected"';}  ?>>HR</option>
															<option value="Accounting" <?php if ($filter['Department']=="Accounting") {echo 'selected="selected"';}  ?>>Accounting</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Job Title</label>
														<!--begin::Select-->
														<select name="Job_Title" class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="0" <?php if ($filter['Job_Title']=='0') {echo 'selected="selected"';}  ?>>Not Selected</option>
															<option value="Software_Engineer" <?php if ($filter['Job_Title']=='Software_Engineer') {echo 'selected="selected"';}  ?>>Software Engineer</option>
															<option value="QA_Engineer" <?php if ($filter['Job_Title']=='QA_Engineer') {echo 'selected="selected"';}  ?>>QA Engineer</option>
															<option value="Accuntant" <?php if ($filter['Job_Title']=='Accuntant') {echo 'selected="selected"';}  ?>>Accuntant</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Paygrade</label>
														<!--begin::Select-->
														<select name="Paygrade" class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="0" <?php if ($filter['Paygrade']=='0') {echo 'selected="selected"';}  ?>>Not Selected</option>
															<option value="Level_1" <?php if ($filter['Paygrade']=='Level_1') {echo 'selected="selected"';}  ?>>Level 1</option>
															<option value="Level_2" <?php if ($filter['Paygrade']=='Level_2') {echo 'selected="selected"';}  ?>>Level 2</option>
															<option value="Level_3" <?php if ($filter['Paygrade']=='Level_3') {echo 'selected="selected"';}  ?>>Level 3</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Employment status</label>
														<!--begin::Select-->
														<select name="Employment_status" class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="0" <?php if ($filter['Employment_status']=='0') {echo 'selected="selected"';}  ?>>Not Selected</option>
															<option value="Intern_Fulltime" <?php if ($filter['Employment_status']=='Intern_Fulltime') {echo 'selected="selected"';}  ?>>Intern Fulltime</option>
															<option value="Intern_Parttime" <?php if ($filter['Employment_status']=='Intern_Parttime') {echo 'selected="selected"';}  ?>>Intern Parttime</option>
															<option value="Contract_Fulltime" <?php if ($filter['Employment_status']=='Contract_Fulltime') {echo 'selected="selected"';}  ?>>Contract Fulltime</option>
															<option value="Contract_Parttime" <?php if ($filter['Employment_status']=='Contract_Parttime') {echo 'selected="selected"';}  ?>>Contract Parttime</option>
															<option value="Permanent" <?php if ($filter['Employment_status']=='Permanent') {echo 'selected="selected"';}  ?>>Permanent</option>
															<option value="Freelance" <?php if ($filter['Employment_status']=='Freelance') {echo 'selected="selected"';}  ?>>Freelance</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													



													<!--begin::Action-->
													<div class="d-flex align-items-center justify-content-end">
														<!-- <a href="#" class="btn btn-active-light-primary btn-color-gray-400 me-3">
															Discard
														</a> -->
														<form action="<? echo $PHP_SELF; ?>" method="POST">
															<input type="hidden" name="reset" value="RESET">
															<input type="submit" value="RESET" class="btn btn-light"></form>
														<input type="submit" name="submit" class="btn btn-primary">
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
												<h3 class="fw-bold me-5 my-1"><?php echo $count ?> Items Found</h3>
											</div>
											<!--end::Title-->
											<!--begin::Controls-->
											<div class="d-flex flex-wrap my-1">
												<!--begin::Tab nav-->
												
												<ul class="nav nav-pills me-6 mb-2 mb-sm-0">
													<li class="nav-item m-0">
														<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3 active" data-bs-toggle="tab" href="#kt_project_users_table_pane">
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
													<li class="nav-item m-0">
														<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary " data-bs-toggle="tab" href="#kt_project_users_card_pane">
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
												</ul>
												<!--end::Tab nav-->
	
											</div>
											<!--end::Controls-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Tab Content-->
										<div class="tab-content">

											<!-- Row tabs Begins here -->
											<!--begin::Tab pane-->
											<div id="kt_project_users_table_pane" class="tab-pane fade show active">
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
																			<th class="min-w-90px">Department</th>
																			<th class="min-w-50px text-end">Details</th>
																	</tr>
																</thead>
																<!--end::Head-->
																<!--begin::Body-->
																<tbody class="fs-7">
																	<?php
																	// $empDetails = new UserDetails();
																	// $allEmployees = $empDetails->getAllemployeeSql($where);


																	while ($row = $allEmployees->fetch_assoc()) {
																		?>
																		<tr>
																			<td>
																				<!--begin::User-->
																				<div class="d-flex align-items-center">
																					<!--begin::Wrapper-->
																					<div class="me-5 position-relative">
																						<!--begin::Avatar-->
																						<div class="symbol symbol-35px symbol-circle">
																							<img alt="Pic" src=<?php 
																							if ($row['ProfilePhoto']!=null) {
																								echo $row['ProfilePhoto']; 
																							}else{
																								echo "'assets\media\avatars\defult.jpg'";
																							}
																							
																							?> />
																						</div>
																						<!--end::Avatar-->
																					</div>
																					<!--end::Wrapper-->
																					<!--begin::Info-->
																					<div class="d-flex flex-column justify-content-center">
																						<a href="?page=Employee-Details&HiddenPage=Employee-Info&ID=<?php echo $row['EmployeeID']; ?>" class="mb-1 text-gray-800 text-hover-primary"><?php echo $row['Name'] ?></a>
																						<div class="fw-semibold fs-6 text-gray-400"><?php echo $row['Email'] ?></div>
																					</div>
																					<!--end::Info-->
																				</div>
																				<!--end::User-->
																			</td>
																			<td><?php echo $row['BirthDate'] ?></td>
																			<td><?php echo $row['JobTitle'] ?></td>
																			<td><?php echo $row['PayGrade'] ?></td>
																			
																			<td><?php echo $row['DepartmentName'] ?></td>
																			<td class="text-end">
																				<a href="#" class="btn btn-light btn-sm">Edit</a>
																			</td>
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

											<!-- Card Tabs Begins here -->
											<!--begin::Tab pane-->
											<div id="kt_project_users_card_pane" class="tab-pane fade">
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