

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">
<?php
require_once(PROJECT_ROOT_PATH ."/includes/getDBTablePrimaryData.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

$leaveCounts =['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];

$payGradeId=isset($_GET['payGradeId']) ? $_GET['payGradeId'] : -1;

echo $payGradeId;

if (isset($_POST['Annual'])) {
	$lcAnnual= $_POST['Annual'];	
	$sql1 = "UPDATE hera.paygrade SET ApprovedAnnualLeaveCount = $lcAnnual WHERE PayGradeID = $payGradeId;";
	$res1 = $mysqli->query($sql1);
	// print_r($res1->fetch_assoc());
	unset($_POST['Annual']);

}

if($payGradeId!=-1){
	$sql = "SELECT * FROM paygrade WHERE PayGradeID='$payGradeId'";
	$res = $mysqli->query($sql);
	$payGradeRow = $res->fetch_assoc();
	$payGrade = $payGradeRow['PayGradeName'];
	$leaveCounts['Annual']= $payGradeRow['ApprovedAnnualLeaveCount'];
	$leaveCounts['Casual']= $payGradeRow['ApprovedCasualLeaveCount'];
	$leaveCounts['Maternity']= $payGradeRow['ApprovedMaternityLeaveCount'];
	$leaveCounts['No-Pay']= $payGradeRow['ApprovedPayLeaveCount'];
}









?>
		<!--begin::Basic info-->
		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
				<!--begin::Card title-->
				<div class="card-title m-0" font="20">
					<h1 class="fw-bold m-0" font="20">Leave Application</h1>
				</div>
				<!--end::Card title-->
			</div>
			<!--begin::Card header-->
			<!--begin::Content-->
			
			
				<!--begin::Form-->
				<form method="POST" action="" id="kt_account_profile_details_form" class="form">
					<!--begin::Card body-->
					<div class="card-body border-top p-9">



						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Pay Grade</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<select value="$<?php echo $payGrade; ?>" id="sl" onchange='reload()' name="PayGradeID"  type='submit' aria-label="Select the Pay Grade" data-control="select2" data-placeholder="<?php echo isset($payGrade) ? $payGrade : "Select the Pay Grade";  ?>" class="form-select form-select-solid form-select-lg">
									<option value="">Select the Pay Grade</option>
									<?php 
										$sqlResult=getDBTablePrimaryData("paygrade","PayGradeID","PayGradeName");
										
										while(($row =  $sqlResult->fetch_assoc())) {
											//store $ID and $name as an key value pair
											echo "<option  herf='..\pages\Settings\leaveConfig.php' value=\"".$row["PayGradeID"]."\">".$row["PayGradeName"]."</option>";
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
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Annual</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
                                <div class="form-outline" style="width: 22rem;">
                                <input value="<?php echo $leaveCounts['Annual']; ?>" name="Annual" min="0" max="100" type="number" id="typeNumber" class="form-control form-control-solid" />
                            </div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Casual</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
                                <div class="form-outline" style="width: 22rem;">
                                <input value="<?php echo $leaveCounts['Casual']; ?>" name="Casual" min="0" max="100" type="number" id="typeNumber" class="form-control form-control-solid" />
                            </div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Maternity</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
                                <div class="form-outline" style="width: 22rem;">
                                <input value="<?php echo $leaveCounts['Maternity']; ?>" name="Maternity" min="0" max="100" type="number" id="typeNumber" class="form-control form-control-solid" />
                            </div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->

					<!--end::Card body-->
					<!--begin::Actions-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
						<button type="submit" name="submit" value="LeaveApplication" class="btn btn-primary" id="kt_account_profile_details_submit" >
							<span class="indicator-label">
								Submit
							</span>
							<span class="indicator-progress">
								Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
							</span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Basic info-->
		
	</div>
	<!--end::Content container-->
	<!--begin::Javascript-->

	<script>
    function reload(){
		var v1=document.getElementById('sl').value;
		// document.write(v1);
		self.location='?page=leaveConfig&payGradeId=' +v1;
	}
	
    </script>

	<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
	<script src="assets/js/custom/apps/projects/settings/settings.js"></script>
	<script src="assets/js/custom/dateRange.js"></script>
	<script src="assets/js/custom/formValidator.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
