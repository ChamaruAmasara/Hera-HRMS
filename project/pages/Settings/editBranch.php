<?php
    require_once(PROJECT_ROOT_PATH ."/includes/getDBTablePrimaryData.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

	$errors = array('BranchName'=>'','CountryID'=>'','OrganizationID'=>'');
	$values = array('BranchName'=>'','CountryID'=>'','OrganizationID'=>'');


    $orgName = $_SESSION['User']->getUserDetailArray()['OrganizationName'];
    $sqlOrg1 = "SELECT * FROM organization WHERE Name='".$orgName."';";
    $resOrg1 = $mysqli->query($sqlOrg1);
    $rowOrg1 = $resOrg1->fetch_assoc();



    if (isset($_POST['delSubmit'])) {
        $sqlDel = "DELETE FROM branch WHERE BranchID = '".$_POST['delete']."';";
        $resDel = $mysqli->query($sqlDel);
    }

    $orgID = $rowOrg1['OrganizationID'];

$validData = 0;



if (isset($_POST['save'])) {
    foreach ($values as $key => $value) {
        if (isset($_POST[$key]) and !empty($_POST[$key]) and $values[$key] != $_POST[$key]) {
            $values[$key] = mysqli_real_escape_string($mysqli, $_POST[$key]);
            $validData = $validData + 1;
        } else {
            $errors[$key] = "Please enter a valid $key";
        }
    }
    if ($validData == 3) {
        $sqlSetVal = "INSERT INTO hera.branch (BranchName,CountryID,OrganizationID) VALUES ('" . $values["BranchName"] ."','". $values["CountryID"] ."','". $values["OrganizationID"] . "');";
        $resSetVal = $mysqli->query($sqlSetVal);
    }

}
    $sqlBrn = "SELECT * FROM branch;";
    $resBrn = $mysqli->query($sqlBrn);
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
												<h1 class="fw-bold m-0" font="20">Edit Branches</h1>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										
										
											<!--begin::Form-->
											<form  method="POST" action="" >
												<!--begin::Card body-->
												<div class="card-body border-top p-9">

                                                    <?php
                                                        
                                                        while($rowBrn = $resBrn->fetch_assoc()){
                                                            
                                                            ?>
                                                            
                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                
                                                                <!--end::Label-->
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fw-semibold text-muted">BranchName</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <span class="fw-semibold text-gray-800 fs-6"><?php echo $rowBrn['BranchName']; ?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fw-semibold text-muted">Country</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <span class="fw-semibold text-gray-800 fs-6"><?php 
                                                                        $sqlCntry = "SELECT * FROM hera.country WHERE CountryID = ".$rowBrn['CountryID'].";";
                                                                        $resCntry = $mysqli->query($sqlCntry);
                                                                        $rowCntry = $resCntry->fetch_assoc();
                                                                        echo $rowCntry['CountryName']; 
                                                                    
                                                                    ?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fw-semibold text-muted">Organization</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <span class="fw-semibold text-gray-800 fs-6"><?php 
                                                                        $sqlOrg = "SELECT * FROM hera.organization WHERE OrganizationID = ".$rowBrn['OrganizationID'].";";
                                                                        $resOrg= $mysqli->query($sqlOrg);
                                                                        $rowOrg = $resOrg->fetch_assoc();
                                                                        echo $rowOrg['Name']; 
                                                                    ?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                
                                                                        <input  name="delete" type="hidden" value="<?php echo $rowBrn["BranchID"] ?>" >
                                                                        <input type="submit" class="btn btn-light-danger float-end" name="delSubmit" value="Delete">
                                                                    
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Branch Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="BranchName" maxlength="1024" class="form-control form-control-lg form-control-solid" placeholder="Branch Name"  />
														<!-- error messege -->
														<div class="text-danger" > <?php echo $errors['BranchName'];  ?> </div>
														<!-- end error messege --></div>

														
														<!--end::Col-->
													</div>
													<!--end::Input group-->

                                                    <!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Country</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="CountryID" aria-label="Select Country" data-control="select2" data-placeholder="Select Country" class="form-select form-select-solid form-select-lg">
																<option value=''>Select Country</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("country","CountryID","CountryName");
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["CountryID"]."\">".$row["CountryName"]."</option>";
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Organization</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="OrganizationID" aria-label="Organization" data-control="select2" data-placeholder="Organization" class="form-select form-select-solid form-select-lg" required>
                                                                <?php            
                                                                    echo "<option value=\"".$orgID."\">".$orgName."</option>"; 
                                                                ?>  
                                                                        
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
                                                    											
																
														
													</div>
													
													<!--end::Card body-->
													<!--begin::Actions-->
													<div class="card-footer d-flex justify-content-end py-6 px-9">
                                                    <input type="submit"  class="btn btn-primary float-end" name="save" value="Save">
													<!-- <button form="addBrn" type="submit" name="submit" value="save" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button> -->
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
		
	