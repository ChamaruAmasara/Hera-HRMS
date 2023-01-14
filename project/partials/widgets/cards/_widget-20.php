<?php 
	
	//include database config
	require_once(PROJECT_ROOT_PATH ."/includes/dbconfig.inc.php");



	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	function getCounts($mysqli,$status){
		$sql = "SELECT COUNT(*) FROM hera.leave WHERE Approved='$status';";
		//run "$sql" on mysqli and save the count to variable $approvedCount
		$approvedCount = $mysqli->query($sql);
		//extract count from approvedCount
		$approvedCount = $approvedCount->fetch_row();
		//convert count to integer
		return (int)$approvedCount[0];

	}

	$approvedCount = getCounts($mysqli,"Approved");

	$pendingCount = getCounts($mysqli,"Pending");

	$rejectedCount = getCounts($mysqli,"Rejected");


	$totalCount=$pendingCount+$approvedCount+$rejectedCount;
	$percentage=100-round($pendingCount/($totalCount)*100);


?>
<!--begin::Card widget 20-->
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10" style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png')">
	<!--begin::Header-->
	<div class="card-header pt-5">
		<!--begin::Title-->
		<div class="card-title d-flex flex-column">
			<!--begin::Amount-->
			<span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"><?php echo $pendingCount; ?></span>
			<!--end::Amount-->
			<!--begin::Subtitle-->
			<span class="text-white opacity-75 pt-1 fw-semibold fs-6">Leave Requests to be moderated</span>
			<!--end::Subtitle-->
		</div>
		<!--end::Title-->
	</div>
	<!--end::Header-->
	<?php
	if (in_array($_SESSION['UserAccountLevelID'],array(1,3,4,5,6))){
                echo <<<EOT
				<div class="card-body d-flex align-items-end pt-0">
				<a href='?page=Leave-Approval' class="btn btn-sm btn-light-danger fw-bold">Moderate Leave Requests</a>
				</div>
				EOT;       
            }
?>


	<!--begin::Card body-->
	<div class="card-body d-flex align-items-end pt-2">
			<!--begin::Progress-->
		<div class="d-flex align-items-center flex-column mt-6 w-100">
			<div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
				<span><?php echo $totalCount;?> Total Leave Requests</span>
				<span><?php echo $percentage;?>% Complete</span>
			</div>
			<div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
				<div class="bg-white rounded h-8px" role="progressbar" style="width: <?php echo $percentage;?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<!--end::Progress-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card widget 20-->

