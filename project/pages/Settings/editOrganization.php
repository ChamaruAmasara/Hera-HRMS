	<?php
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

	$errors = array('Name'=>'','Address'=>'','TelephoneNumber'=>'','RegistrationNumber'=>'' );
	$values = array('Name'=>'','Address'=>'','TelephoneNumber'=>'','RegistrationNumber'=>'' );

	$sqlOrg = "SELECT * FROM hera.organization;";
	$resOrg = $mysqli->query($sqlOrg);

	$rowOrg = $resOrg->fetch_assoc();
	
	foreach($values as $key => $value){
		if(isset($_POST[$key]) AND !empty($_POST[$key]) AND $values[$key] != $_POST[$key]){
			$values[$key] = mysqli_real_escape_string($mysqli, $_POST[$key]);
			try {
				$sqlSetVal = "UPDATE hera.organization SET ".$key." = '".$values[$key]."' WHERE OrganizationID = '1';";
				$resSetVal = $mysqli->query($sqlSetVal);

			} catch (mysqli_sql_exception $e) {
				$errors[$key] = $e->getMessage();
			}
			

		}
		elseif($resOrg && mysqli_num_rows($resOrg)> 0){
			$values[$key] = $rowOrg[$key];
		}
		else {
			$errors[$key] = "Please enter a valid $key";
		}
	}

	


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
												<h1 class="fw-bold m-0" font="20">Edit Organization Details</h1>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										
										
											<!--begin::Form-->
											<form method="POST" action="" class="form">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
												
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Organization Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="Name" maxlength="1024" value="<?php echo $values['Name']; ?>" class="form-control form-control-lg form-control-solid" placeholder="Organization Name"  />
														<!-- error messege -->
														<div class="text-danger" > <?php echo $errors['Name'];  ?> </div>
														<!-- end error messege --></div>

														
														<!--end::Col-->
													</div>
													<!--end::Input group-->

                                                    <!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="Address" maxlength="2048" value="<?php echo $values['Address']; ?>" class="form-control form-control-lg form-control-solid" placeholder="Address"  />
														<!-- error messege -->
														<div class="text-danger" > <?php echo $errors['Address'];  ?> </div>
														<!-- end error messege --></div>
														<!--end::Col-->
														
													</div>
													<!--end::Input group-->

                                                    <!--begin::Input group-->
												<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Telephone Number</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="TelephoneNumber" maxlength="20" value="<?php echo $values['TelephoneNumber']; ?>" class="form-control form-control-lg form-control-solid" placeholder="Emergancy Contact Number"  />
														<!-- error messege -->
														<div class="text-danger" > <?php echo $errors['TelephoneNumber'];  ?> </div>
														<!-- end error messege -->
														</div>
														<!--end::Col-->
														
													</div>
													<!--end::Input group-->

                                                    <!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Registration Number</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="RegistrationNumber" maxlength="10" value="<?php echo $values['RegistrationNumber']; ?>" class="form-control form-control-lg form-control-solid" placeholder="Registration Number"  />
															<!-- error messege -->
															<div class="text-danger" > <?php echo $errors['RegistrationNumber'];  ?> </div>
															<!-- end error messege -->
														</div>
														<!--end::Col-->
														
													</div>
													<!--end::Input group-->

                                                    											
																
														
													</div>
													
													<!--end::Card body-->
													<!--begin::Actions-->
													<div class="card-footer d-flex justify-content-end py-6 px-9">
													<a href="">	
														<button  type="submit" name="submit" value="addEmployee" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
													</a>
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
		
	