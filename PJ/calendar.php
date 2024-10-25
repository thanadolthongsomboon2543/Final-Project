<?php
session_start();
include ("connect.php");
 
 if(empty($_SESSION["id_user"]))
 {
     Header("Location: login.php");
 }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/calendardecor.css">
	<link rel="stylesheet" href="CSS/sidemenu.css">
	<title>ปฏิทิน</title>
</head>
<body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        

&emsp;&emsp;
            ผู้ใช้งาน &emsp;
            <?php echo $_SESSION["prefix_em"]; ?>&emsp;
            <label for="fname sname"></label>
            <?php echo $_SESSION["firstname_em"] . ' ' . $_SESSION["lastname_em"]; ?>
            &emsp;
            <label for="emid">รหัสประจำตัว : </label>
            <?php echo $_SESSION["id_em"]; ?>
            </p>
</body>
<body>
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="hide()">×</a>

<?php
if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
                {
echo "<a href=\"menu_hr.php\">หน้าหลัก</a>";
                }
  else if($_SESSION["prior_em"]=="employee")
  {
      echo "<a href=\"menu.php\">หน้าหลัก</a>";
  }
?>
<?php
if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
                {
                    echo "<a href=\"approve_leave.php\">อนุมัติการลา</a>";
                    echo "<a href=\"approve_ot.php\">อนุมัติ OT</a>";
                    echo "<a href=\"checkin_history.php\">ประวัติเข้าออก</a>";
                    echo"<a href=\"historyleave_hr.php\">ประวัติการลาทั้งหมด </a>";
                    echo"<a href=\"historyot_hr.php\">ประวัติ OT ทั้งหมด </a>";
                }
 if($_SESSION["prior_em"]=="HR")
 {
                    echo "<a href=\"HR-tax.php\">คำนวณภาษี</a>";
                    echo "<a href=\"HR-salary.php\">คำนวณเงินเดือน</a>";
                }
?>
<a href="profile.php">ประวัติส่วนตัว</a>

<a href="calendar.php">ปฏิทิน</a>
<?php
if ($_SESSION["prior_em"]=="employee" || $_SESSION["prior_em"]=="HR")
  {
      echo  "<a href=\"leaveform.php\">แจ้งลา</a>";
      echo " <a href=\"otform.php\">แจ้งโอที</a>";
     echo " <a href=\"historyleave.php\">ประวัติการลา</a>";
      echo "<a href=\"historyot.php\">ประวัติ OT</a>";
  }
  ?>
<a href="resetpass.php">เปลี่ยนรหัสผ่าน</a>
<a href="logout.php">ออกจากระบบ</a>
</div>
<br>
 <button class="openbtn" id="openbtn" onclick="show()">☰</button>
