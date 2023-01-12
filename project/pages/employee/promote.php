<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

<?php



require_once(PROJECT_ROOT_PATH ."/includes/getDBTablePrimaryData.php");

if (isset($_POST["submit"])) { 

    if ($_POST["submit"]=="promoteToUser"){
        require_once(PROJECT_ROOT_PATH ."/includes/classes/AddEmployee.php");

        $addEmployee = new AddEmployee();



    }
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$sql = "SELECT * FROM EmployeeDetails order by UserID";
$sqlResult = $mysqli->query($sql);
?>

<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h1 class="fw-bold m-0">Manage User Accounts</h1>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form method="POST" id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
                                                    

												
                                                    <!--begin::Input group-->
                                                    <div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">User/Employee</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select onchange='reload()' name="PayGradeID"  type='submit' id="kt_docs_select2_rich_content" name="EmployeeID" aria-label="Select a User to Promote..." data-placeholder="Select a User to Promote..." class="form-select form-select-solid form-select-lg" required>
																<?php
																	if(isset($_GET["empId"])){
																		$empId = $_GET["empId"];
																		$sqlSel="SELECT * FROM EmployeeDetails WHERE EmployeeID = '$empId'";
																		$sqlResultSel = $mysqli->query($sqlSel);
																		$rowSel =  $sqlResultSel->fetch_assoc();
																		if(!empty($rowSel["ProfilePhoto"])){
																			$profpicSel= $rowSel["ProfilePhoto"];
																		}
																		else{
																			$profpicSel= "assets/media/avatars/default.jpg";
																		}
																		
																		echo "<option value=\"".$rowSel["EmployeeID"]."\" data-kt-rich-content-subcontent=\"".$rowSel["Email"]."\" data-kt-rich-content-icon=\"".$profpicSel."\" >".$rowSel["Name"]."</option>";
																	
																	}
																	else{
																		echo "<option value=\"\">Select a User to Promote...</option>";
																	}
																?>
															
																
																<?php 
																	
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																		if(!empty($row["ProfilePhoto"])){
																			$profpic= $row["ProfilePhoto"];
																		}
																		else{
																			$profpic= "assets/media/avatars/default.jpg";
																		}
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["EmployeeID"]."\" data-kt-rich-content-subcontent=\"".$row["Email"]."\" data-kt-rich-content-icon=\"".$profpic."\" >".$row["Name"]."</option>";
																	}
																	
																?>	
																
															</select>
															<!--end::Select-->
														</div>
													</div>
														<!--end::Input group-->



													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
														<!--end::Label-->
														
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="Username" class="form-control form-control-lg form-control-solid" placeholder="Username" value="<?php if(!empty($rowSel["Username"])){ echo $rowSel["Username"];} ?>"  required/>
															<input type="hidden" name="EmployeeID"   value="<?php if(!empty($rowSel["EmployeeID"])){ echo $rowSel["EmployeeID"];} ?>" />
																
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
																								
												<!--begin::Input group-->
												<div class="row mb-6" data-kt-password-meter="true">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
													<!--end::Label-->
													<!--begin::Wrapper-->
													<div class="col-lg-8 fv-row">
														<!--begin::Input wrapper-->
														<div class="position-relative mb-3">
															<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="Password" autocomplete="off"  required/>
															<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																<i class="bi bi-eye-slash fs-2"></i>
																<i class="bi bi-eye fs-2 d-none"></i>
															</span>
														</div>
														<!--end::Input wrapper-->
														<!--begin::Meter-->
														<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
														</div>
														<!--end::Meter-->
																											<!--begin::Hint-->
													<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
													<!--end::Hint-->
													</div>
													<!--end::Wrapper-->

												</div>
												<!--end::Input group=-->

													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6 required">User Account Level</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="UserAccountLevelID" aria-label="Select the User Account Level" data-control="select2" data-placeholder="Select the User Account Level" class="form-select form-select-solid form-select-lg" required>
																<option value="">User Account Level</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("useraccountlevel","UserAccountLevelID","UserAccountLevelName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["UserAccountLevelID"]."\">".$row["UserAccountLevelName"]."</option>";
																	}
																	
																?>	
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
												
													
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Address</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="EmailAddress" class="form-control form-control-lg form-control-solid" placeholder="Email Address" value="<?php if(!empty($rowSel["Email"])){ echo $rowSel["Email"];} ?>" required/>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->

											<!--begin::Input group-->
											<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6 required">Avatar</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																<!--begin::Preview existing avatar-->
																<?php if (!empty($rowSel["ProfilePhoto"])) {
																	$exAv = $rowSel["ProfilePhoto"];
																	$profPicAvailable=1;
																} else {
																	$profPicAvailable=0;
																	$exAv = "assets/media/avatars/default.jpg";} ?>
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $exAv ?>)"></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="hidden" name="avatar" value="<?php echo $exAv ?>"/>
																	<input type="file" name="avatar" accept=".png, .jpg, .jpeg" required/>
																	
																	<input type="hidden" name="avatar_remove" />
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
															<!--begin::Hint-->
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
															<!--end::Hint-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
											


												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button type="submit" name="submit" value="promoteToUser" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Basic info-->



    </div>
</div>
		<!--begin::Javascript-->

		<script>
			function reload(){
				var v1=document.getElementById('kt_docs_select2_rich_content').value;
				// document.write(v1);
				self.location='?page=Promote-Employees&empId=' +v1;
			}
			
		</script>
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		
		<script src="assets/js/custom/supervisorSelect.js"></script>
		<script src="assets/js/custom/countrySearch.js"></script>
		<script src="assets/js/custom/dateRange.js"></script>
        
		<script src="assets/js/custom/apps/projects/settings/settings.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<script src="assets/js/custom/utilities/modals/new-target.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->