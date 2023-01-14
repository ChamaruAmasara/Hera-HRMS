<?php
    require_once(PROJECT_ROOT_PATH ."/includes/getDBTablePrimaryData.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

	$errors = array('AttributeName'=>'');
	$values = array('AttributeName'=>'');


    $orgName = $_SESSION['User']->getUserDetailArray()['OrganizationName'];
    $sqlOrg1 = "SELECT * FROM organization WHERE Name='".mysqli_real_escape_string ($mysqli,$orgName)."';";
    $resOrg1 = $mysqli->query($sqlOrg1);
    $rowOrg1 = $resOrg1->fetch_assoc();

    if (isset($_POST['delSubmit'])) {
        $sqlDel = "DELETE FROM customattributename WHERE AttributeNameID = '".mysqli_real_escape_string ($mysqli,$_POST['delete'])."';";
        $resDel = $mysqli->query($sqlDel);
    }

    $orgID = $rowOrg1['OrganizationID'];

$validData = 0;



if (isset($_POST['save'])) {
    
        if (isset($_POST['AttributeName']) and !empty($_POST['AttributeName']) and $values['AttributeName'] != $_POST['AttributeName']) {
            $values['AttributeName'] = mysqli_real_escape_string($mysqli, $_POST['AttributeName']);
            $validData =1;
        } else {
            $errors[$key] = "Please enter a valid AttributeName";
        }

    if ($validData) {
        $sqlSetVal = "INSERT INTO hera.customattributename (AttributeName) VALUES ('" . $values["AttributeName"] ."');";
        $resSetVal = $mysqli->query($sqlSetVal);
    }

}
    $rowDept = "SELECT * FROM customattributename;";
    $resDept = $mysqli->query($rowDept);
	?>

							
							
							
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid">
									
									<!--begin::Basic info-->
									<div class="card mb-4 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0" font="20">
												<h1 class="fw-bold m-0" font="20">Edit Departments</h1>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										
										
											<!--begin::Form-->
											<form id="addDept" method="POST" action="" class="form">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">

                                                    <?php
                                                        
                                                        while($rowDept = $resDept->fetch_assoc()){ 
                                                            ?>
                                                            
                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                
                                                                <!--end::Label-->
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fw-semibold text-muted">Department Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <span class="fw-semibold text-gray-800 fs-6"><?php echo $rowDept['AttributeName']; ?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    
                                                                        <input name="delete" type="hidden" value="<?php echo $rowDept["AttributeNameID"] ?>" >
                                                                        <input class="btn btn-light-danger float-end" name="delSubmit" value="Delete" type="submit">

                                                                    
                                                                </div>
                                                            </div>
                                                            <!--end::Input group-->
                                                            

                                                            <br>
                                                            <hr class="style1">
                                                            <br>
                                                            <?php
                                                            

                                                            
                                                        }

                                                    ?>






												
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Add Department</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="AttributeName" maxlength="1024" class="form-control form-control-lg form-control-solid" placeholder="Department Name"  />
														<!-- error messege -->
														<div class="text-danger" > <?php echo $errors['AttributeName'];  ?> </div>
														<!-- end error messege --></div>

														
														<!--end::Col-->
													</div>
													<!--end::Input group-->

                                                
                                                    											
																
														
													</div>
													
													<!--end::Card body-->
													<!--begin::Actions-->
													<div class="card-footer d-flex justify-content-end py-6 px-9">
                                                    <input type="submit"  class="btn btn-primary float-end" name="save" value="Save">
													<!-- <button form="addDept" type="submit" name="submit" value="addEmployee" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button> -->
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
							</div>
							<!--end::Content-->
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
		<script src="assets/js/custom/account/settings/signin-methods.js"></script>
		<script src="assets/js/custom/account/settings/profile-details.js"></script>
		<script src="assets/js/custom/account/settings/deactivate-account.js"></script>
		<script src="assets/js/custom/pages/user-profile/general.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
		<script src="assets/js/custom/utilities/modals/two-factor-authentication.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
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
		
	