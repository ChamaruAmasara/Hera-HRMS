
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

<?php



require_once(PROJECT_ROOT_PATH ."/includes/getDBTablePrimaryData.php");
include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
if (isset($_GET['ID'])) {
	$id=$_GET['ID'];
	$userDetails = new UserDetails(EmployeeID:$id);
	unset($_GET['ID']);
}


if (isset($_POST["submit"])) { 

    if ($_POST["submit"]=="addEmployee"){

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
												<h1 class="fw-bold m-0">Profile Details</h1>
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
															<input type="text" name="Name" class="form-control form-control-lg form-control-solid" placeholder="Full Name"  required/>
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
																		<input class="form-check-input" name="Gender[]" type="radio" value="male" required/>
																		<span class="fw-semibold ps-2 fs-6">Male</span>
																	</label>
																	<!--end::Option-->
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid">
																		<input class="form-check-input" name="Gender[]" type="radio" value="female" />
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
																		<input class="form-check-input" name="MaritalStatus[]" type="radio" value="Married" required/>
																		<span class="fw-semibold ps-2 fs-6">Married</span>
																	</label>
																	<!--end::Option-->
																	<!--begin::Option-->
																	<label class="form-check form-check-custom form-check-inline form-check-solid">
																		<input class="form-check-input" name="MaritalStatus[]" type="radio" value="Unmarried" />
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
															<input class="form-control form-control-solid ps-12" name="BirthDate" placeholder="Enter birthdate" id="kt_datepicker_1" required/>
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
														<textarea name = "Address" placeholder="Address" class="form-control form-control form-control-solid" data-kt-autosize="true" required></textarea></textarea>
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
															<select id="kt_docs_select2_country" name="country" aria-label="Select a Country..." data-placeholder="Select a Country..." class="form-select form-select-solid form-select-lg" required>
																<option value="">Select a Country...</option>
																<option value="AF" data-kt-select2-country="assets/media/flags/afghanistan.svg">Afghanistan</option>
																<option value="AX" data-kt-select2-country="assets/media/flags/aland-islands.svg">Aland Islands</option>
																<option value="AL" data-kt-select2-country="assets/media/flags/albania.svg">Albania</option>
																<option value="DZ" data-kt-select2-country="assets/media/flags/algeria.svg">Algeria</option>
																<option value="AS" data-kt-select2-country="assets/media/flags/american-samoa.svg">American Samoa</option>
																<option value="AD" data-kt-select2-country="assets/media/flags/andorra.svg">Andorra</option>
																<option value="AO" data-kt-select2-country="assets/media/flags/angola.svg">Angola</option>
																<option value="AI" data-kt-select2-country="assets/media/flags/anguilla.svg">Anguilla</option>
																<option value="AG" data-kt-select2-country="assets/media/flags/antigua-and-barbuda.svg">Antigua and Barbuda</option>
																<option value="AR" data-kt-select2-country="assets/media/flags/argentina.svg">Argentina</option>
																<option value="AM" data-kt-select2-country="assets/media/flags/armenia.svg">Armenia</option>
																<option value="AW" data-kt-select2-country="assets/media/flags/aruba.svg">Aruba</option>
																<option value="AU" data-kt-select2-country="assets/media/flags/australia.svg">Australia</option>
																<option value="AT" data-kt-select2-country="assets/media/flags/austria.svg">Austria</option>
																<option value="AZ" data-kt-select2-country="assets/media/flags/azerbaijan.svg">Azerbaijan</option>
																<option value="BS" data-kt-select2-country="assets/media/flags/bahamas.svg">Bahamas</option>
																<option value="BH" data-kt-select2-country="assets/media/flags/bahrain.svg">Bahrain</option>
																<option value="BD" data-kt-select2-country="assets/media/flags/bangladesh.svg">Bangladesh</option>
																<option value="BB" data-kt-select2-country="assets/media/flags/barbados.svg">Barbados</option>
																<option value="BY" data-kt-select2-country="assets/media/flags/belarus.svg">Belarus</option>
																<option value="BE" data-kt-select2-country="assets/media/flags/belgium.svg">Belgium</option>
																<option value="BZ" data-kt-select2-country="assets/media/flags/belize.svg">Belize</option>
																<option value="BJ" data-kt-select2-country="assets/media/flags/benin.svg">Benin</option>
																<option value="BM" data-kt-select2-country="assets/media/flags/bermuda.svg">Bermuda</option>
																<option value="BT" data-kt-select2-country="assets/media/flags/bhutan.svg">Bhutan</option>
																<option value="BO" data-kt-select2-country="assets/media/flags/bolivia.svg">Bolivia, Plurinational State of</option>
																<option value="BQ" data-kt-select2-country="assets/media/flags/bonaire.svg">Bonaire, Sint Eustatius and Saba</option>
																<option value="BA" data-kt-select2-country="assets/media/flags/bosnia-and-herzegovina.svg">Bosnia and Herzegovina</option>
																<option value="BW" data-kt-select2-country="assets/media/flags/botswana.svg">Botswana</option>
																<option value="BR" data-kt-select2-country="assets/media/flags/brazil.svg">Brazil</option>
																<option value="IO" data-kt-select2-country="assets/media/flags/british-indian-ocean-territory.svg">British Indian Ocean Territory</option>
																<option value="BN" data-kt-select2-country="assets/media/flags/brunei.svg">Brunei Darussalam</option>
																<option value="BG" data-kt-select2-country="assets/media/flags/bulgaria.svg">Bulgaria</option>
																<option value="BF" data-kt-select2-country="assets/media/flags/burkina-faso.svg">Burkina Faso</option>
																<option value="BI" data-kt-select2-country="assets/media/flags/burundi.svg">Burundi</option>
																<option value="KH" data-kt-select2-country="assets/media/flags/cambodia.svg">Cambodia</option>
																<option value="CM" data-kt-select2-country="assets/media/flags/cameroon.svg">Cameroon</option>
																<option value="CA" data-kt-select2-country="assets/media/flags/canada.svg">Canada</option>
																<option value="CV" data-kt-select2-country="assets/media/flags/cape-verde.svg">Cape Verde</option>
																<option value="KY" data-kt-select2-country="assets/media/flags/cayman-islands.svg">Cayman Islands</option>
																<option value="CF" data-kt-select2-country="assets/media/flags/central-african-republic.svg">Central African Republic</option>
																<option value="TD" data-kt-select2-country="assets/media/flags/chad.svg">Chad</option>
																<option value="CL" data-kt-select2-country="assets/media/flags/chile.svg">Chile</option>
																<option value="CN" data-kt-select2-country="assets/media/flags/china.svg">China</option>
																<option value="CX" data-kt-select2-country="assets/media/flags/christmas-island.svg">Christmas Island</option>
																<option value="CC" data-kt-select2-country="assets/media/flags/cocos-island.svg">Cocos (Keeling) Islands</option>
																<option value="CO" data-kt-select2-country="assets/media/flags/colombia.svg">Colombia</option>
																<option value="KM" data-kt-select2-country="assets/media/flags/comoros.svg">Comoros</option>
																<option value="CK" data-kt-select2-country="assets/media/flags/cook-islands.svg">Cook Islands</option>
																<option value="CR" data-kt-select2-country="assets/media/flags/costa-rica.svg">Costa Rica</option>
																<option value="CI" data-kt-select2-country="assets/media/flags/ivory-coast.svg">Côte d'Ivoire</option>
																<option value="HR" data-kt-select2-country="assets/media/flags/croatia.svg">Croatia</option>
																<option value="CU" data-kt-select2-country="assets/media/flags/cuba.svg">Cuba</option>
																<option value="CW" data-kt-select2-country="assets/media/flags/curacao.svg">Curaçao</option>
																<option value="CZ" data-kt-select2-country="assets/media/flags/czech-republic.svg">Czech Republic</option>
																<option value="DK" data-kt-select2-country="assets/media/flags/denmark.svg">Denmark</option>
																<option value="DJ" data-kt-select2-country="assets/media/flags/djibouti.svg">Djibouti</option>
																<option value="DM" data-kt-select2-country="assets/media/flags/dominica.svg">Dominica</option>
																<option value="DO" data-kt-select2-country="assets/media/flags/dominican-republic.svg">Dominican Republic</option>
																<option value="EC" data-kt-select2-country="assets/media/flags/ecuador.svg">Ecuador</option>
																<option value="EG" data-kt-select2-country="assets/media/flags/egypt.svg">Egypt</option>
																<option value="SV" data-kt-select2-country="assets/media/flags/el-salvador.svg">El Salvador</option>
																<option value="GQ" data-kt-select2-country="assets/media/flags/equatorial-guinea.svg">Equatorial Guinea</option>
																<option value="ER" data-kt-select2-country="assets/media/flags/eritrea.svg">Eritrea</option>
																<option value="EE" data-kt-select2-country="assets/media/flags/estonia.svg">Estonia</option>
																<option value="ET" data-kt-select2-country="assets/media/flags/ethiopia.svg">Ethiopia</option>
																<option value="FK" data-kt-select2-country="assets/media/flags/falkland-islands.svg">Falkland Islands (Malvinas)</option>
																<option value="FJ" data-kt-select2-country="assets/media/flags/fiji.svg">Fiji</option>
																<option value="FI" data-kt-select2-country="assets/media/flags/finland.svg">Finland</option>
																<option value="FR" data-kt-select2-country="assets/media/flags/france.svg">France</option>
																<option value="PF" data-kt-select2-country="assets/media/flags/french-polynesia.svg">French Polynesia</option>
																<option value="GA" data-kt-select2-country="assets/media/flags/gabon.svg">Gabon</option>
																<option value="GM" data-kt-select2-country="assets/media/flags/gambia.svg">Gambia</option>
																<option value="GE" data-kt-select2-country="assets/media/flags/georgia.svg">Georgia</option>
																<option value="DE" data-kt-select2-country="assets/media/flags/germany.svg">Germany</option>
																<option value="GH" data-kt-select2-country="assets/media/flags/ghana.svg">Ghana</option>
																<option value="GI" data-kt-select2-country="assets/media/flags/gibraltar.svg">Gibraltar</option>
																<option value="GR" data-kt-select2-country="assets/media/flags/greece.svg">Greece</option>
																<option value="GL" data-kt-select2-country="assets/media/flags/greenland.svg">Greenland</option>
																<option value="GD" data-kt-select2-country="assets/media/flags/grenada.svg">Grenada</option>
																<option value="GU" data-kt-select2-country="assets/media/flags/guam.svg">Guam</option>
																<option value="GT" data-kt-select2-country="assets/media/flags/guatemala.svg">Guatemala</option>
																<option value="GG" data-kt-select2-country="assets/media/flags/guernsey.svg">Guernsey</option>
																<option value="GN" data-kt-select2-country="assets/media/flags/guinea.svg">Guinea</option>
																					<option value="GW" data-kt-select2-country="assets/media/flags/guinea-bissau.svg">Guinea-Bissau</option>
																					<option value="HT" data-kt-select2-country="assets/media/flags/haiti.svg">Haiti</option>
																					<option value="VA" data-kt-select2-country="assets/media/flags/vatican-city.svg">Holy See (Vatican City State)</option>
																					<option value="HN" data-kt-select2-country="assets/media/flags/honduras.svg">Honduras</option>
																					<option value="HK" data-kt-select2-country="assets/media/flags/hong-kong.svg">Hong Kong</option>
																					<option value="HU" data-kt-select2-country="assets/media/flags/hungary.svg">Hungary</option>
																					<option value="IS" data-kt-select2-country="assets/media/flags/iceland.svg">Iceland</option>
																					<option value="IN" data-kt-select2-country="assets/media/flags/india.svg">India</option>
																					<option value="ID" data-kt-select2-country="assets/media/flags/indonesia.svg">Indonesia</option>
																					<option value="IR" data-kt-select2-country="assets/media/flags/iran.svg">Iran, Islamic Republic of</option>
																					<option value="IQ" data-kt-select2-country="assets/media/flags/iraq.svg">Iraq</option>
																					<option value="IE" data-kt-select2-country="assets/media/flags/ireland.svg">Ireland</option>
																					<option value="IM" data-kt-select2-country="assets/media/flags/isle-of-man.svg">Isle of Man</option>
																					<option value="IL" data-kt-select2-country="assets/media/flags/israel.svg">Israel</option>
																					<option value="IT" data-kt-select2-country="assets/media/flags/italy.svg">Italy</option>
																					<option value="JM" data-kt-select2-country="assets/media/flags/jamaica.svg">Jamaica</option>
																					<option value="JP" data-kt-select2-country="assets/media/flags/japan.svg">Japan</option>
																					<option value="JE" data-kt-select2-country="assets/media/flags/jersey.svg">Jersey</option>
																					<option value="JO" data-kt-select2-country="assets/media/flags/jordan.svg">Jordan</option>
																					<option value="KZ" data-kt-select2-country="assets/media/flags/kazakhstan.svg">Kazakhstan</option>
																					<option value="KE" data-kt-select2-country="assets/media/flags/kenya.svg">Kenya</option>
																					<option value="KI" data-kt-select2-country="assets/media/flags/kiribati.svg">Kiribati</option>
																					<option value="KP" data-kt-select2-country="assets/media/flags/north-korea.svg">Korea, Democratic People's Republic of</option>
																					<option value="KW" data-kt-select2-country="assets/media/flags/kuwait.svg">Kuwait</option>
																					<option value="KG" data-kt-select2-country="assets/media/flags/kyrgyzstan.svg">Kyrgyzstan</option>
																					<option value="LA" data-kt-select2-country="assets/media/flags/laos.svg">Lao People's Democratic Republic</option>
																					<option value="LV" data-kt-select2-country="assets/media/flags/latvia.svg">Latvia</option>
																					<option value="LB" data-kt-select2-country="assets/media/flags/lebanon.svg">Lebanon</option>
																					<option value="LS" data-kt-select2-country="assets/media/flags/lesotho.svg">Lesotho</option>
																					<option value="LR" data-kt-select2-country="assets/media/flags/liberia.svg">Liberia</option>
																					<option value="LY" data-kt-select2-country="assets/media/flags/libya.svg">Libya</option>
																					<option value="LI" data-kt-select2-country="assets/media/flags/liechtenstein.svg">Liechtenstein</option>
																					<option value="LT" data-kt-select2-country="assets/media/flags/lithuania.svg">Lithuania</option>
																					<option value="LU" data-kt-select2-country="assets/media/flags/luxembourg.svg">Luxembourg</option>
																					<option value="MO" data-kt-select2-country="assets/media/flags/macao.svg">Macao</option>
																					<option value="MG" data-kt-select2-country="assets/media/flags/madagascar.svg">Madagascar</option>
																					<option value="MW" data-kt-select2-country="assets/media/flags/malawi.svg">Malawi</option>
																					<option value="MY" data-kt-select2-country="assets/media/flags/malaysia.svg">Malaysia</option>
																					<option value="MV" data-kt-select2-country="assets/media/flags/maldives.svg">Maldives</option>
																					<option value="ML" data-kt-select2-country="assets/media/flags/mali.svg">Mali</option>
																					<option value="MT" data-kt-select2-country="assets/media/flags/malta.svg">Malta</option>
																					<option value="MH" data-kt-select2-country="assets/media/flags/marshall-island.svg">Marshall Islands</option>
																					<option value="MQ" data-kt-select2-country="assets/media/flags/martinique.svg">Martinique</option>
																					<option value="MR" data-kt-select2-country="assets/media/flags/mauritania.svg">Mauritania</option>
																					<option value="MU" data-kt-select2-country="assets/media/flags/mauritius.svg">Mauritius</option>
																					<option value="MX" data-kt-select2-country="assets/media/flags/mexico.svg">Mexico</option>
																					<option value="FM" data-kt-select2-country="assets/media/flags/micronesia.svg">Micronesia, Federated States of</option>
																					<option value="MD" data-kt-select2-country="assets/media/flags/moldova.svg">Moldova, Republic of</option>
																					<option value="MC" data-kt-select2-country="assets/media/flags/monaco.svg">Monaco</option>
																					<option value="MN" data-kt-select2-country="assets/media/flags/mongolia.svg">Mongolia</option>
																					<option value="ME" data-kt-select2-country="assets/media/flags/montenegro.svg">Montenegro</option>
																					<option value="MS" data-kt-select2-country="assets/media/flags/montserrat.svg">Montserrat</option>
																					<option value="MA" data-kt-select2-country="assets/media/flags/morocco.svg">Morocco</option>
																					<option value="MZ" data-kt-select2-country="assets/media/flags/mozambique.svg">Mozambique</option>
																					<option value="MM" data-kt-select2-country="assets/media/flags/myanmar.svg">Myanmar</option>
																					<option value="NA" data-kt-select2-country="assets/media/flags/namibia.svg">Namibia</option>
																					<option value="NR" data-kt-select2-country="assets/media/flags/nauru.svg">Nauru</option>
																					<option value="NP" data-kt-select2-country="assets/media/flags/nepal.svg">Nepal</option>
																					<option value="NL" data-kt-select2-country="assets/media/flags/netherlands.svg">Netherlands</option>
																					<option value="NZ" data-kt-select2-country="assets/media/flags/new-zealand.svg">New Zealand</option>
																					<option value="NI" data-kt-select2-country="assets/media/flags/nicaragua.svg">Nicaragua</option>
																					<option value="NE" data-kt-select2-country="assets/media/flags/niger.svg">Niger</option>
																					<option value="NG" data-kt-select2-country="assets/media/flags/nigeria.svg">Nigeria</option>
																					<option value="NU" data-kt-select2-country="assets/media/flags/niue.svg">Niue</option>
																					<option value="NF" data-kt-select2-country="assets/media/flags/norfolk-island.svg">Norfolk Island</option>
																					<option value="MP" data-kt-select2-country="assets/media/flags/northern-mariana-islands.svg">Northern Mariana Islands</option>
																					<option value="NO" data-kt-select2-country="assets/media/flags/norway.svg">Norway</option>
																					<option value="OM" data-kt-select2-country="assets/media/flags/oman.svg">Oman</option>
																					<option value="PK" data-kt-select2-country="assets/media/flags/pakistan.svg">Pakistan</option>
																					<option value="PW" data-kt-select2-country="assets/media/flags/palau.svg">Palau</option>
																					<option value="PS" data-kt-select2-country="assets/media/flags/palestine.svg">Palestinian Territory, Occupied</option>
																					<option value="PA" data-kt-select2-country="assets/media/flags/panama.svg">Panama</option>
																					<option value="PG" data-kt-select2-country="assets/media/flags/papua-new-guinea.svg">Papua New Guinea</option>
																					<option value="PY" data-kt-select2-country="assets/media/flags/paraguay.svg">Paraguay</option>
																					<option value="PE" data-kt-select2-country="assets/media/flags/peru.svg">Peru</option>
																					<option value="PH" data-kt-select2-country="assets/media/flags/philippines.svg">Philippines</option>
																					<option value="PL" data-kt-select2-country="assets/media/flags/poland.svg">Poland</option>
																					<option value="PT" data-kt-select2-country="assets/media/flags/portugal.svg">Portugal</option>
																					<option value="PR" data-kt-select2-country="assets/media/flags/puerto-rico.svg">Puerto Rico</option>
																					<option value="QA" data-kt-select2-country="assets/media/flags/qatar.svg">Qatar</option>
																					<option value="RO" data-kt-select2-country="assets/media/flags/romania.svg">Romania</option>
																					<option value="RU" data-kt-select2-country="assets/media/flags/russia.svg">Russian Federation</option>
																					<option value="RW" data-kt-select2-country="assets/media/flags/rwanda.svg">Rwanda</option>
																					<option value="BL" data-kt-select2-country="assets/media/flags/st-barts.svg">Saint Barthélemy</option>
																					<option value="KN" data-kt-select2-country="assets/media/flags/saint-kitts-and-nevis.svg">Saint Kitts and Nevis</option>
																					<option value="LC" data-kt-select2-country="assets/media/flags/st-lucia.svg">Saint Lucia</option>
																					<option value="MF" data-kt-select2-country="assets/media/flags/sint-maarten.svg">Saint Martin (French part)</option>
																					<option value="VC" data-kt-select2-country="assets/media/flags/st-vincent-and-the-grenadines.svg">Saint Vincent and the Grenadines</option>
																					<option value="WS" data-kt-select2-country="assets/media/flags/samoa.svg">Samoa</option>
																					<option value="SM" data-kt-select2-country="assets/media/flags/san-marino.svg">San Marino</option>
																					<option value="ST" data-kt-select2-country="assets/media/flags/sao-tome-and-prince.svg">Sao Tome and Principe</option>
																					<option value="SA" data-kt-select2-country="assets/media/flags/saudi-arabia.svg">Saudi Arabia</option>
																					<option value="SN" data-kt-select2-country="assets/media/flags/senegal.svg">Senegal</option>
																					<option value="RS" data-kt-select2-country="assets/media/flags/serbia.svg">Serbia</option>
																					<option value="SC" data-kt-select2-country="assets/media/flags/seychelles.svg">Seychelles</option>
																					<option value="SL" data-kt-select2-country="assets/media/flags/sierra-leone.svg">Sierra Leone</option>
																					<option value="SG" data-kt-select2-country="assets/media/flags/singapore.svg">Singapore</option>
																					<option value="SX" data-kt-select2-country="assets/media/flags/sint-maarten.svg">Sint Maarten (Dutch part)</option>
																					<option value="SK" data-kt-select2-country="assets/media/flags/slovakia.svg">Slovakia</option>
																					<option value="SI" data-kt-select2-country="assets/media/flags/slovenia.svg">Slovenia</option>
																					<option value="SB" data-kt-select2-country="assets/media/flags/solomon-islands.svg">Solomon Islands</option>
																					<option value="SO" data-kt-select2-country="assets/media/flags/somalia.svg">Somalia</option>
																					<option value="ZA" data-kt-select2-country="assets/media/flags/south-africa.svg">South Africa</option>
																					<option value="KR" data-kt-select2-country="assets/media/flags/south-korea.svg">South Korea</option>
																					<option value="SS" data-kt-select2-country="assets/media/flags/south-sudan.svg">South Sudan</option>
																					<option value="ES" data-kt-select2-country="assets/media/flags/spain.svg">Spain</option>
																					<option value="LK" data-kt-select2-country="assets/media/flags/sri-lanka.svg">Sri Lanka</option>
																					<option value="SD" data-kt-select2-country="assets/media/flags/sudan.svg">Sudan</option>
																					<option value="SR" data-kt-select2-country="assets/media/flags/suriname.svg">Suriname</option>
																					<option value="SZ" data-kt-select2-country="assets/media/flags/swaziland.svg">Swaziland</option>
																					<option value="SE" data-kt-select2-country="assets/media/flags/sweden.svg">Sweden</option>
																					<option value="CH" data-kt-select2-country="assets/media/flags/switzerland.svg">Switzerland</option>
																					<option value="SY" data-kt-select2-country="assets/media/flags/syria.svg">Syrian Arab Republic</option>
																					<option value="TW" data-kt-select2-country="assets/media/flags/taiwan.svg">Taiwan, Province of China</option>
																					<option value="TJ" data-kt-select2-country="assets/media/flags/tajikistan.svg">Tajikistan</option>
																					<option value="TZ" data-kt-select2-country="assets/media/flags/tanzania.svg">Tanzania, United Republic of</option>
																					<option value="TH" data-kt-select2-country="assets/media/flags/thailand.svg">Thailand</option>
																					<option value="TG" data-kt-select2-country="assets/media/flags/togo.svg">Togo</option>
																					<option value="TK" data-kt-select2-country="assets/media/flags/tokelau.svg">Tokelau</option>
																					<option value="TO" data-kt-select2-country="assets/media/flags/tonga.svg">Tonga</option>
																					<option value="TT" data-kt-select2-country="assets/media/flags/trinidad-and-tobago.svg">Trinidad and Tobago</option>
																					<option value="TN" data-kt-select2-country="assets/media/flags/tunisia.svg">Tunisia</option>
																					<option value="TR" data-kt-select2-country="assets/media/flags/turkey.svg">Turkey</option>
																					<option value="TM" data-kt-select2-country="assets/media/flags/turkmenistan.svg">Turkmenistan</option>
																					<option value="TC" data-kt-select2-country="assets/media/flags/turks-and-caicos.svg">Turks and Caicos Islands</option>
																					<option value="TV" data-kt-select2-country="assets/media/flags/tuvalu.svg">Tuvalu</option>
																					<option value="UG" data-kt-select2-country="assets/media/flags/uganda.svg">Uganda</option>
																					<option value="UA" data-kt-select2-country="assets/media/flags/ukraine.svg">Ukraine</option>
																					<option value="AE" data-kt-select2-country="assets/media/flags/united-arab-emirates.svg">United Arab Emirates</option>
																					<option value="GB" data-kt-select2-country="assets/media/flags/united-kingdom.svg">United Kingdom</option>
																					<option value="US" data-kt-select2-country="assets/media/flags/united-states.svg">United States</option>
																					<option value="UY" data-kt-select2-country="assets/media/flags/uruguay.svg">Uruguay</option>
																					<option value="UZ" data-kt-select2-country="assets/media/flags/uzbekistan.svg">Uzbekistan</option>
																					<option value="VU" data-kt-select2-country="assets/media/flags/vanuatu.svg">Vanuatu</option>
																					<option value="VE" data-kt-select2-country="assets/media/flags/venezuela.svg">Venezuela, Bolivarian Republic of</option>
																					<option value="VN" data-kt-select2-country="assets/media/flags/vietnam.svg">Vietnam</option>
																					<option value="VI" data-kt-select2-country="assets/media/flags/virgin-islands.svg">Virgin Islands</option>
																					<option value="YE" data-kt-select2-country="assets/media/flags/yemen.svg">Yemen</option>
																					<option value="ZM" data-kt-select2-country="assets/media/flags/zambia.svg">Zambia</option>
																					<option value="ZW" data-kt-select2-country="assets/media/flags/zimbabwe.svg">Zimbabwe</option>
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
																	   echo "<option value=\"".$row["BranchID"]."\">".$row["BranchName"]."</option>";
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
																	   echo "<option value=\"".$row["DepartmentID"]."\">".$row["DepartmentName"]."</option>";
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
																	   echo "<option value=\"".$row["JobTitleID"]."\">".$row["JobTitleName"]."</option>";
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
																	   echo "<option value=\"".$row["PayGradeID"]."\">".$row["PayGradeName"]."</option>";
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
																	   echo "<option value=\"".$row["EmploymentStatusID"]."\">".$row["EmploymentStatusName"]."</option>";
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
															<input type="text" name="EmergencyContactName" class="form-control form-control-lg form-control-solid" placeholder="Emergency Contact Person's Name"  required/>
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
															<input type="text" name="EmergencyContactNumber" class="form-control form-control-lg form-control-solid" placeholder="Emergancy Contact Person's Number"  required/>
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
														<textarea name = "EmergencyContactAddress" placeholder="Emergency Contact Person's Address" class="form-control form-control form-control-solid" data-kt-autosize="true" required></textarea></textarea>
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
																	   echo "<option value=\"".$row["EmployeeID"]."\" data-kt-rich-content-subcontent=\"".$row["Email"]."\" data-kt-rich-content-icon=\"".$row["ProfilePhoto"]."\" >".$row["Name"]."</option>";
																	}
																	
																?>	
																
															</select>
															<!--end::Select-->
														</div>
													</div>
														<!--end::Input group-->


												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button type="submit" name="submit" value="addEmployee" class="btn btn-primary" id="kt_account_profile_details_submit">Add Employee</button>
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