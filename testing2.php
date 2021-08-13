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
				$_SESSION['schedule'] = $schedule;
				echo ('
					<button id="myBtn" class="hvr-glow">'.$_SESSION['initials'].'</button>
					<button id="friendBtn"class="hvr-glow" onclick="window.location.href=\'friends.php\'"><i class="fas fa-users"></i>&nbsp&nbsp&nbspFriends</button>
					<div id="myModal" class="modal">
						<div class="modal-content"> 
							<span class="close"></span>
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
						var modal = document.getElementById("myModal");
						var btn = document.getElementById("myBtn");
						var span = document.getElementsByClassName("close")[0];
						btn.onclick = function() {
						  modal.style.display = "block";
						}
						span.onclick = function() {
						  modal.style.display = "none";
						}
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
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br>
								<span style="float:left;">8:20</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:25</span></td>
								<td onclick="window.location.href=\'testing.html\'" class="hvr-fade"><span style="float: left;">8:00</span><br>Assembly<br><span style="float: left;">8:20</span></td>
							</tr>

							<tr>
								<td onclick="window.location.href=\'lazy.php\'" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[1][0][0].'<br>'.$schedule[1][0][1].'<br>'.$schedule[1][0][2].'<br><span style="float: left;">9:15</span></td>
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