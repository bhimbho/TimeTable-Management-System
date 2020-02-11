<?php
include "includes/header.php";
include "includes/sidebar.php";
$lecturer->check_lecturer();
?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

              <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Time Table</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Time Table</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <form method="post">
            	<div class="form-inline">
            		<select class="form-control" name="session">
            			<option>--Select Session--</option>
            			<?php
            			$list_session=$session->list_session();
            			foreach ($list_session as $list_session) {?>
            				<option value="<?php echo $list_session->session_id?>"><?php echo $list_session->session_year?></option>
            			<?php }?>
            		</select>
            		<select class="form-control" name="semester">
            			<option>--Select Semester--</option>
            			<?php
            			$list_semester=$session->list_semester();
            			foreach ($list_semester as $list_semester) {?>
            				<option value="<?php echo $list_semester->semester_id?>"><?php echo $list_semester->semester_title?></option>
            			<?php }?>
            		</select>
            		<select class="form-control" name="level">
            			<option>--Select Level--</option>
            			<?php
            			$list_level=$dept->list_level();
            			foreach ($list_level as $list_level) {?>
            				<option value="<?php echo $list_level->level_id?>"><?php echo $list_level->level?></option>
            			<?php }?>
            		</select>
            		<button class="btn btn-primary" name="submit">Generate Timetable</button>
            	</div>
            </form>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <div class="row">
                  	 		<div id="content" class="col-md-12">
                  	 			<center><h2>CLASS TIMETABLE FOR <?php if(isset($_POST['session']) && isset($_POST['session'])){
                  	 				echo $session->get_session($_POST['session'])->session_year .' SESSION '.$session->get_semester($_POST['semester'])->semester_title.' Semester';}?> </h2></center>
                  	 				<center><h2>Department of <?php if(isset($_SESSION['lecturer_dept']) && isset($_POST['level'])){
                  	 				echo $dept->get_dept($_SESSION['lecturer_dept'])->dept_title .' '.$dept->get_level($_POST['level'])->level.'Level';}?> </h2></center>
                  	 			<table class="table table-bordered content"></center>
                  	 				<tr>
										<th>DAYS</th>
										<th>8-9</th>
										<th>9-10</th>
										<th>10-11</th>
										<th>11-12</th>
										<th>12-1</th>
										<th>1-2</th>
										<th>2-3</th>
										<th>3-4</th>
										<th>4-5</th>
										<th>5-6</th>
										<th>6-7</th>
									</tr>
                  	 				<tbody>
									<?php
										if(isset($_POST['submit'])){
											$dept_id=$_SESSION['lecturer_dept'];
											$session_id=$_POST['session'];
											$semester_id=$_POST['semester'];
											$level_id=$_POST['level'];
											
										}
										// function sch(){
										// 	return $time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,1);
										// }
										if(isset($_SESSION['lecturer_dept'],$_POST['session'],$_POST['semester'],$_POST['level'])){
									?>
									<tr>
										<td>M</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,1); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
									<tr>
										<td>T</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,2); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
									<tr>
										<td>W</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,3); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
									<tr>
										<td>TH</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,4); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
									<tr>
										<td>F</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,5); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
									<tr>
										<td>S</td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,1,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,2,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,3,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<!-- <td colspan="2">PRACTICAL-352 <br> COM 413</td> -->
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,4,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,5,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
										<td colspan="2"><?php $mon=$time->get_schedule($dept_id,$session_id,$semester_id,$level_id,6,6); if(is_object($mon)){ echo $mon->room_title;}?><br> <?php if(is_object($mon)){ echo $mon->course_unit;}else{echo "Not Allocated";}?></td>
									</tr>
								<?php }?>
								</tbody>
							</table>
                        </div>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <button id="cmd" class="btn btn-success cmd">Download Time-Table</button>
    		</div>
		</div>
    </div>
</div> <!-- container -->
</div> <!-- content -->
<?php
include "includes/footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script>
$(function(){
	let doc = new jsPDF('p','pt','a4');
	$("#cmd").click(function(){
		doc.addHTML(document.getElementById('content'),function() {
    	doc.save('Time-Table.pdf');
		})
	});
  })
 </script>
<style type="text/css">
	.time-text{
		text-align: center;
		font-weight: bold;
	}

	table th{
		text-align: center;
	}
	table tr{
		text-align: center;
		font-weight: bold;
	}
	.content{
		background-color: white !important;
	}

</style>