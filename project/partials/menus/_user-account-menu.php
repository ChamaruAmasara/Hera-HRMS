<?php
    include_once PROJECT_ROOT_PATH.'/includes/userdetails.inc.php';
	$userDetails = new UserDetails($_SESSION['UserID']);
	$fullName = $userDetails->getFullName();
	$email = $userDetails->getEmail();
	$profilePic = $userDetails->getProfilePic();

?>

<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
	<!--begin::Menu item-->
	<div class="menu-item px-3">
		<div class="menu-content d-flex align-items-center px-3">
			<!--begin::Avatar-->
			<div class="symbol symbol-50px me-5">
				<img alt="Logo" src="<?php echo $profilePic  ?>" />
			</div>
			<!--end::Avatar-->
			<!--begin::Username-->
			<div class="d-flex flex-column">
				<div class="fw-bold d-flex align-items-center fs-5"> <?php echo $fullName  ?> </div>
				<a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?php echo $email  ?></a>
			</div>
			<!--end::Username-->
		</div>
	</div>
	<!--end::Menu item-->


	<!--begin::Menu separator-->
	<div class="separator my-2"></div>
	<!--end::Menu separator-->
	<!--begin::Menu item-->
	<div class="menu-item px-5">
		<a href="?page=Personal-Info" class="menu-link px-5">My Profile</a>
	</div>
	<!--end::Menu item-->
	<!--begin::Menu item-->
	<div class="menu-item px-5">
		<a href="?page=Employment-Info" class="menu-link px-5">
			<span class="menu-text">Employment Info</span>			
		</a>
	</div>
	<div class="menu-item px-5">
		<a href="?page=Employment-Info" class="menu-link px-5">
			<span class="menu-text">Sign Out</span>			
		</a>
	</div>
	<!--end::Menu item-->
	
</div>
<!--end::User account menu-->