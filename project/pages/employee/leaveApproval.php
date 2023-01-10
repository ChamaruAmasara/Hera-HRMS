<?php
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	// check for if the previous Application was Accepted or Rejected and act accordingly
	$act=isset($_GET['act']) ? $_GET['act'] : '';
	$leaveId=isset($_GET['lid']) ? $_GET['lid'] : '';

	$errors=array();
	$success=array();
	$messages=array();

	if($act=='appr' && $leaveId!=''){
		$sql = "UPDATE hera.leave SET Approved = 'Approved' WHERE LeaveID = $leaveId;";
        $res = $mysqli->query($sql);
		$success[] = "Leave Application Approved";
	}elseif ($act=='rej' && $leaveId!='') {
		$sql = "UPDATE hera.leave SET Approved = 'Rejected' WHERE LeaveID = $leaveId;";
        $res = $mysqli->query($sql);
		$errors[] = "Leave Application Rejected";
	}

	$sqlLe = "SELECT * FROM hera.leave;";
    $resLe = $mysqli->query($sqlLe);
	//get current date time to store in mysql database
	$TodateTime = date('Y-m-d H:i:s');

	while($rowLe=$resLe->fetch_assoc()){
		$logDateTime = $rowLe['LeaveLogDateTime'];

		$day2=new DateTime($TodateTime);
		$day1=new DateTime($logDateTime);

		//count leave day count from $date2-$date1
		$DayDifference = $day2->diff($day1)->format("%a")+1;

		if ($DayDifference>365) {
			$lID=$rowLe['LeaveID'];
			$sql = "DELETE FROM hera.leave WHERE LeaveID =$lID ;";
        	$res = $mysqli->query($sql);
		}
	}

	

	$filter=array('Department'=>'0','Job_Title'=>'0','Leave_Type'=>'0','Absent_From'=>'0','Search'=>'');
	$conditions = array('1=1', '1=1', '1=1', '1=1', '1=1');
	// Handle submitions

	if(isset($_POST['submit'])){
		$filter['Department'] = isset($_POST['Department']) ? $_POST['Department'] : '0';
		$filter['Job_Title'] = isset($_POST['Job_Title']) ? $_POST['Job_Title'] : '0';
		$filter['Leave_Type'] = isset($_POST['Leave_Type']) ? $_POST['Leave_Type'] : '0';

		if ($_POST['Absent_From']) {
		$filter['Absent_From'] = $_POST['Absent_From'];
		}

		// $filter['Absent_From'] = !is_null($_POST['Absent_From']) AND isset($_POST['Absent_From']) ? $_POST['Absent_From'] : '0';
		$filter['Search'] = isset($_POST['Search']) ? $_POST['Search'] : '';
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
		switch ($filter['Leave_Type']) {
			case '0':
				break;
			case 'Annual':
				$conditions[2] = "LeaveType = 'Annual'";
				break;
			case 'Casual':
				$conditions[2] = "LeaveType = 'Casual'";
				break;
			case 'Maternity':
				$conditions[2] = "LeaveType = 'Maternity'";
				break;
			case 'No-Pay':
				$conditions[2] = "LeaveType = 'No-Pay'";
				break;
			default:
				break;
		}

		if ($filter['Absent_From']!='0') {
			$conditions[3]="FirstAbsentDate = '".$filter['Absent_From']."'";
		}
		
	
	if($filter['Search'] != ''){
		$conditions[4] = "Name LIKE '%".$filter['Search']."%' OR Email LIKE '%".$filter['Search']."%' ";
	}
	$condition = implode(' AND ', $conditions);
	$where = " Approved='Pending' AND ".$condition;
	$leaveDetails = new Leavedetails();
	$allLeaves = $leaveDetails->getLeaveDetails($where);

	
	
	

	$count=mysqli_num_rows($allLeaves);

	include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
	include_once PROJECT_ROOT_PATH.'/includes/dbconfig.inc.php';

?>
										<?php
										if ($errors){
											foreach ($errors as $error) {
												echo <<<EOT

												<!--begin::Alert-->
												<div class="alert alert-danger d-flex align-items-center p-5">
													<!--begin::Icon-->
													<span class="svg-icon svg-icon-2hx svg-icon-danger me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
													<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
												</svg></span>
													<!--end::Icon-->
												
													<!--begin::Wrapper-->
													<div class="d-flex flex-column">
														<!--begin::Title-->
														<h4 class="mb-1 text-danger">Error</h4>
														<!--end::Title-->
														<!--begin::Content-->
														<span>
												EOT;
												echo $error;
												echo <<<EOT
												</span>
														<!--end::Content-->
													</div>
													<!--end::Wrapper-->
													<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
														<i class="bi bi-x fs-1 text-danger"></i>
													</button>
												</div>
												<!--end::Alert-->

												EOT;
											}
										}
										if ($messages){
										foreach ($messages as $message) {
											echo <<<EOT

											<!--begin::Alert-->
											<div class="alert alert-primary d-flex align-items-center p-5">
												<!--begin::Icon-->
												<span class="svg-icon svg-icon-2hx svg-icon-primary me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
												<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
											</svg></span>
												<!--end::Icon-->
											
												<!--begin::Wrapper-->
												<div class="d-flex flex-column">
													<!--begin::Title-->
													<h4 class="mb-1 text-primary">Notice</h4>
													<!--end::Title-->
													<!--begin::Content-->
													<span>
											EOT;
											echo $message;
											echo <<<EOT
											</span>
													<!--end::Content-->
												</div>
												<!--end::Wrapper-->
												<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
													<i class="bi bi-x fs-1 text-primary"></i>
												</button>
											</div>
											<!--end::Alert-->

											EOT;
										}
										}
											if ($success) {
												foreach ($success as $success1) {
													echo <<<EOT

											<!--begin::Alert-->
											<div class="alert alert-success d-flex align-items-center p-5">
												<!--begin::Icon-->
												<span class="svg-icon svg-icon-2hx svg-icon-success me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
												<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
											</svg></span>
												<!--end::Icon-->
											
												<!--begin::Wrapper-->
												<div class="d-flex flex-column">
													<!--begin::Title-->
													<h4 class="mb-1 text-success">Success</h4>
													<!--end::Title-->
													<!--begin::Content-->
													<span>
											EOT;
											echo $success1;
											echo <<<EOT
											</span>
													<!--end::Content-->
												</div>
												<!--end::Wrapper-->
												<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
													<i class="bi bi-x fs-1 text-success"></i>
												</button>
											</div>
											<!--end::Alert-->

											EOT;
											}
										}

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
										<form method="POST">
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
														<input type="text" class="form-control form-control-solid ps-10" name="Search" value="" data-hide-search="true" placeholder="Search" />
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
														<label class="fs-6 form-label fw-bold text-dark">Leave Type</label>
														<!--begin::Select-->
														<select name="Leave_Type" class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
															<option value="0" <?php if ($filter['Leave_Type']=='0') {echo 'selected="selected"';}  ?>>Not Selected</option>
															<option value="Annual" <?php if ($filter['Leave_Type']=='Annual') {echo 'selected="selected"';}  ?>>Annual</option>
															<option value="Casual" <?php if ($filter['Leave_Type']=='Casual') {echo 'selected="selected"';}  ?>>Casual</option>
															<option value="Maternity" <?php if ($filter['Leave_Type']=='Maternity') {echo 'selected="selected"';}  ?>>Maternity</option>
															<option value="No-Pay" <?php if ($filter['Leave_Type']=='No-Pay') {echo 'selected="selected"';}  ?>>No-Pay</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-5">
														<label class="fs-6 form-label fw-bold text-dark">Absent From</label>


															<!--brgin::Input gropu-->
															<!--begin::Row-->
															<div class="row mb-6">
															
															<!--begin::Col-->
															<div class="col-lg-8 fv-row">
																<div class="position-relative d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																	<span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																			<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																			<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	<input class="form-control form-control-solid ps-12"  name="Absent_From" placeholder="<?php 
																	if ($filter['Absent_From']!='0') {
																		echo $filter['Absent_From'];
																	}
																	else{
																		echo 'Absent From';
																	}	
																	
																	
																	?>" id="kt_datepicker_1_2" required/>
																</div>
															</div>
															<!--begin::Col-->
															</div>
															<!--end::Row-->
															<!--end::Input group-->


													</div>
													<!--end::Input group-->

													



													<!--begin::Action-->
													<div class="d-flex align-items-center justify-content-end">
														 <a href="?page=Leave-Approval" class="btn btn-active-light-primary btn-color-gray-400 me-3">
															Discards
														</a>
														<!-- <form action="" method="POST">
															<input type="hidden" name="reset" value="RESET">
															<input type="submit" value="RESET" class="btn btn-light"></form>-->
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
												<h1 class="fw-bold me-5 my-1">Leave Approval:</h1><h5 class="fw-bold me-5 my-1"><?php echo $count ?> Items Found</h5>
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
																			<th class="min-w-150px">Absent From</th>
																			<th class="min-w-90px">Leave Type</th>
																			<th class="min-w-90px">Job Title</th>		
																			<th class="min-w-90px">Department</th>
																			<th class="min-w-50px text-center">Details</th>
																	</tr>
																</thead>
																<!--end::Head-->
																<!--begin::Body-->
																<tbody class="fs-7">
																	<?php
																	// $empDetails = new UserDetails();
																	// $allLeaves = $empDetails->getallLeavesql($where);


																	while ($row = $allLeaves->fetch_assoc()) {
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
																								echo "'assets\media\avatars\default.jpg'";
																							}
																							
																							?> />
																						</div>
																						<!--end::Avatar-->
																					</div>
																					<!--end::Wrapper-->
																					<!--begin::Info-->
																					<div class="d-flex flex-column justify-content-center">
																						<a href="?page=Employee-Details&SubPage=Employee-Info&ID=<?php echo $row['EmployeeID']; ?>" class="mb-1 text-gray-800 text-hover-primary"><?php echo $row['Name'] ?></a>
																						<div class="fw-semibold fs-6 text-gray-400"><?php echo $row['Email'] ?></div>
																					</div>
																					<!--end::Info-->
																				</div>
																				<!--end::User-->
																			</td>
																			<td><?php echo $row['FirstAbsentDate'] ?></td>
																			<td><?php echo $row['LeaveType'] ?></td>
																			<td><?php echo $row['JobTitle'] ?></td>
																			
																			
																			<td><?php echo $row['DepartmentName'] ?></td>
																			<td class="text-end">
																				<a href="?page=Leave-Approval&SubPage=ViewLeaveAplication&ID=<?php echo $row['LeaveID']; ?>" class="btn btn-secondary btn-sm">View Leave Aplication</a>
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
		<script src="assets/js/custom/dateRange.js"></script>
				
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>