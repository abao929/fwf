<?php
	ini_set("memory_limit","128M");
	require "header.php";
?>

	<main>
		<?php
			if (isset($_SESSION['userUid'])) {
				$_SESSION['initials'] = substr($_SESSION['userEmail'],0,2);
				$data = array();
				$openCsv = fopen('noS2ScheduleData.csv', 'r');
				while ($line = fgetcsv($openCsv, '1000', ',')) {
					array_push($data, $line);
				}
				fclose($openCsv);
				$keys = (array_keys(array_column($data, '22'), $_SESSION['userUid']));
				$schedule = array(array(array()));
				for ($i = 0; $i<count($keys); $i++){
					$addThis = [$data[$keys[$i]][6],$data[$keys[$i]][10],$data[$keys[$i]][16]];
					if ($addThis[0] == 'Free') {
						$addThis[1] = $addThis[0];
						$addThis[0] = '';
					}
					if ($addThis[0] == 'AP Physics - 1') {
						$addThis[1] = 'Baker 100';
					}
					$col = 0;
					$row = 0;
					if($data[$keys[$i]][7] == 'Monday') {
						$col = 0;
					}
					if($data[$keys[$i]][7] == 'Tuesday') {
						$col = 1;
					}
					if($data[$keys[$i]][7] == 'Wednesday') {
						$col = 2;
					}
					if($data[$keys[$i]][7] == 'Thursday') {
						$col = 3;
					}
					if($data[$keys[$i]][7] == 'Friday') {
						$col = 4;
					}
					#print_r($data[$keys[$i]][7]);
					#print_r($data[$keys[$i]][12]);
					if($data[$keys[$i]][12] !== '4L, 5' AND $data[$keys[$i]][12] !== '4, 5L' AND $data[$keys[$i]][12] !== '7, 8') {
						$row = $data[$keys[$i]][12];
					}
					if($data[$keys[$i]][12] == '7, 8') {
						$schedule[7][$col] = $addThis;
						$schedule[8][$col] = $addThis;
					}
					if($data[$keys[$i]][12] == '4, 5L') {
						$row = 4;
					}
					if($data[$keys[$i]][12] == '4L, 5') {
						$row = 5;
					}
					$schedule[$row][$col] = $addThis;
				}
				echo ('
					<button id="myBtn" class="hvr-glow">'.$_SESSION['initials'].'</button>
					<button id="friendBtn"class="hvr-glow" onclick="window.location.href=\'friends.php\'"><i class="fas fa-users"></i>&nbsp&nbsp&nbspFriends</button>
					<div id="myModal0" class="modal">
						<div class="modal-content">
							<div class="modal-header">
								<h1>Goodbye my child</h1>
							</div>
							<div class="modal-body">
								<div class="initials">'.$_SESSION['initials'].'</div>
								<div class="info-box">
									<div class="name-line">'.$_SESSION['userUid'].'</div>
									<div class="email-line">'.$_SESSION['userEmail'].'</div>
								</div>
							</div>
							<div class="modal-divider"></div>
							<div class="modal-footer">
								<form action="includes/logout.inc.php" method="post">
									<button type="submit" name="logout-submit" class="logout-button hvr-icon-wobble-horizontal">Logout &nbsp;<i class="fas fa-sign-out-alt hvr-icon"></i></button>
								</form>
							</div>
						</div>
					</div>
						<script>
						var modal0 = document.getElementById("myModal0");
						var btn = document.getElementById("myBtn");
						btn.onclick = function() {
						  modal0.style.display = "block";
						}
						var modal1 = document.getElementById("myModal1");
						var span1 = document.getElementsByClassName("close1")[0];
						function onClick1() {
						  modal1.style.display = "block";
						}
						span1.onclick = function() {
						  modal1.style.display = "none";
						}
						window.onclick = function(event) {
						  if (event.target == modal0) {
						    modal0.style.display = "none";
						  }
						  if (event.target == modal1) {
						    modal1.style.display = "none";
						  }
						  if (event.target == modal2) {
						    modal2.style.display = "none";
						  }
						  if (event.target == modal3) {
						    modal3.style.display = "none";
						  }
						  if (event.target == modal4) {
						    modal4.style.display = "none";
						  }
						  if (event.target == modal5) {
						    modal5.style.display = "none";
						  }
						  if (event.target == modal6) {
						    modal6.style.display = "none";
						  }
						  if (event.target == modal7) {
						    modal7.style.display = "none";
						  }
						  if (event.target == modal8) {
						    modal8.style.display = "none";
						  }
						  if (event.target == modal9) {
						    modal9.style.display = "none";
						  }
						  if (event.target == modal10) {
						    modal10.style.display = "none";
						  }
						  if (event.target == modal11) {
						    modal11.style.display = "none";
						  }
						  if (event.target == modal12) {
						    modal12.style.display = "none";
						  }
						  if (event.target == modal13) {
						    modal13.style.display = "none";
						  }
						  if (event.target == modal14) {
						    modal14.style.display = "none";
						  }
						  if (event.target == modal15) {
						    modal15.style.display = "none";
						  }
						  if (event.target == modal16) {
						    modal16.style.display = "none";
						  }
						  if (event.target == modal17) {
						    modal17.style.display = "none";
						  }
						  if (event.target == modal18) {
						    modal18.style.display = "none";
						  }
						  if (event.target == modal19) {
						    modal19.style.display = "none";
						  }
						  if (event.target == modal20) {
						    modal20.style.display = "none";
						  }
						  if (event.target == modal21) {
						    modal21.style.display = "none";
						  }
						  if (event.target == modal22) {
						    modal22.style.display = "none";
						  }
						  if (event.target == modal23) {
						    modal23.style.display = "none";
						  }
						  if (event.target == modal24) {
						    modal24.style.display = "none";
						  }
						  if (event.target == modal25) {
						    modal25.style.display = "none";
						  }
						  if (event.target == modal26) {
						    modal26.style.display = "none";
						  }
						  if (event.target == modal27) {
						    modal27.style.display = "none";
						  }
						  if (event.target == modal28) {
						    modal28.style.display = "none";
						  }
						  if (event.target == modal29) {
						    modal29.style.display = "none";
						  }
						  if (event.target == modal30) {
						    modal30.style.display = "none";
						  }
						  if (event.target == modal31) {
						    modal31.style.display = "none";
						  }
						  if (event.target == modal32) {
						    modal32.style.display = "none";
						  }
						  if (event.target == modal33) {
						    modal33.style.display = "none";
						  }
						  if (event.target == modal34) {
						    modal34.style.display = "none";
						  }
						  if (event.target == modal35) {
						    modal35.style.display = "none";
						  }
						}

						var modal2 = document.getElementById("myModal2");
						var span2 = document.getElementsByClassName("close2")[0];
						function onClick2() {
						  modal2.style.display = "block";
						}
						span2.onclick = function() {
						  modal2.style.display = "none";
						}

						var modal3 = document.getElementById("myModal3");
						var span3 = document.getElementsByClassName("close3")[0];
						function onClick3() {
						  modal3.style.display = "block";
						}
						span3.onclick = function() {
						  modal3.style.display = "none";
						}

						var modal4 = document.getElementById("myModal4");
						var span4 = document.getElementsByClassName("close4")[0];
						function onClick4() {
						  modal4.style.display = "block";
						}
						span4.onclick = function() {
						  modal4.style.display = "none";
						}

						var modal5 = document.getElementById("myModal5");
						var span5 = document.getElementsByClassName("close5")[0];
						function onClick5() {
						  modal5.style.display = "block";
						}
						span5.onclick = function() {
						  modal5.style.display = "none";
						}

						var modal6 = document.getElementById("myModal6");
						var span6 = document.getElementsByClassName("close6")[0];
						function onClick6() {
						  modal6.style.display = "block";
						}
						span6.onclick = function() {
						  modal6.style.display = "none";
						}

						var modal7 = document.getElementById("myModal7");
						var span7 = document.getElementsByClassName("close7")[0];
						function onClick7() {
						  modal7.style.display = "block";
						}
						span7.onclick = function() {
						  modal7.style.display = "none";
						}

						var modal8 = document.getElementById("myModal8");
						var span8 = document.getElementsByClassName("close8")[0];
						function onClick8() {
						  modal8.style.display = "block";
						}
						span8.onclick = function() {
						  modal8.style.display = "none";
						}

						var modal9 = document.getElementById("myModal9");
						var span9 = document.getElementsByClassName("close9")[0];
						function onClick9() {
						  modal9.style.display = "block";
						}
						span9.onclick = function() {
						  modal9.style.display = "none";
						}
						var modal10 = document.getElementById("myModal10");
						var span10 = document.getElementsByClassName("close10")[0];
						function onClick10() {
						  modal10.style.display = "block";
						}
						span10.onclick = function() {
						  modal10.style.display = "none";
						}

						var modal11 = document.getElementById("myModal11");
						var span11 = document.getElementsByClassName("close11")[0];
						function onClick11() {
						  modal11.style.display = "block";
						}
						span11.onclick = function() {
						  modal11.style.display = "none";
						}

						var modal12 = document.getElementById("myModal12");
						var span12 = document.getElementsByClassName("close12")[0];
						function onClick12() {
						  modal12.style.display = "block";
						}
						span12.onclick = function() {
						  modal12.style.display = "none";
						}

						var modal13 = document.getElementById("myModal13");
						var span13 = document.getElementsByClassName("close13")[0];
						function onClick13() {
						  modal13.style.display = "block";
						}
						span13.onclick = function() {
						  modal13.style.display = "none";
						}

						var modal14 = document.getElementById("myModal14");
						var span14 = document.getElementsByClassName("close14")[0];
						function onClick14() {
						  modal14.style.display = "block";
						}
						span14.onclick = function() {
						  modal14.style.display = "none";
						}

						var modal15 = document.getElementById("myModal15");
						var span15 = document.getElementsByClassName("close15")[0];
						function onClick15() {
						  modal15.style.display = "block";
						}
						span15.onclick = function() {
						  modal15.style.display = "none";
						}

						var modal16 = document.getElementById("myModal16");
						var span16 = document.getElementsByClassName("close16")[0];
						function onClick16() {
						  modal16.style.display = "block";
						}
						span16.onclick = function() {
						  modal16.style.display = "none";
						}

						var modal17 = document.getElementById("myModal17");
						var span17 = document.getElementsByClassName("close17")[0];
						function onClick17() {
						  modal17.style.display = "block";
						}
						span17.onclick = function() {
						  modal17.style.display = "none";
						}

						var modal18 = document.getElementById("myModal18");
						var span18 = document.getElementsByClassName("close18")[0];
						function onClick188() {
						  modal18.style.display = "block";
						}
						span18.onclick = function() {
						  modal18.style.display = "none";
						}

						var modal19 = document.getElementById("myModal19");
						var span19 = document.getElementsByClassName("close19")[0];
						function onClick19() {
						  modal19.style.display = "block";
						}
						span19.onclick = function() {
						  modal19.style.display = "none";
						}

						var modal20 = document.getElementById("myModal20");
						var span20 = document.getElementsByClassName("close20")[0];
						function onClick20() {
						  modal20.style.display = "block";
						}
						span20.onclick = function() {
						  modal20.style.display = "none";
						}

						var modal21 = document.getElementById("myModal21");
						var span21 = document.getElementsByClassName("close21")[0];
						function onClick21() {
						  modal21.style.display = "block";
						}
						span21.onclick = function() {
						  modal21.style.display = "none";
						}

						var modal22 = document.getElementById("myModal22");
						var span22 = document.getElementsByClassName("close22")[0];
						function onClick22() {
						  modal22.style.display = "block";
						}
						span22.onclick = function() {
						  modal22.style.display = "none";
						}

						var modal23 = document.getElementById("myModal23");
						var span23 = document.getElementsByClassName("close23")[0];
						function onClick23() {
						  modal23.style.display = "block";
						}
						span23.onclick = function() {
						  modal23.style.display = "none";
						}

						var modal24 = document.getElementById("myModal24");
						var span24 = document.getElementsByClassName("close24")[0];
						function onClick24() {
						  modal24.style.display = "block";
						}
						span24.onclick = function() {
						  modal24.style.display = "none";
						}

						var modal25 = document.getElementById("myModal25");
						var span25 = document.getElementsByClassName("close25")[0];
						function onClick25() {
						  modal25.style.display = "block";
						}
						span25.onclick = function() {
						  modal25.style.display = "none";
						}

						var modal26 = document.getElementById("myModal26");
						var span26 = document.getElementsByClassName("close26")[0];
						function onClick26() {
						  modal26.style.display = "block";
						}
						span26.onclick = function() {
						  modal26.style.display = "none";
						}

						var modal27 = document.getElementById("myModal27");
						var span27 = document.getElementsByClassName("close27")[0];
						function onClick27() {
						  modal27.style.display = "block";
						}
						span27.onclick = function() {
						  modal27.style.display = "none";
						}

						var modal28 = document.getElementById("myModal28");
						var span28 = document.getElementsByClassName("close28")[0];
						function onClick28() {
						  modal28.style.display = "block";
						}
						span28.onclick = function() {
						  modal28.style.display = "none";
						}

						var modal29 = document.getElementById("myModal29");
						var span29 = document.getElementsByClassName("close29")[0];
						function onClick29() {
						  modal29.style.display = "block";
						}
						span29.onclick = function() {
						  modal29.style.display = "none";
						}

						var modal30 = document.getElementById("myModal30");
						var span30 = document.getElementsByClassName("close30")[0];
						function onClick30() {
						  modal30.style.display = "block";
						}
						span30.onclick = function() {
						  modal30.style.display = "none";
						}

						var modal31 = document.getElementById("myModal31");
						var span31 = document.getElementsByClassName("close31")[0];
						function onClick31() {
						  modal31.style.display = "block";
						}
						span31.onclick = function() {
						  modal31.style.display = "none";
						}

						var modal32 = document.getElementById("myModal32");
						var span32 = document.getElementsByClassName("close32")[0];
						function onClick32() {
						  modal32.style.display = "block";
						}
						span32.onclick = function() {
						  modal32.style.display = "none";
						}

						var modal33 = document.getElementById("myModal33");
						var span33 = document.getElementsByClassName("close33")[0];
						function onClick33() {
						  modal33.style.display = "block";
						}
						span33.onclick = function() {
						  modal33.style.display = "none";
						}

						var modal34 = document.getElementById("myModal34");
						var span34 = document.getElementsByClassName("close34")[0];
						function onClick34() {
						  modal34.style.display = "block";
						}
						span34.onclick = function() {
						  modal34.style.display = "none";
						}

						var modal35 = document.getElementById("myModal35");
						var span35 = document.getElementsByClassName("close35")[0];
						function onClick35() {
						  modal35.style.display = "block";
						}
						span35.onclick = function() {
						  modal35.style.display = "none";
						}

					</script>
					<div class="table-wrap">
						<table class="schedule-table" style="width:100%">
							<thead>
							<tr>
								<th>Monday</th>
								<th>Tuesday</th>
								<th>Wednesday</th>
								<th>Thursday</th>
								<th>Friday</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br>
								<span style="float:left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:25</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[1][0][0].'<br>'.$schedule[1][0][1].'<br>'.$schedule[1][0][2].'<br><span style="float: left;">9:15</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[1][1][0].'<br>'.$schedule[1][1][1].'<br>'.$schedule[1][1][2].'<br><span style="float: left;">9:15</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:25</span><br><br>X-Block<br><br><span style="float: left;">8:55</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[1][3][0].'<br>'.$schedule[1][3][1].'<br>'.$schedule[1][3][2].'<br><span style="float: left;">9:15</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[1][4][0].'<br>'.$schedule[1][4][1].'<br>'.$schedule[1][4][2].'<br><span style="float: left;">9:15</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[2][0][0].'<br>'.$schedule[2][0][1].'<br>'.$schedule[2][0][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[2][1][0].'<br>'.$schedule[2][1][1].'<br>'.$schedule[2][1][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">9:00</span><br>'.$schedule[2][2][0].'<br>'.$schedule[2][2][1].'<br>'.$schedule[2][2][2].'<br><span style="float: left;">9:50</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[2][3][0].'<br>'.$schedule[2][3][1].'<br>'.$schedule[2][3][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[2][4][0].'<br>'.$schedule[2][4][1].'<br>'.$schedule[2][4][2].'<br><span style="float: left;">10:10</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[3][0][0].'<br>'.$schedule[3][0][1].'<br>'.$schedule[3][0][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[3][1][0].'<br>'.$schedule[3][1][1].'<br>'.$schedule[3][1][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float:left;">9:55</span><br>'.$schedule[3][2][0].'<br>'.$schedule[3][2][1].'<br>'.$schedule[3][2][2].'<br><span style="float: left;">10:45</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[3][3][0].'<br>'.$schedule[3][3][1].'<br>'.$schedule[3][3][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[3][4][0].'<br>'.$schedule[3][4][1].'<br>'.$schedule[3][4][2].'<br><span style="float: left;">11:00</span></td>
							</tr>
							
							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[4][0][0].'<br>'.$schedule[4][0][1].'<br>'.$schedule[4][0][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[4][1][0].'<br>'.$schedule[4][1][1].'<br>'.$schedule[4][1][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">10:45</span><br>'.$schedule[4][2][0].'<br>'.$schedule[4][2][1].'<br>'.$schedule[4][2][2].'<br><span style="float: left;">11:15</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[4][3][0].'<br>'.$schedule[4][3][1].'<br>'.$schedule[4][3][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[4][4][0].'<br>'.$schedule[4][4][1].'<br>'.$schedule[4][4][2].'<br><span style="float: left;">11:55</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[5][0][0].'<br>'.$schedule[5][0][1].'<br>'.$schedule[5][0][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[5][1][0].'<br>'.$schedule[5][1][1].'<br>'.$schedule[5][1][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">11:20</span><br>'.$schedule[5][2][0].'<br>'.$schedule[5][2][1].'<br>'.$schedule[5][2][2].'<br><span style="float: left;">12:05</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[5][3][0].'<br>'.$schedule[5][3][1].'<br>'.$schedule[5][3][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[5][4][0].'<br>'.$schedule[5][4][1].'<br>'.$schedule[5][4][2].'<br><span style="float: left;">12:50</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[6][0][0].'<br>'.$schedule[6][0][1].'<br>'.$schedule[6][0][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[6][1][0].'<br>'.$schedule[6][1][1].'<br>'.$schedule[6][1][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:10</span><br>'.$schedule[6][2][0].'<br>'.$schedule[6][2][1].'<br>'.$schedule[6][2][2].'<br><span style="float: left;">12:55</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[6][3][0].'<br>'.$schedule[6][3][1].'<br>'.$schedule[6][3][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[6][4][0].'<br>'.$schedule[6][4][1].'<br>'.$schedule[6][4][2].'<br><span style="float: left;">1:45</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[7][0][0].'<br>'.$schedule[7][0][1].'<br>'.$schedule[7][0][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[7][1][0].'<br>'.$schedule[7][1][1].'<br>'.$schedule[7][1][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:00</span><br>'.$schedule[7][2][0].'<br>'.$schedule[7][2][1].'<br>'.$schedule[7][2][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[7][3][0].'<br>'.$schedule[7][3][1].'<br>'.$schedule[7][3][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[7][4][0].'<br>'.$schedule[7][4][1].'<br>'.$schedule[7][4][2].'<br><span style="float: left;">2:35</span></td>
							</tr>');
							if (array_keys(array_column($schedule, '1'), '8') !== FALSE) {
								echo ('
								<tr>');
								if (isset($schedule[8][0][0])){
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">2:45</span><br>'.$schedule[8][0][0].'<br>'.$schedule[8][0][1].'<br>'.$schedule[8][0][2].'<br><span style="float: left;">3:10</span></td>');
								}
								else{
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">2:45</span><br><br><br><br><span style="float: left;">3:10</span></td>');
								}
								if (isset($schedule[8][1][0])){
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[8][1][0].'<br>'.$schedule[8][1][1].'<br>'.$schedule[8][1][2].'<br><span style="float: left;">3:10</span></td>');
								}
								else{
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br><br><br><br><span style="float: left;">3:10</span></td>');
								}
								echo('<td></td>');
								if (isset($schedule[8][3][0])){
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[8][3][0].'<br>'.$schedule[8][3][1].'<br>'.$schedule[8][3][2].'<br><span style="float: left;">3:10</span></td>');
								}
								else {
									echo('<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">2:45</span><br><br><br><br><span style="float: left;">3:10</span></td>');
								}
								echo('
									<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">2:40</span><br><br>X-Block<br><br><span style="float: left;">3:10</span></td></tr>');}
								echo('
							</tbody>
						</table>
					</div>');
			}
			else {
				echo '
					<div class="hide-clicks"><a id="clicksA">0</a><a id="clicksW">0</a></div>
					<h2>
			 			<div class="typewrite" data-period="2000" data-type=\'[ "I&#39;m tired of Veracross being so overcomplicated and functional.", "I wish I knew when my friends were eating lunch.", "I wish I had friends... ", "Look no further than Frees With Friends!" ]\'>
			    		<span class="wrap"></span>
			  			</div>
			  		</h2>
			  		<div class="login-box">
						<div class="login-header">Welcome to FWF!</div>
							<form action="includes/scuffed.login.php" method="post" class="login-form">
								<p id="login-text">USERNAME/EMAIL</p>
								<input type="text" name="mailuid" autofocus="autofocus" class="login-input">
								<p id="login-text">PASSWORD</p>
								<input type="password" name="pwd" class="login-input">
								<br>
								<button type="submit" name="login-submit" class="login-button hvr-glow">Login</button>
							</form>
							<button class="signup-button hvr-glow" onclick="window.location.href=\'signup.php\'">Signup</button>
							<div class="credit">By <div onCLick="onClickAlex()" style="display:inline;">Alex Bao</div> \'20 & <div onCLick="onClickWyatt()" style="display:inline;">Wyatt Ellison</div> \'20</div>
							<script type="text/javascript">
						    var clicksA = 0;
						    var clicksW = 0;
						    function onClickAlex() {
						        clicksA += 1;
						        document.getElementById("clicksA").innerHTML = clicksA;
							    if (clicksA==5) {
							        window.location.href = "oof-alex.html";
							    }
						    };
						    function onClickWyatt() {
						    	clicksW += 1;
						        document.getElementById("clicksW").innerHTML = clicksW;
							    if (clicksW==5) {
							        window.location.href = "oof-wyatt.html";
							    }
						    }
						    </script>
					</div>
					<script>
						var TxtType = function(el, toRotate, period) {
					        this.toRotate = toRotate;
					        this.el = el;
					        this.loopNum = 0;
					        this.period = parseInt(period, 10) || 2000;
					        this.txt = \'\';
					        this.tick();
					        this.isDeleting = false;
					    };

					    TxtType.prototype.tick = function() {
					        var i = this.loopNum % this.toRotate.length;
					        var fullTxt = this.toRotate[i];

					        if (this.isDeleting) {
					        this.txt = fullTxt.substring(0, this.txt.length - 1);
					        } else {
					        this.txt = fullTxt.substring(0, this.txt.length + 1);
					        }

					        this.el.innerHTML = \'<span class="wrap">\'+this.txt+\'</span>\';

					        var that = this;
					        var delta = 75;

					        if (this.isDeleting) { delta /= 2; }

					        if (!this.isDeleting && this.txt === fullTxt) {
					        delta = this.period;
					        this.isDeleting = true;
					        } else if (this.isDeleting && this.txt === \'\') {
					        this.isDeleting = false;
					        this.loopNum++;
					        delta = 500;
					        }

					        setTimeout(function() {
					        that.tick();
					        }, delta);
					    };

					    window.onload = function() {
					        var elements = document.getElementsByClassName(\'typewrite\');
					        for (var i=0; i<elements.length; i++) {
					            var toRotate = elements[i].getAttribute(\'data-type\');
					            var period = elements[i].getAttribute(\'data-period\');
					            if (toRotate) {
					              new TxtType(elements[i], JSON.parse(toRotate), period);
					            }
					        }
					        // INJECT CSS
					        var css = document.createElement("style");
					        css.type = "text/css";
					        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
					        document.body.appendChild(css);
					    };
					</script>';
			}
		?>
	</main>

<?php
	require "footer.php";
?>