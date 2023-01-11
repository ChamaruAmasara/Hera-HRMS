
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

<?php

include_once PROJECT_ROOT_PATH.'/includes/getDBTablePrimaryData.php';

include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
if (isset($_GET['ID'])) {
	$id=$_GET['ID'];
	$userDetails = new UserDetails(EmployeeID:$id);
	$userDetailsArray = $userDetails->getUserDetailArray();
}





if (isset($_POST["submit"])) { 

    if ($_POST["submit"]=="editEmployee"){

        // load the leave application class
        require_once(PROJECT_ROOT_PATH ."/includes/classes/AddEmployee.php");

        $addEmployee = new AddEmployee();


    }
}
?>

<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h1 class="fw-bold m-0">Edit Employee Details - <?php echo $userDetailsArray['Name'];?></h1>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form method="POST" id="kt_account_profile_details_form" class="form">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
                                                    
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="Name" class="form-control form-control-lg form-control-solid" value="<?php echo $userDetailsArray['Name'];?>" required/>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													
													<!--begin::Input group-->
													<div class="row mb-6">
															<!--begin::Label-->
															<label class="col-lg-4 col-form-label required fw-semibold fs-6">Gender</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-8 fv-row">
																<!--begin::Options-->
																<div class="d-flex align-items-center mt-3">
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid me-5">
																		<input class="form-check-input" name="Gender[]" type="radio" value="male" <?php if ($userDetailsArray['Gender']=="Male"){echo "checked=\"checked\"";}?> required/>
																		<span class="fw-semibold ps-2 fs-6">Male</span>
																	</label>
																	<!--end::Option-->
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid">
																		<input class="form-check-input" name="Gender[]" type="radio" value="female" <?php if ($userDetailsArray['Gender']=="Female"){echo "checked=\"checked\"";}?>/>
																		<span class="fw-semibold ps-2 fs-6">Female</span>
																	</label>
																	<!--end::Option-->
																</div>
																<!--end::Options-->
															</div>
															<!--end::Col-->
														</div>
														<!--end::Input group-->

													
													<!--begin::Input group-->
													<div class="row mb-6">
															<!--begin::Label-->
															<label class="col-lg-4 col-form-label required fw-semibold fs-6">Marital Status</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-8 fv-row">
																<!--begin::Options-->
																<div class="d-flex align-items-center mt-3">
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid me-5">
																		<input class="form-check-input" name="MaritalStatus[]" type="radio" value="Married" <?php if ($userDetailsArray['MaritalStatus']=="Married"){echo "checked=\"checked\"";}?> required/>
																		<span class="fw-semibold ps-2 fs-6">Married</span>
																	</label>
																	<!--end::Option-->
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid">
																		<input class="form-check-input" name="MaritalStatus[]" type="radio" value="Unmarried" <?php if ($userDetailsArray['MaritalStatus']=="Unmarried"){echo "checked=\"checked\"";}?> />
																		<span class="fw-semibold ps-2 fs-6">Unmarried</span>
																	</label>
																	<!--end::Option-->
																</div>
																<!--end::Options-->
															</div>
															<!--end::Col-->
														</div>
														<!--end::Input group-->

													

													<!--brgin::Input gropu-->
													<!--begin::Row-->
													<div class="row mb-6">
													<!--begin::Col-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Birth Date</label>
													<!--end::Col-->
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
															<input class="form-control form-control-solid ps-12" name="BirthDate" placeholder="Enter birthdate" id="kt_datepicker_1"  value="<?php echo $userDetailsArray['BirthDate'];?>" required/>
														</div>
													</div>
													<!--begin::Col-->
													</div>
													<!--end::Row-->
													<!--end::Input group-->

												
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
														<textarea name = "Address" placeholder="Address" class="form-control form-control-lg form-control-solid" data-kt-autosize="true" required><?php echo $userDetailsArray['Address'];?></textarea>
														</div>
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
															<select id="kt_docs_select2_country" name="Country" aria-label="Select a Country..." data-placeholder="Select a Country..." class="form-select form-select-solid form-select-lg" required>
																<option value="">Select a Country...</option>
																<option value="AX" <?php if ($userDetailsArray['Country']=="AX"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/aland-islands.svg">Aland Islands</option>
																<option value="AL" <?php if ($userDetailsArray['Country']=="AL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/albania.svg">Albania</option>
																<option value="AF" <?php if ($userDetailsArray['Country']=="AF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/afghanistan.svg">Afghanistan</option>
																<option value="DZ" <?php if ($userDetailsArray['Country']=="DZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/algeria.svg">Algeria</option>
																<option value="AS" <?php if ($userDetailsArray['Country']=="AS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/american-samoa.svg">American Samoa</option>
																<option value="AD" <?php if ($userDetailsArray['Country']=="AD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/andorra.svg">Andorra</option>
																<option value="AO" <?php if ($userDetailsArray['Country']=="AO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/angola.svg">Angola</option>
																<option value="AI" <?php if ($userDetailsArray['Country']=="AI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/anguilla.svg">Anguilla</option>
																<option value="AG" <?php if ($userDetailsArray['Country']=="AG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/antigua-and-barbuda.svg">Antigua and Barbuda</option>
																<option value="AR" <?php if ($userDetailsArray['Country']=="AR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/argentina.svg">Argentina</option>
																<option value="AM" <?php if ($userDetailsArray['Country']=="AM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/armenia.svg">Armenia</option>
																<option value="AW" <?php if ($userDetailsArray['Country']=="AW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/aruba.svg">Aruba</option>
																<option value="AU" <?php if ($userDetailsArray['Country']=="AU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/australia.svg">Australia</option>
																<option value="AT" <?php if ($userDetailsArray['Country']=="AT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/austria.svg">Austria</option>
																<option value="AZ" <?php if ($userDetailsArray['Country']=="AZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/azerbaijan.svg">Azerbaijan</option>
																<option value="BS" <?php if ($userDetailsArray['Country']=="BS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bahamas.svg">Bahamas</option>
																<option value="BH" <?php if ($userDetailsArray['Country']=="BH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bahrain.svg">Bahrain</option>
																<option value="BD" <?php if ($userDetailsArray['Country']=="BD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bangladesh.svg">Bangladesh</option>
																<option value="BB" <?php if ($userDetailsArray['Country']=="BB"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/barbados.svg">Barbados</option>
																<option value="BY" <?php if ($userDetailsArray['Country']=="BY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/belarus.svg">Belarus</option>
																<option value="BE" <?php if ($userDetailsArray['Country']=="BE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/belgium.svg">Belgium</option>
																<option value="BZ" <?php if ($userDetailsArray['Country']=="BZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/belize.svg">Belize</option>
																<option value="BJ" <?php if ($userDetailsArray['Country']=="BJ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/benin.svg">Benin</option>
																<option value="BM" <?php if ($userDetailsArray['Country']=="BM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bermuda.svg">Bermuda</option>
																<option value="BT" <?php if ($userDetailsArray['Country']=="BT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bhutan.svg">Bhutan</option>
																<option value="BO" <?php if ($userDetailsArray['Country']=="BO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bolivia.svg">Bolivia, Plurinational State of</option>
																<option value="BQ" <?php if ($userDetailsArray['Country']=="BQ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bonaire.svg">Bonaire, Sint Eustatius and Saba</option>
																<option value="BA" <?php if ($userDetailsArray['Country']=="BA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bosnia-and-herzegovina.svg">Bosnia and Herzegovina</option>
																<option value="BW" <?php if ($userDetailsArray['Country']=="BW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/botswana.svg">Botswana</option>
																<option value="BR" <?php if ($userDetailsArray['Country']=="BR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/brazil.svg">Brazil</option>
																<option value="IO" <?php if ($userDetailsArray['Country']=="IO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/british-indian-ocean-territory.svg">British Indian Ocean Territory</option>
																<option value="BN" <?php if ($userDetailsArray['Country']=="BN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/brunei.svg">Brunei Darussalam</option>
																<option value="BG" <?php if ($userDetailsArray['Country']=="BG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/bulgaria.svg">Bulgaria</option>
																<option value="BF" <?php if ($userDetailsArray['Country']=="BF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/burkina-faso.svg">Burkina Faso</option>
																<option value="BI" <?php if ($userDetailsArray['Country']=="BI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/burundi.svg">Burundi</option>
																<option value="KH" <?php if ($userDetailsArray['Country']=="KH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cambodia.svg">Cambodia</option>
																<option value="CM" <?php if ($userDetailsArray['Country']=="CM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cameroon.svg">Cameroon</option>
																<option value="CA" <?php if ($userDetailsArray['Country']=="CA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/canada.svg">Canada</option>
																<option value="CV" <?php if ($userDetailsArray['Country']=="CV"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cape-verde.svg">Cape Verde</option>
																<option value="KY" <?php if ($userDetailsArray['Country']=="KY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cayman-islands.svg">Cayman Islands</option>
																<option value="CF" <?php if ($userDetailsArray['Country']=="CF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/central-african-republic.svg">Central African Republic</option>
																<option value="TD" <?php if ($userDetailsArray['Country']=="TD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/chad.svg">Chad</option>
																<option value="CL" <?php if ($userDetailsArray['Country']=="CL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/chile.svg">Chile</option>
																<option value="CN" <?php if ($userDetailsArray['Country']=="CN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/china.svg">China</option>
																<option value="CX" <?php if ($userDetailsArray['Country']=="CX"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/christmas-island.svg">Christmas Island</option>
																<option value="CC" <?php if ($userDetailsArray['Country']=="CC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cocos-island.svg">Cocos (Keeling) Islands</option>
																<option value="CO" <?php if ($userDetailsArray['Country']=="CO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/colombia.svg">Colombia</option>
																<option value="KM" <?php if ($userDetailsArray['Country']=="KM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/comoros.svg">Comoros</option>
																<option value="CK" <?php if ($userDetailsArray['Country']=="CK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cook-islands.svg">Cook Islands</option>
																<option value="CR" <?php if ($userDetailsArray['Country']=="CR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/costa-rica.svg">Costa Rica</option>
																<option value="CI" <?php if ($userDetailsArray['Country']=="CI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ivory-coast.svg">Côte d'Ivoire</option>
																<option value="HR" <?php if ($userDetailsArray['Country']=="HR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/croatia.svg">Croatia</option>
																<option value="CU" <?php if ($userDetailsArray['Country']=="CU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/cuba.svg">Cuba</option>
																<option value="CW" <?php if ($userDetailsArray['Country']=="CW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/curacao.svg">Curaçao</option>
																<option value="CZ" <?php if ($userDetailsArray['Country']=="CZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/czech-republic.svg">Czech Republic</option>
																<option value="DK" <?php if ($userDetailsArray['Country']=="DK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/denmark.svg">Denmark</option>
																<option value="DJ" <?php if ($userDetailsArray['Country']=="DJ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/djibouti.svg">Djibouti</option>
																<option value="DM" <?php if ($userDetailsArray['Country']=="DM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/dominica.svg">Dominica</option>
																<option value="DO" <?php if ($userDetailsArray['Country']=="DO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/dominican-republic.svg">Dominican Republic</option>
																<option value="EC" <?php if ($userDetailsArray['Country']=="EC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ecuador.svg">Ecuador</option>
																<option value="EG" <?php if ($userDetailsArray['Country']=="EG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/egypt.svg">Egypt</option>
																<option value="SV" <?php if ($userDetailsArray['Country']=="SV"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/el-salvador.svg">El Salvador</option>
																<option value="GQ" <?php if ($userDetailsArray['Country']=="GQ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/equatorial-guinea.svg">Equatorial Guinea</option>
																<option value="ER" <?php if ($userDetailsArray['Country']=="ER"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/eritrea.svg">Eritrea</option>
																<option value="EE" <?php if ($userDetailsArray['Country']=="EE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/estonia.svg">Estonia</option>
																<option value="ET" <?php if ($userDetailsArray['Country']=="ET"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ethiopia.svg">Ethiopia</option>
																<option value="FK" <?php if ($userDetailsArray['Country']=="FK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/falkland-islands.svg">Falkland Islands (Malvinas)</option>
																<option value="FJ" <?php if ($userDetailsArray['Country']=="FJ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/fiji.svg">Fiji</option>
																<option value="FI" <?php if ($userDetailsArray['Country']=="FI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/finland.svg">Finland</option>
																<option value="FR" <?php if ($userDetailsArray['Country']=="FR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/france.svg">France</option>
																<option value="PF" <?php if ($userDetailsArray['Country']=="PF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/french-polynesia.svg">French Polynesia</option>
																<option value="GA" <?php if ($userDetailsArray['Country']=="GA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/gabon.svg">Gabon</option>
																<option value="GM" <?php if ($userDetailsArray['Country']=="GM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/gambia.svg">Gambia</option>
																<option value="GE" <?php if ($userDetailsArray['Country']=="GE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/georgia.svg">Georgia</option>
																<option value="DE" <?php if ($userDetailsArray['Country']=="DE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/germany.svg">Germany</option>
																<option value="GH" <?php if ($userDetailsArray['Country']=="GH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ghana.svg">Ghana</option>
																<option value="GI" <?php if ($userDetailsArray['Country']=="GI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/gibraltar.svg">Gibraltar</option>
																<option value="GR" <?php if ($userDetailsArray['Country']=="GR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/greece.svg">Greece</option>
																<option value="GL" <?php if ($userDetailsArray['Country']=="GL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/greenland.svg">Greenland</option>
																<option value="GD" <?php if ($userDetailsArray['Country']=="GD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/grenada.svg">Grenada</option>
																<option value="GU" <?php if ($userDetailsArray['Country']=="GU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/guam.svg">Guam</option>
																<option value="GT" <?php if ($userDetailsArray['Country']=="GT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/guatemala.svg">Guatemala</option>
																<option value="GG" <?php if ($userDetailsArray['Country']=="GG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/guernsey.svg">Guernsey</option>
																<option value="GN" <?php if ($userDetailsArray['Country']=="GN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/guinea.svg">Guinea</option>
																					<option value="GW" <?php if ($userDetailsArray['Country']=="GW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/guinea-bissau.svg">Guinea-Bissau</option>
																					<option value="HT" <?php if ($userDetailsArray['Country']=="HT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/haiti.svg">Haiti</option>
																					<option value="VA" <?php if ($userDetailsArray['Country']=="VA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/vatican-city.svg">Holy See (Vatican City State)</option>
																					<option value="HN" <?php if ($userDetailsArray['Country']=="HN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/honduras.svg">Honduras</option>
																					<option value="HK" <?php if ($userDetailsArray['Country']=="HK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/hong-kong.svg">Hong Kong</option>
																					<option value="HU" <?php if ($userDetailsArray['Country']=="HU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/hungary.svg">Hungary</option>
																					<option value="IS" <?php if ($userDetailsArray['Country']=="IS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/iceland.svg">Iceland</option>
																					<option value="IN" <?php if ($userDetailsArray['Country']=="IN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/india.svg">India</option>
																					<option value="ID" <?php if ($userDetailsArray['Country']=="ID"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/indonesia.svg">Indonesia</option>
																					<option value="IR" <?php if ($userDetailsArray['Country']=="IR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/iran.svg">Iran, Islamic Republic of</option>
																					<option value="IQ" <?php if ($userDetailsArray['Country']=="IQ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/iraq.svg">Iraq</option>
																					<option value="IE" <?php if ($userDetailsArray['Country']=="IE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ireland.svg">Ireland</option>
																					<option value="IM" <?php if ($userDetailsArray['Country']=="IM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/isle-of-man.svg">Isle of Man</option>
																					<option value="IL" <?php if ($userDetailsArray['Country']=="IL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/israel.svg">Israel</option>
																					<option value="IT" <?php if ($userDetailsArray['Country']=="IT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/italy.svg">Italy</option>
																					<option value="JM" <?php if ($userDetailsArray['Country']=="JM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/jamaica.svg">Jamaica</option>
																					<option value="JP" <?php if ($userDetailsArray['Country']=="JP"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/japan.svg">Japan</option>
																					<option value="JE" <?php if ($userDetailsArray['Country']=="JE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/jersey.svg">Jersey</option>
																					<option value="JO" <?php if ($userDetailsArray['Country']=="JO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/jordan.svg">Jordan</option>
																					<option value="KZ" <?php if ($userDetailsArray['Country']=="KZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/kazakhstan.svg">Kazakhstan</option>
																					<option value="KE" <?php if ($userDetailsArray['Country']=="KE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/kenya.svg">Kenya</option>
																					<option value="KI" <?php if ($userDetailsArray['Country']=="KI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/kiribati.svg">Kiribati</option>
																					<option value="KP" <?php if ($userDetailsArray['Country']=="KP"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/north-korea.svg">Korea, Democratic People's Republic of</option>
																					<option value="KW" <?php if ($userDetailsArray['Country']=="KW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/kuwait.svg">Kuwait</option>
																					<option value="KG" <?php if ($userDetailsArray['Country']=="KG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/kyrgyzstan.svg">Kyrgyzstan</option>
																					<option value="LA" <?php if ($userDetailsArray['Country']=="LA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/laos.svg">Lao People's Democratic Republic</option>
																					<option value="LV" <?php if ($userDetailsArray['Country']=="LV"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/latvia.svg">Latvia</option>
																					<option value="LB" <?php if ($userDetailsArray['Country']=="LB"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/lebanon.svg">Lebanon</option>
																					<option value="LS" <?php if ($userDetailsArray['Country']=="LS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/lesotho.svg">Lesotho</option>
																					<option value="LR" <?php if ($userDetailsArray['Country']=="LR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/liberia.svg">Liberia</option>
																					<option value="LY" <?php if ($userDetailsArray['Country']=="LY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/libya.svg">Libya</option>
																					<option value="LI" <?php if ($userDetailsArray['Country']=="LI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/liechtenstein.svg">Liechtenstein</option>
																					<option value="LT" <?php if ($userDetailsArray['Country']=="LT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/lithuania.svg">Lithuania</option>
																					<option value="LU" <?php if ($userDetailsArray['Country']=="LU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/luxembourg.svg">Luxembourg</option>
																					<option value="MO" <?php if ($userDetailsArray['Country']=="MO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/macao.svg">Macao</option>
																					<option value="MG" <?php if ($userDetailsArray['Country']=="MG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/madagascar.svg">Madagascar</option>
																					<option value="MW" <?php if ($userDetailsArray['Country']=="MW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/malawi.svg">Malawi</option>
																					<option value="MY" <?php if ($userDetailsArray['Country']=="MY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/malaysia.svg">Malaysia</option>
																					<option value="MV" <?php if ($userDetailsArray['Country']=="MV"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/maldives.svg">Maldives</option>
																					<option value="ML" <?php if ($userDetailsArray['Country']=="ML"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mali.svg">Mali</option>
																					<option value="MT" <?php if ($userDetailsArray['Country']=="MT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/malta.svg">Malta</option>
																					<option value="MH" <?php if ($userDetailsArray['Country']=="MH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/marshall-island.svg">Marshall Islands</option>
																					<option value="MQ" <?php if ($userDetailsArray['Country']=="MQ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/martinique.svg">Martinique</option>
																					<option value="MR" <?php if ($userDetailsArray['Country']=="MR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mauritania.svg">Mauritania</option>
																					<option value="MU" <?php if ($userDetailsArray['Country']=="MU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mauritius.svg">Mauritius</option>
																					<option value="MX" <?php if ($userDetailsArray['Country']=="MX"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mexico.svg">Mexico</option>
																					<option value="FM" <?php if ($userDetailsArray['Country']=="FM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/micronesia.svg">Micronesia, Federated States of</option>
																					<option value="MD" <?php if ($userDetailsArray['Country']=="MD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/moldova.svg">Moldova, Republic of</option>
																					<option value="MC" <?php if ($userDetailsArray['Country']=="MC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/monaco.svg">Monaco</option>
																					<option value="MN" <?php if ($userDetailsArray['Country']=="MN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mongolia.svg">Mongolia</option>
																					<option value="ME" <?php if ($userDetailsArray['Country']=="ME"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/montenegro.svg">Montenegro</option>
																					<option value="MS" <?php if ($userDetailsArray['Country']=="MS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/montserrat.svg">Montserrat</option>
																					<option value="MA" <?php if ($userDetailsArray['Country']=="MA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/morocco.svg">Morocco</option>
																					<option value="MZ" <?php if ($userDetailsArray['Country']=="MZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/mozambique.svg">Mozambique</option>
																					<option value="MM" <?php if ($userDetailsArray['Country']=="MM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/myanmar.svg">Myanmar</option>
																					<option value="NA" <?php if ($userDetailsArray['Country']=="NA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/namibia.svg">Namibia</option>
																					<option value="NR" <?php if ($userDetailsArray['Country']=="NR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/nauru.svg">Nauru</option>
																					<option value="NP" <?php if ($userDetailsArray['Country']=="NP"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/nepal.svg">Nepal</option>
																					<option value="NL" <?php if ($userDetailsArray['Country']=="NL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/netherlands.svg">Netherlands</option>
																					<option value="NZ" <?php if ($userDetailsArray['Country']=="NZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/new-zealand.svg">New Zealand</option>
																					<option value="NI" <?php if ($userDetailsArray['Country']=="NI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/nicaragua.svg">Nicaragua</option>
																					<option value="NE" <?php if ($userDetailsArray['Country']=="NE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/niger.svg">Niger</option>
																					<option value="NG" <?php if ($userDetailsArray['Country']=="NG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/nigeria.svg">Nigeria</option>
																					<option value="NU" <?php if ($userDetailsArray['Country']=="NU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/niue.svg">Niue</option>
																					<option value="NF" <?php if ($userDetailsArray['Country']=="NF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/norfolk-island.svg">Norfolk Island</option>
																					<option value="MP" <?php if ($userDetailsArray['Country']=="MP"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/northern-mariana-islands.svg">Northern Mariana Islands</option>
																					<option value="NO" <?php if ($userDetailsArray['Country']=="NO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/norway.svg">Norway</option>
																					<option value="OM" <?php if ($userDetailsArray['Country']=="OM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/oman.svg">Oman</option>
																					<option value="PK" <?php if ($userDetailsArray['Country']=="PK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/pakistan.svg">Pakistan</option>
																					<option value="PW" <?php if ($userDetailsArray['Country']=="PW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/palau.svg">Palau</option>
																					<option value="PS" <?php if ($userDetailsArray['Country']=="PS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/palestine.svg">Palestinian Territory, Occupied</option>
																					<option value="PA" <?php if ($userDetailsArray['Country']=="PA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/panama.svg">Panama</option>
																					<option value="PG" <?php if ($userDetailsArray['Country']=="PG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/papua-new-guinea.svg">Papua New Guinea</option>
																					<option value="PY" <?php if ($userDetailsArray['Country']=="PY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/paraguay.svg">Paraguay</option>
																					<option value="PE" <?php if ($userDetailsArray['Country']=="PE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/peru.svg">Peru</option>
																					<option value="PH" <?php if ($userDetailsArray['Country']=="PH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/philippines.svg">Philippines</option>
																					<option value="PL" <?php if ($userDetailsArray['Country']=="PL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/poland.svg">Poland</option>
																					<option value="PT" <?php if ($userDetailsArray['Country']=="PT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/portugal.svg">Portugal</option>
																					<option value="PR" <?php if ($userDetailsArray['Country']=="PR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/puerto-rico.svg">Puerto Rico</option>
																					<option value="QA" <?php if ($userDetailsArray['Country']=="QA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/qatar.svg">Qatar</option>
																					<option value="RO" <?php if ($userDetailsArray['Country']=="RO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/romania.svg">Romania</option>
																					<option value="RU" <?php if ($userDetailsArray['Country']=="RU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/russia.svg">Russian Federation</option>
																					<option value="RW" <?php if ($userDetailsArray['Country']=="RW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/rwanda.svg">Rwanda</option>
																					<option value="BL" <?php if ($userDetailsArray['Country']=="BL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/st-barts.svg">Saint Barthélemy</option>
																					<option value="KN" <?php if ($userDetailsArray['Country']=="KN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/saint-kitts-and-nevis.svg">Saint Kitts and Nevis</option>
																					<option value="LC" <?php if ($userDetailsArray['Country']=="LC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/st-lucia.svg">Saint Lucia</option>
																					<option value="MF" <?php if ($userDetailsArray['Country']=="MF"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sint-maarten.svg">Saint Martin (French part)</option>
																					<option value="VC" <?php if ($userDetailsArray['Country']=="VC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/st-vincent-and-the-grenadines.svg">Saint Vincent and the Grenadines</option>
																					<option value="WS" <?php if ($userDetailsArray['Country']=="WS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/samoa.svg">Samoa</option>
																					<option value="SM" <?php if ($userDetailsArray['Country']=="SM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/san-marino.svg">San Marino</option>
																					<option value="ST" <?php if ($userDetailsArray['Country']=="ST"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sao-tome-and-prince.svg">Sao Tome and Principe</option>
																					<option value="SA" <?php if ($userDetailsArray['Country']=="SA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/saudi-arabia.svg">Saudi Arabia</option>
																					<option value="SN" <?php if ($userDetailsArray['Country']=="SN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/senegal.svg">Senegal</option>
																					<option value="RS" <?php if ($userDetailsArray['Country']=="RS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/serbia.svg">Serbia</option>
																					<option value="SC" <?php if ($userDetailsArray['Country']=="SC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/seychelles.svg">Seychelles</option>
																					<option value="SL" <?php if ($userDetailsArray['Country']=="SL"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sierra-leone.svg">Sierra Leone</option>
																					<option value="SG" <?php if ($userDetailsArray['Country']=="SG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/singapore.svg">Singapore</option>
																					<option value="SX" <?php if ($userDetailsArray['Country']=="SX"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sint-maarten.svg">Sint Maarten (Dutch part)</option>
																					<option value="SK" <?php if ($userDetailsArray['Country']=="SK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/slovakia.svg">Slovakia</option>
																					<option value="SI" <?php if ($userDetailsArray['Country']=="SI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/slovenia.svg">Slovenia</option>
																					<option value="SB" <?php if ($userDetailsArray['Country']=="SB"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/solomon-islands.svg">Solomon Islands</option>
																					<option value="SO" <?php if ($userDetailsArray['Country']=="SO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/somalia.svg">Somalia</option>
																					<option value="ZA" <?php if ($userDetailsArray['Country']=="ZA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/south-africa.svg">South Africa</option>
																					<option value="KR" <?php if ($userDetailsArray['Country']=="KR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/south-korea.svg">South Korea</option>
																					<option value="SS" <?php if ($userDetailsArray['Country']=="SS"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/south-sudan.svg">South Sudan</option>
																					<option value="ES" <?php if ($userDetailsArray['Country']=="ES"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/spain.svg">Spain</option>
																					<option value="LK" <?php if ($userDetailsArray['Country']=="LK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sri-lanka.svg">Sri Lanka</option>
																					<option value="SD" <?php if ($userDetailsArray['Country']=="SD"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sudan.svg">Sudan</option>
																					<option value="SR" <?php if ($userDetailsArray['Country']=="SR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/suriname.svg">Suriname</option>
																					<option value="SZ" <?php if ($userDetailsArray['Country']=="SZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/swaziland.svg">Swaziland</option>
																					<option value="SE" <?php if ($userDetailsArray['Country']=="SE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/sweden.svg">Sweden</option>
																					<option value="CH" <?php if ($userDetailsArray['Country']=="CH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/switzerland.svg">Switzerland</option>
																					<option value="SY" <?php if ($userDetailsArray['Country']=="SY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/syria.svg">Syrian Arab Republic</option>
																					<option value="TW" <?php if ($userDetailsArray['Country']=="TW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/taiwan.svg">Taiwan, Province of China</option>
																					<option value="TJ" <?php if ($userDetailsArray['Country']=="TJ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tajikistan.svg">Tajikistan</option>
																					<option value="TZ" <?php if ($userDetailsArray['Country']=="TZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tanzania.svg">Tanzania, United Republic of</option>
																					<option value="TH" <?php if ($userDetailsArray['Country']=="TH"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/thailand.svg">Thailand</option>
																					<option value="TG" <?php if ($userDetailsArray['Country']=="TG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/togo.svg">Togo</option>
																					<option value="TK" <?php if ($userDetailsArray['Country']=="TK"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tokelau.svg">Tokelau</option>
																					<option value="TO" <?php if ($userDetailsArray['Country']=="TO"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tonga.svg">Tonga</option>
																					<option value="TT" <?php if ($userDetailsArray['Country']=="TT"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/trinidad-and-tobago.svg">Trinidad and Tobago</option>
																					<option value="TN" <?php if ($userDetailsArray['Country']=="TN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tunisia.svg">Tunisia</option>
																					<option value="TR" <?php if ($userDetailsArray['Country']=="TR"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/turkey.svg">Turkey</option>
																					<option value="TM" <?php if ($userDetailsArray['Country']=="TM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/turkmenistan.svg">Turkmenistan</option>
																					<option value="TC" <?php if ($userDetailsArray['Country']=="TC"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/turks-and-caicos.svg">Turks and Caicos Islands</option>
																					<option value="TV" <?php if ($userDetailsArray['Country']=="TV"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/tuvalu.svg">Tuvalu</option>
																					<option value="UG" <?php if ($userDetailsArray['Country']=="UG"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/uganda.svg">Uganda</option>
																					<option value="UA" <?php if ($userDetailsArray['Country']=="UA"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/ukraine.svg">Ukraine</option>
																					<option value="AE" <?php if ($userDetailsArray['Country']=="AE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/united-arab-emirates.svg">United Arab Emirates</option>
																					<option value="GB" <?php if ($userDetailsArray['Country']=="GB"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/united-kingdom.svg">United Kingdom</option>
																					<option value="US" <?php if ($userDetailsArray['Country']=="US"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/united-states.svg">United States</option>
																					<option value="UY" <?php if ($userDetailsArray['Country']=="UY"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/uruguay.svg">Uruguay</option>
																					<option value="UZ" <?php if ($userDetailsArray['Country']=="UZ"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/uzbekistan.svg">Uzbekistan</option>
																					<option value="VU" <?php if ($userDetailsArray['Country']=="VU"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/vanuatu.svg">Vanuatu</option>
																					<option value="VE" <?php if ($userDetailsArray['Country']=="VE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/venezuela.svg">Venezuela, Bolivarian Republic of</option>
																					<option value="VN" <?php if ($userDetailsArray['Country']=="VN"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/vietnam.svg">Vietnam</option>
																					<option value="VI" <?php if ($userDetailsArray['Country']=="VI"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/virgin-islands.svg">Virgin Islands</option>
																					<option value="YE" <?php if ($userDetailsArray['Country']=="YE"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/yemen.svg">Yemen</option>
																					<option value="ZM" <?php if ($userDetailsArray['Country']=="ZM"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/zambia.svg">Zambia</option>
																					<option value="ZW" <?php if ($userDetailsArray['Country']=="ZW"){echo "selected=\"selected\"";}?> data-kt-select2-country="assets/media/flags/zimbabwe.svg">Zimbabwe</option>
															</select>
															<!--end::Select-->
														</div>
													</div>
														<!--end::Input group-->

													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Branch</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
														<select name="BranchID" aria-label="Select the Branch" data-control="select2" data-placeholder="Select the Branch" class="form-select form-select-solid form-select-lg" required>
																<option value="">Select the Branch</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("branch","BranchID","BranchName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["BranchID"]."\"";
                                                                       if ($userDetailsArray['BranchID']==$row["BranchID"])
                                                                        {echo " selected=\"selected\" ";}
                                                                       echo ">".$row["BranchName"];
                                                                       echo "</option>";
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Department</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="DepartmentID" aria-label="Select the Department" data-control="select2" data-placeholder="Select the Department" class="form-select form-select-solid form-select-lg" required>
																<option value="">Select the Department</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("department","DepartmentID","DepartmentName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["DepartmentID"]."\"";
                                                                       if ($userDetailsArray['DepartmentId']==$row["DepartmentID"])
                                                                        {echo " selected=\"selected\" ";}
                                                                       echo "\">".$row["DepartmentName"]."</option>";
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Job Title</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="JobTitleID" aria-label="Select the Job Title" data-control="select2" data-placeholder="Select the Job Title" class="form-select form-select-solid form-select-lg" required>
																<option value="">Select the Job Title</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("jobtitle","JobTitleID","JobTitleName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["JobTitleID"]."\"";
                                                                       if ($userDetailsArray['JobTitleID']==$row["JobTitleID"])
                                                                       {echo " selected=\"selected\" ";}
                                                                       echo ">".$row["JobTitleName"]."</option>";
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Pay Grade</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="PayGradeID" aria-label="Select the Pay Grade" data-control="select2" data-placeholder="Select the Pay Grade" class="form-select form-select-solid form-select-lg" required>
																<option value="">Select the Pay Grade</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("paygrade","PayGradeID","PayGradeName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["PayGradeID"]."\"";
                                                                       if ($userDetailsArray['PayGradeID']==$row["PayGradeID"])
                                                                       {echo " selected=\"selected\" ";}
                                                                       echo ">".$row["PayGradeName"]."</option>";
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
														<label class="col-lg-4 col-form-label fw-semibold fs-6 required">Employment Status</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="EmploymentStatusID" aria-label="Select the Employment Status" data-control="select2" data-placeholder="Select the Employment Status" class="form-select form-select-solid form-select-lg" required>
																<option value="">Select the Employment Status</option>
																<?php 
																	$sqlResult=getDBTablePrimaryData("employmentstatus","EmploymentStatusID","EmploymentStatusName");
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["EmploymentStatusID"]."\"";
                                                                       if ($userDetailsArray['EmploymentStatusID']==$row["EmploymentStatusID"])
                                                                       {echo " selected=\"selected\" ";}
                                                                       echo ">".$row["EmploymentStatusName"]."</option>";
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
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Emergency Contact Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="EmergencyContactName" class="form-control form-control-lg form-control-solid" placeholder="Emergency Contact Person's Name" value="<?php echo $userDetailsArray['EmergencyContactName'];?>" required/>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Emergancy Contact Number</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="EmergencyContactNumber" class="form-control form-control-lg form-control-solid" placeholder="Emergancy Contact Person's Number" value="<?php echo $userDetailsArray['EmergencyContactPhoneNum'];?>" required/>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->


											
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Emergency Contact Address</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
														<textarea name = "EmergencyContactAddress" placeholder="Emergency Contact Person's Address" class="form-control form-control-lg form-control-solid" data-kt-autosize="true" required><?php echo $userDetailsArray['EmergencyContactAddress'];?></textarea>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->



												
																										<!--begin::Input group-->
																										<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Supervisor</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select id="kt_docs_select2_rich_content" name="SupervisorID" aria-label="Select a Supervisor..." data-placeholder="Select a Supervisor..." class="form-select form-select-solid form-select-lg" required>
																<option value="">Select a Supervisor...</option>
																<?php 
																	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
																	$sql = "SELECT EmployeeID,Name,Email,ProfilePhoto FROM EmployeeDetails WHERE Email is not NULL";
																	$sqlResult = $mysqli->query($sql);
																	
																	while(($row =  $sqlResult->fetch_assoc())) {
																	   //store $ID and $name as an key value pair
																	   echo "<option value=\"".$row["EmployeeID"]."\" data-kt-rich-content-subcontent=\"".$row["Email"]."\" data-kt-rich-content-icon=\"".$row["ProfilePhoto"]."\"";
                                                                       if ($userDetailsArray['SupervisorID']==$row["EmployeeID"])
                                                                       {echo " selected=\"selected\" ";}
                                                                       echo ">".$row["Name"]."</option>";
																	}
																	
																?>	
																
															</select>
															<!--end::Select-->
														</div>
													</div>
														<!--end::Input group-->


                                                        <input type="hidden" name="EmployeeID" value="<?php echo $userDetailsArray['EmployeeID'];?>"/>
                                                        <input type="hidden" name="EmergencyContactId" value="<?php echo $userDetailsArray['EmergencyContactId'];?>"/>

												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" href="?page=Employee-Details" class="btn btn-light btn-active-light-primary me-2">Cancel</button>
													<button type="submit" name="submit" value="editEmployee" class="btn btn-primary" id="kt_account_profile_details_submit">Save Employee</button>
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
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		
		<script src="assets/js/custom/countrySearch.js"></script>
		<script src="assets/js/custom/supervisorSelect.js"></script>
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