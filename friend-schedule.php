<main>	
	<head>
		<meta charset="utf-8">
		<meta name =viewport content="width=device-width, initial-scale=1">
		<title></title>
		<link href="stylesheet.css?<?=filemtime("stylesheet.css")?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" integrity="sha384-wxqG4glGB3nlqX0bi23nmgwCSjWIW13BdLUEYC4VIMehfbcro/ATkyDsF/AbIOVe" crossorigin="anonymous">
		<script type="text/javascript" src="modal.js"></script>
	</head>
	<?php
		session_start();
		$friend = $_GET['friend'];
		$data = array_map('str_getcsv', file('good_data2.csv'));
		$key = (array_search($friend, array_column($data, 10)));
		echo ('
			<div class="banner">
				<a href="index.php" style="color:inherit; text-decoration: none;" class="hvr-grow">'.$friend.'\'s Schedule</a>
			</div>
			<button id="myBtn" class="hvr-glow">'.$_SESSION['initials'].'</button>
					<button id="friendBtn"class="hvr-glow" onclick="window.location.href=\'friends.php\'"><i class="fas fa-users"></i>&nbsp&nbsp&nbspFriends</button>
					<div id="myModal" class="modal">
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
						// Get the modal
						var modal = document.getElementById("myModal");

						// Get the button that opens the modal
						var btn = document.getElementById("myBtn");

						// Get the <span> element that closes the modal
						var span = document.getElementsByClassName("close")[0];

						// When the user clicks the button, open the modal 
						btn.onclick = function() {
						  modal.style.display = "block";
						}

						// When the user clicks on <span> (x), close the modal
						span.onclick = function() {
						  modal.style.display = "none";
						}

						// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
						  if (event.target == modal) {
						    modal.style.display = "none";
						  }
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
								<td style="cursor: default;"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td style="cursor: default;"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td style="cursor: default;"><span style="float: left;">8:00</span><br>Assembly<br>
								<span style="float:left;">8:20</span></td>
								<td style="cursor: default;"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:25</span></td>
								<td style="cursor: default;"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
							</tr>

							<tr>
								<td onclick="onClick1()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key][0].'<br>'.$data[$key][3].'<br>'.$data[$key][6].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClick8()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+7][0].'<br>'.$data[$key+7][3].'<br>'.$data[$key+7][6].'<br><span style="float: left;">9:15</span></td>
								<td style="cursor: default;"><span style="float: left;">8:25</span><br><br>X-Block<br><br><span style="float: left;">8:55</span></td>
								<td onclick="onClick22()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+21][0].'<br>'.$data[$key+21][3].'<br>'.$data[$key+21][6].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClick29()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+28][0].'<br>'.$data[$key+28][3].'<br>'.$data[$key+28][6].'<br><span style="float: left;">9:15</span></td>
							</tr>

							<tr>
								<td onclick="onClick2()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+1][0].'<br>'.$data[$key+1][3].'<br>'.$data[$key+1][6].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick9()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+8][0].'<br>'.$data[$key+8][3].'<br>'.$data[$key+8][6].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick16()" class="hvr-fade"><span style="float: left;">9:00</span><br>'.$data[$key+15][0].'<br>'.$data[$key+15][3].'<br>'.$data[$key+15][6].'<br><span style="float: left;">9:50</span></td>
								<td onclick="onClick23()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+22][0].'<br>'.$data[$key+22][3].'<br>'.$data[$key+22][6].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick30()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+29][0].'<br>'.$data[$key+29][3].'<br>'.$data[$key+29][6].'<br><span style="float: left;">10:10</span></td>
							</tr>

							<tr>
								<td onclick="onClick3()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+2][0].'<br>'.$data[$key+2][3].'<br>'.$data[$key+2][6].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick10()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+9][0].'<br>'.$data[$key+9][3].'<br>'.$data[$key+9][6].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick17()" class="hvr-fade"><span style="float:left;">9:55</span><br>'.$data[$key+16][0].'<br>'.$data[$key+16][3].'<br>'.$data[$key+16][6].'<br><span style="float: left;">10:45</span></td>
								<td onclick="onClick24()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+23][0].'<br>'.$data[$key+23][3].'<br>'.$data[$key+23][6].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick31()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+30][0].'<br>'.$data[$key+30][3].'<br>'.$data[$key+30][6].'<br><span style="float: left;">11:00</span></td>
							</tr>
							
							<tr>
								<td onclick="onClick4()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+3][0].'<br>'.$data[$key+3][3].'<br>'.$data[$key+3][6].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick11()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+10][0].'<br>'.$data[$key+10][3].'<br>'.$data[$key+10][6].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick18()" class="hvr-fade"><span style="float: left;">10:45</span><br>'.$data[$key+17][0].'<br>'.$data[$key+17][3].'<br>'.$data[$key+17][6].'<br><span style="float: left;">11:15</span></td>
								<td onclick="onClick25()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+24][0].'<br>'.$data[$key+24][3].'<br>'.$data[$key+24][6].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick32()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+31][0].'<br>'.$data[$key+31][3].'<br>'.$data[$key+31][6].'<br><span style="float: left;">11:55</span></td>
							</tr>

							<tr>
								<td onclick="onClick5()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+4][0].'<br>'.$data[$key+4][3].'<br>'.$data[$key+4][6].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick12()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+11][0].'<br>'.$data[$key+11][3].'<br>'.$data[$key+11][6].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick19()" class="hvr-fade"><span style="float: left;">11:20</span><br>'.$data[$key+18][0].'<br>'.$data[$key+18][3].'<br>'.$data[$key+18][6].'<br><span style="float: left;">12:05</span></td>
								<td onclick="onClick26()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+25][0].'<br>'.$data[$key+25][3].'<br>'.$data[$key+25][6].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick33()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+32][0].'<br>'.$data[$key+32][3].'<br>'.$data[$key+32][6].'<br><span style="float: left;">12:50</span></td>
							</tr>

							<tr>
								<td onclick="onClick6()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+5][0].'<br>'.$data[$key+5][3].'<br>'.$data[$key+5][6].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick13()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+12][0].'<br>'.$data[$key+12][3].'<br>'.$data[$key+12][6].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick20()" class="hvr-fade"><span style="float: left;">12:10</span><br>'.$data[$key+19][0].'<br>'.$data[$key+19][3].'<br>'.$data[$key+19][6].'<br><span style="float: left;">12:55</span></td>
								<td onclick="onClick27()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+26][0].'<br>'.$data[$key+26][3].'<br>'.$data[$key+26][6].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick34()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+33][0].'<br>'.$data[$key+33][3].'<br>'.$data[$key+33][6].'<br><span style="float: left;">1:45</span></td>
							</tr>

							<tr>
								<td onclick="onClick7()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+6][0].'<br>'.$data[$key+6][3].'<br>'.$data[$key+6][6].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick14()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+13][0].'<br>'.$data[$key+13][3].'<br>'.$data[$key+13][6].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick21()" class="hvr-fade"><span style="float: left;">1:00</span><br>'.$data[$key+20][0].'<br>'.$data[$key+20][3].'<br>'.$data[$key+20][6].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick28()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+27][0].'<br>'.$data[$key+27][3].'<br>'.$data[$key+27][6].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick35()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+34][0].'<br>'.$data[$key+34][3].'<br>'.$data[$key+34][6].'<br><span style="float: left;">2:35</span></td>
							</tr>

							<tr>');
							if ($data[$key+0][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+6][0].'<br>'.$data[$key+6][3].'<br>'.$data[$key+6][6].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							if ($data[$key+13][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+13][0].'<br>'.$data[$key+13][3].'<br>'.$data[$key+13][6].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo('<td style="cursor: default;"></td>');
							if ($data[$key+28][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+27][0].'<br>'.$data[$key+27][3].'<br>'.$data[$key+27][6].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo ('<td style="cursor: default;"><span style="float: left;">2:40</span><br><br>X-Block<br><br><span style="float: left;">3:10</span></td></tr>
							</tr>
							</tbody>
						</table>
					</div>');
	?>
</main>

