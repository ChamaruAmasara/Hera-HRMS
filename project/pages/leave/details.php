<?php 
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	$leaveDetails=new Leavedetails();
	$userDetails = $_SESSION['User'];
	$empID=$userDetails->getUserDetailArray()['EmployeeID'];
	$userDetailsArray = $userDetails->getUserDetailArray();
	$leaveCounts=$leaveDetails->getUserLeaveCounts("EmployeeID=$empID");
	$userPayGrade= $userDetailsArray['PayGrade'];

	$LeaveTypesandCounts=['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];
	$ApprovedLeaveTypesandCounts=['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];

	// getting leave counts of each leaves that the user has taken
	while ($leaveCountsArray = $leaveCounts->fetch_assoc()) {
		$LeaveTypesandCounts[$leaveCountsArray['LeaveType']]=$leaveCountsArray['LeaveCount'];	
	}


	// getting the counts of leaves that the user is allowed to take
	$sql = "SELECT * FROM paygrade WHERE PayGradeName='$userPayGrade'";
    $res = $mysqli->query($sql);
	$payGradeRow = $res->fetch_assoc();
	$ApprovedLeaveTypesandCounts['Annual']=$payGradeRow['ApprovedAnnualLeaveCount'];
	$ApprovedLeaveTypesandCounts['Casual']=$payGradeRow['ApprovedCasualLeaveCount'];
	$ApprovedLeaveTypesandCounts['Maternity']=$payGradeRow['ApprovedMaternityLeaveCount'];
	$ApprovedLeaveTypesandCounts['No-Pay']=$payGradeRow['ApprovedPayLeaveCount'];


	
?>



<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

		<!--begin::Form-->
		<form class="form">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card header-->
				<div class="card-header">
					<!--begin::Card header-->
					<div class="card-title fs-3 fw-bold">Project Budget</div>
					<!--end::Card header-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body">


					<!--begin::Row-->
					<div class="row mb-8">
						
						<div class="col-xl-9">
							<!--begin::Progress-->
							<div class="d-flex flex-column">
								<div class="d-flex justify-content-between w-100 fs-4 fw-bold mb-3">
									<span>Annual Leaves</span>
									<span><?php echo $LeaveTypesandCounts['Annual']; ?> of <?php echo $ApprovedLeaveTypesandCounts['Annual']; ?> Used</span>
								</div>

								<?php 
									$annualLeavePercentage=($LeaveTypesandCounts['Annual']/$ApprovedLeaveTypesandCounts['Annual'])*100;
									$remainLeaves=$ApprovedLeaveTypesandCounts['Annual']-$LeaveTypesandCounts['Annual'];
								?>

								<div class="h-10px bg-light rounded mb-3">
									<div class="bg-success rounded h-8px" role="progressbar" style=<?php echo '"width:'.$annualLeavePercentage.'%;"' ?> aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="fw-semibold text-gray-600"><?php echo $remainLeaves ?> Leaves are remaining</div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->

					<!--begin::Row-->
					<div class="row mb-8">
						
						<div class="col-xl-9">
							<!--begin::Progress-->
							<div class="d-flex flex-column">
								<div class="d-flex justify-content-between w-100 fs-4 fw-bold mb-3">
									<span>Casual Leaves</span>
									<span><?php echo $LeaveTypesandCounts['Casual']; ?> of <?php echo $ApprovedLeaveTypesandCounts['Casual']; ?> Used</span>
								</div>

								<?php 
									$CasualLeavePercentage=($LeaveTypesandCounts['Casual']/$ApprovedLeaveTypesandCounts['Casual'])*100;
									$remainLeaves=$ApprovedLeaveTypesandCounts['Casual']-$LeaveTypesandCounts['Casual'];
								?>

								<div class="h-10px bg-light rounded mb-3">
									<div class="bg-success rounded h-8px" role="progressbar" style=<?php echo '"width:'.$CasualLeavePercentage.'%;"' ?> aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="fw-semibold text-gray-600"><?php echo $remainLeaves ?> Leaves are remaining</div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->

					<!--begin::Row-->
					<div class="row mb-8">
						
						<div class="col-xl-9">
							<!--begin::Progress-->
							<div class="d-flex flex-column">
								<div class="d-flex justify-content-between w-100 fs-4 fw-bold mb-3">
									<span>Maternity Leaves</span>
									<span><?php echo $LeaveTypesandCounts['Maternity']; ?> of <?php echo $ApprovedLeaveTypesandCounts['Maternity']; ?> Used</span>
								</div>

								<?php 
									$MaternityLeavePercentage=($LeaveTypesandCounts['Maternity']/$ApprovedLeaveTypesandCounts['Maternity'])*100;
									$remainLeaves=$ApprovedLeaveTypesandCounts['Maternity']-$LeaveTypesandCounts['Maternity'];
								?>

								<div class="h-10px bg-light rounded mb-3">
									<div class="bg-success rounded h-8px" role="progressbar" style=<?php echo '"width:'.$MaternityLeavePercentage.'%;"' ?> aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="fw-semibold text-gray-600"><?php echo $remainLeaves ?> Leaves are remaining</div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->

					<!--begin::Row-->
					<div class="row mb-8">
						
						<div class="col-xl-9">
							<!--begin::Progress-->
							<div class="d-flex flex-column">
								<div class="d-flex justify-content-between w-100 fs-4 fw-bold mb-3">
									<span>No-Pay Leaves</span>
									<span><?php echo $LeaveTypesandCounts['No-Pay']; ?> of <?php echo $ApprovedLeaveTypesandCounts['No-Pay']; ?> Used</span>
								</div>

								<?php 
									$NoPayLeavePercentage=($LeaveTypesandCounts['No-Pay']/$ApprovedLeaveTypesandCounts['No-Pay'])*100;
									$remainLeaves=$ApprovedLeaveTypesandCounts['No-Pay']-$LeaveTypesandCounts['No-Pay'];
								?>

								<div class="h-10px bg-light rounded mb-3">
									<div class="bg-success rounded h-8px" role="progressbar" style=<?php echo '"width:'.$NoPayLeavePercentage.'%;"' ?> aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="fw-semibold text-gray-600"><?php echo $remainLeaves ?> Leaves are remaining</div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->											
				</div>
			</div>
		</div>
	</div>	
</div>


<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">

		<!-- Row tabs Begins here -->
		<!--begin::Tab pane-->
		<div id="kt_project_users_table_pane" class="tab-pane fade show active">
			<!--begin::Card-->
			<div class="card card-flush">
				<!--begin::Card body-->
				<div class="card-body pt-0">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
							<!--begin::Head-->
							<thead class="fs-7 text-gray-400 text-uppercase">
								<tr>
										<th class="min-w-250px">Employee</th>
										<th class="min-w-150px">Absent From</th>
										<th class="min-w-90px">Absent till</th>
										<th class="min-w-90px">Date count</th>
										<th class="min-w-90px">Leave Type</th>		
										<th class="min-w-90px">State</th>

								</tr>
							</thead>
							<!--end::Head-->
							<!--begin::Body-->
							<tbody class="fs-7">
								<?php
							
								$where = "EmployeeID=$empID";
								$empDetails = new Leavedetails();
								$allLeaves = $empDetails->getLeaveDetails($where);


								while ($row = $allLeaves->fetch_assoc()) {
									?>
									<tr>
										<td>
											<!--begin::User-->
											<div class="d-flex align-items-center">
												<!--begin::Wrapper-->
												<div class="me-5 position-relative">
													<!--begin::Avatar-->
													<div class="symbol symbol-35px symbol-circle">
														<img alt="Pic" src=<?php 
														if ($row['ProfilePhoto']!=null) {
															echo $row['ProfilePhoto']; 
														}else{
															echo "'assets\media\avatars\defult.jpg'";
														}
														
														?> />
													</div>
													<!--end::Avatar-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Info-->
												<div class="d-flex flex-column justify-content-center">
													<a href="?page=Employee-Details&SubPage=Employee-Info&ID=<?php echo $row['EmployeeID']; ?>" class="mb-1 text-gray-800 text-hover-primary"><?php echo $row['Name'] ?></a>
													<div class="fw-semibold fs-6 text-gray-400"><?php echo $row['Email'] ?></div>
												</div>
												<!--end::Info-->
											</div>
											<!--end::User-->
										</td>
										<td><?php echo $row['FirstAbsentDate'] ?></td>
										<td><?php echo $row['LastAbsentDate'] ?></td>
										<td><?php echo $row['LeaveDayCount'] ?></td>
										<td><?php echo $row['LeaveType'] ?></td>
										<?php
										if ($row['Approved'] == 'Approved') {
											$color = "success";
										}elseif ($row['Approved'] == 'Pending') {
											$color = "warning";
										}elseif ($row['Approved'] == 'Rejected') {
											$color = "danger";
										}
										?>
										<td><div class=<?php echo '"btn btn-'.$color.' btn-sm"' ?>><?php echo $row['Approved'] ?></div></td>
								
									</tr>
									<?php
								}
								?>
						
								</tbody>
							<!--end::Body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Tab pane-->
		<!-- Row tabs Ends here -->




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
		<script src="assets/js/custom/apps/projects/users/users.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->