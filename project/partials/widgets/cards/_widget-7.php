<?php 
	
	//include database config
	require_once(PROJECT_ROOT_PATH ."/includes/dbconfig.inc.php");



	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	$sql = "SELECT COUNT(*) FROM hera.employee;";
	//run "$sql" on mysqli and save the count to variable $approvedCount
	$employeeCount = $mysqli->query($sql);
	//extract count from approvedCount
	$employeeCount = $employeeCount->fetch_row();
	//convert count to integer
	$employeeCount =  (int)$employeeCount[0];

	$sql = "SELECT COUNT(*) FROM hera.useraccount;";
	//run "$sql" on mysqli and save the count to variable $approvedCount
	$userCount = $mysqli->query($sql);
	//extract count from approvedCount
	$userCount = $userCount->fetch_row();
	//convert count to integer
	$userCount =  (int)$userCount[0];

	$sql = "SELECT Username,ProfilePhoto FROM hera.useraccount;";
	$userData = $mysqli->query($sql);
	//extract count from approvedCount
	

?>
<!--begin::Card widget 7-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
	<!--begin::Header-->
	<div class="card-header pt-5">
		<!--begin::Title-->
		<div class="card-title d-flex flex-column">
			<!--begin::Amount-->
			<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?php echo $employeeCount;?></span>
			<!--end::Amount-->
			<!--begin::Subtitle-->
			<span class="text-gray-400 pt-1 fw-semibold fs-6">Employees</span>
			<!--end::Subtitle-->
			
		</div>
		<!--end::Title-->

				<!--begin::Title-->
				<div class="card-title d-flex flex-column justify-content-end" style="align-items:end!important;">
			<!--begin::Amount-->
			<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?php echo $userCount;?></span>
			<!--end::Amount-->
			<!--begin::Subtitle-->
			<span class="text-gray-400 pt-1 fw-semibold fs-6">Users</span>
			<!--end::Subtitle-->
			
		</div>
		<!--end::Title-->
	</div>
	<!--end::Header-->
		<!--begin::Header-->
		<div class="card-header pt-5">

	</div>
	<!--end::Header-->
	<!--begin::Card body-->
	<div class="card-body d-flex flex-column justify-content-end pe-0">
		<!--begin::Title-->
		<span class="fs-6 fw-bolder text-gray-800 d-block mb-2"></span>
		<!--end::Title-->
		<!--begin::Users group-->
		<div class="symbol-group symbol-hover flex-nowrap">
			<?php
			while ($row= $userData->fetch_row()){
			echo "<div class=\"symbol symbol-35px symbol-circle\" data-bs-toggle=\"tooltip\" title=\"".$row[0]."\">
				<img alt=\"".$row[0]."\" src=\"".$row[1]."\" />
			</div>";
		}
			?>
			<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
				<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+<?php $remaining=$employeeCount-$userCount; 
				echo ($remaining); ?></span>
			</a>
		</div>
		<!--end::Users group-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card widget 7-->
