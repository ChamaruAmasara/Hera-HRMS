
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

<?php 
	require_once PROJECT_ROOT_PATH.'/layout/partials/_profile-header.php';
	include_once PROJECT_ROOT_PATH.'/includes/dbconfig.inc.php';

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	//include '/../../layout/partials/_profile-header.php';
	$userDetails= $_SESSION['User'];
	$userDetailsArray = $userDetails->getUserDetailArray();

	$orgName = $userDetailsArray['OrganizationName'];
	$userName = $userDetailsArray['Name'];
	$emial= $userDetailsArray['Email'];
	$bDay = $userDetailsArray['BirthDate'];
	$emgContName = $userDetailsArray['EmergencyContactName'];
	$emgContPhone = $userDetailsArray['EmergencyContactPhoneNum'];
	$maritalStat = $userDetailsArray['MaritalStatus'];
		
?>


<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
										<!--begin::Card header-->
										<div class="card-header cursor-pointer">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
											
										</div>
										<!--begin::Card header-->
										<!--begin::Card body-->
										<div class="card-body p-9">
											<!--begin::Row-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo $fullName ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Company</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<span class="fw-semibold text-gray-800 fs-6"><?php echo $orgName ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Email Address
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email must be active"></i></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $emial ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Birth Date</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $bDay ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Address
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Permanent Address"></i></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo $address ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Emergency Contact Num
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Emergency Phone number must be active"></i>
                                                </label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo $emgContName?>  : <?php echo $emgContPhone?> </span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-10">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Marital State</label>
												<!--begin::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo $maritalStat ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->

											<?php
											$sqlCusAatt = "SELECT * FROM hera.customattributename;";
											$resultCusAatt = $mysqli->query($sqlCusAatt);

											while ($rowCusAatt = $resultCusAatt->fetch_assoc()) {
												$rowCusAattID=mysqli_real_escape_string($mysqli,$rowCusAatt['AttributeNameID']);

												$sqlCusAttVal = "SELECT * FROM hera.customattributevalue where AttributeNameID=$rowCusAattID AND EmployeeID=$userDetailsArray[EmployeeID];";
												$resultCusAttVal = $mysqli->query($sqlCusAttVal);
												$rowCusAttVal = $resultCusAttVal->fetch_assoc();

												if (!empty($rowCusAttVal) AND $rowCusAttVal["AttributeValue"] != "") {
													$attVal=htmlspecialchars($rowCusAttVal["AttributeValue"]);
												} else {
													$attVal="Not Set";
												}
											?>
												<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-10">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted"><?php echo htmlspecialchars($rowCusAatt['AttributeName']) ?></label>
												<!--begin::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?php echo htmlspecialchars($attVal) ?></span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->

											<?php

											}
											?>
											
										</div>
										<!--end::Card body-->
									</div>
									<!--end::details View-->

	</div>
</div>