<br><br>

	<?php 
	$currentData = date('Y-m-d');
	?>

	<!-- Calendar Container -->
	<div id='calendar-container'>
    	<div id='calendar'></div>
  	</div>

  	<!-- jQuery -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  	<!-- Fullcalendar  -->
	<script type="text/javascript" src="fullcalendar/dist/index.global.min.js"></script>

	<!-- Sweetalert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
	    var calendarEl = document.getElementById('calendar');

	    var calendar = new FullCalendar.Calendar(calendarEl, {
	      	initialDate: '<?= $currentData ?>',
	      	height: '600px',
	      	selectable: true,
	      	editable: true,
	      	dayMaxEvents: true, // allow "more" link when too many events
	      	events: 'fetchevents.php', // Fetch all events
	      	select: function(arg) { // Create Event
	        	
	        	// Alert box to add event
		        Swal.fire({
				  	title: 'Add New Event',
					showCancelButton: true,
					confirmButtonText: 'Create',
				  	html:
				    '<input id="eventtitle" class="swal2-input" placeholder="Event name" style="width: 84%;"  >' +
				    '<textarea id="eventdescription" class="swal2-input" placeholder="Event description" style="width: 84%; height: 100px;"></textarea>',
				  	focusConfirm: false,
				  	preConfirm: () => {
					    return [
					      	document.getElementById('eventtitle').value,
					      	document.getElementById('eventdescription').value
					    ]
				  	}
				}).then((result) => {
				  
				  	if (result.isConfirmed) {
				    	
				    	var title = result.value[0].trim();
				    	var description = result.value[1].trim();
				    	var start_date = arg.startStr;
				    	var end_date = arg.endStr;

				    	if(title != '' && description != ''){

				    		// AJAX - Add event
				    		$.ajax({
						  		url: 'ajaxfile.php',
						  		type: 'post',
						  		data: {request: 'addEvent',title: title,description: description,start_date: start_date,end_date: end_date},
						  		dataType: 'json',
						  		success: function(response){

						  			if(response.status == 1){

						  				// Add event
						  				calendar.addEvent({
								            eventid: response.eventid,
								            title: title,
								            description: description,
								            start: arg.start,
								            end: arg.end,
								            allDay: arg.allDay
							          	}) 

							          	// Alert message
						  				Swal.fire(response.message,'','success');

						  			}else{
						  				// Alert message
						  				Swal.fire(response.message,'','error');
						  			}
						  			
						  		}
						  	});
				    	}
				    	
				  	}
				})

	        	calendar.unselect()
	      	},
	      	eventDrop: function (event, delta) { // Move event

	      		// Event details
	      		var eventid = event.event.extendedProps.eventid;
	      		var newStart_date = event.event.startStr;
	      		var newEnd_date = event.event.endStr;
	           	
	           	// AJAX request
	           	$.ajax({
					url: 'ajaxfile.php',
					type: 'post',
					data: {request: 'moveEvent',eventid: eventid,start_date: newStart_date, end_date: newEnd_date},
					dataType: 'json',
					async: false,
					success: function(response){

						console.log(response);
									
					}
				}); 

	        },
	      	eventClick: function(arg) { // Edit/Delete event
	      		
	      		// Event details
	      		var eventid = arg.event._def.extendedProps.eventid;
	      		var description = arg.event._def.extendedProps.description;
	      		var title = arg.event._def.title;

	      		// Alert box to edit and delete event
	      		Swal.fire({
				  	title: 'Edit Event',
				  	showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: 'Update',
					denyButtonText: 'Delete',
				  	html:
				    '<input id="eventtitle" class="swal2-input" placeholder="Event name" style="width: 84%;" value="'+ title +'" >' +
				    '<textarea id="eventdescription" class="swal2-input" placeholder="Event description" style="width: 84%; height: 100px;">' + description + '</textarea>',
				  	focusConfirm: false,
				  	preConfirm: () => {
					    return [
					      	document.getElementById('eventtitle').value,
					      	document.getElementById('eventdescription').value
					    ]
				  	}
				}).then((result) => {
				  
				  	if (result.isConfirmed) { // Update
				    	
				    	var newTitle = result.value[0].trim();
				    	var newDescription = result.value[1].trim();

				    	if(newTitle != '' && newDescription != ''){

				    		// AJAX - Edit event
				    		$.ajax({
								url: 'ajaxfile.php',
								type: 'post',
								data: {request: 'editEvent',eventid: eventid,title: newTitle, description: newDescription},
								dataType: 'json',
								async: false,
								success: function(response){

									if(response.status == 1){
										
										// Refetch all events
										calendar.refetchEvents();

										// Alert message
										Swal.fire(response.message, '', 'success');
									}else{

										// Alert message
										Swal.fire(response.message, '', 'error');
									}
										
								}
							}); 
				    	}
				    	
				  	} else if (result.isDenied) { // Delete

				  		// AJAX - Delete Event
				    	$.ajax({
							url: 'ajaxfile.php',
							type: 'post',
							data: {request: 'deleteEvent',eventid: eventid},
							dataType: 'json',
							async: false,
							success: function(response){

								if(response.status == 1){

									// Remove event from Calendar
									arg.event.remove();

									// Alert message
									Swal.fire(response.message, '', 'success');
								}else{

									// Alert message
									Swal.fire(response.message, '', 'error');
								}
									
							}
						}); 
				  	}
				})
	      		
	      	}
	    });

	    calendar.render();
	});

	</script>

<script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }
</script>


</body>
</html>