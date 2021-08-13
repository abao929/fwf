<?php
	ini_set("memory_limit",-1);
	require "header.php";
?>

	<main>	
		<?php
			if (isset($_COOKIE['remember'])) {
				$userInfo = json_decode($_COOKIE['remember']);
				$_SESSION['userId'] = $userInfo[0];
				$_SESSION['userUid'] = $userInfo[1];
				$_SESSION['userEmail'] = $userInfo[2];
			}
			if (isset($_SESSION['userUid'])) {
				$_SESSION['initials'] = substr($_SESSION['userEmail'],0,2);
				if (!isset($_COOKIE['userSchedules'])) {
					$data = array();
					$openCsv = fopen('good_data2.csv', 'r');
					while ($line = fgetcsv($openCsv, '1000', ',')) {
						array_push($data, $line);
					}
					fclose($openCsv);
					$key = (array_search($_SESSION['userUid'], array_column($data, '10')));
					$schedule = array(array());
					for ($i=0;$i<36;$i++) {
						$add = array($data[$key+$i][0], $data[$key+$i][3], $data[$key+$i][6], $data[$key+$i][4]);
						if($i==17) {
							if($data[$key+$i][0]=="" && $data[$key+$i][3]=="<None Specified>") {
								$add = array("", "R-Block", "", $data[$key+$i][4]);
							}
							if($data[$key+$i][0]=="Free" && $data[$key+$i][3]=="") {
								$add = array("", "R-Block", "", $data[$key+$i][4]);
							}
						}
						if($data[$key+$i][0]=="Free" && $data[$key+$i][3]=="") {
								$add = array("", "Free", "", $data[$key+$i][4]);
							}
						$schedule[$i] = $add;
					}
					setcookie('userSchedules', json_encode($schedule), time() + (10*365*24*60*60));
					echo 'cookie created';
				}
				$schedule = json_decode($_COOKIE['userSchedules']);
				echo ('
					<button id="myBtn" onclick="onClickLogout()" class="hvr-glow">'.$_SESSION['initials'].'</button>
					<button id="friendBtn" class="hvr-glow" onclick="window.location.href=\'friends.php\'"><i class="fas fa-users"></i>&nbsp&nbsp&nbspFriends</button>
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
					</div>');

				$modal_times = array("On Monday From 8:25-9:15", "On Monday From 9:20-10:10", "On Monday From 10:15-11:00", "On Monday From 11:05-11:55", "On Monday From 12:00-12:50", "On Monday From 12:55-1:45", "On Monday from 1:50-2:40", "On Tuesday From 10:15-11:00", "On Tuesday From 9:20-10:10", "On Tuesday From 10:15-11:00", "On Tuesday From 11:05-11:55", "On Tuesday From 12:00-12:50", "On Tuesday From 12:55-1:45", "On Tuesday From 1:50-2:40", "fix", "please", "On Wednesday From 9:00-9:50", "On Wednesday From 9:55-10:45", "On Wednesday From 10:45-11:15", "On Wednesday From 11:20-12:05", "On Wednesday From 12:10-12:55", "On Wednesday From 1:00-1:45",  "On Thursday From 10:15-11:00", "On Thursday From 9:20-10:10", "On Thursday From 10:15-11:00", "On Thursday From 11:05-11:55", "On Thursday From 12:00-12:50", "On Thursday From 12:55-1:45", "On Thursday From 1:50-2:40", "On Friday From 8:25-9:15", "On Friday From 9:20-10:10", "On Friday From 10:15-11:00", "On Friday From 11:05-11:55", "On Friday From 12:00-12:50", "On Friday From 12:55-1:45", "On Friday From 1:50-2:35");

				$modals = 0;
					echo ('<div id="myModal1" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>' . $modal_times[$modals] . '</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key + ($modals)][0] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key + ($modals)][0].' with '.$data[$key + ($modals)][6].' in '.$data[$key + ($modals)][3].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += ($modals);
											if ($data[$keyF][0] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][0].' with '.$data[$keyF][6].' in '.$data[$keyF][3].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>	');
			
				echo ('
								</ul>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="modal.js?1500"></script>
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
								<td onclick="onClickTd(this.id)" id="td_1" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[0][0].'<br>'.$schedule[0][1].'<br>'.$schedule[0][2].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_8" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[7][0].'<br>'.$schedule[7][1].'<br>'.$schedule[7][2].'<br><span style="float: left;">9:15</span></td>
								<td style="cursor: default;"><span style="float: left;">8:25</span><br><br>X-Block<br><br><span style="float: left;">8:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_23" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[21][0].'<br>'.$schedule[21][1].'<br>'.$schedule[21][2].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_30" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$schedule[28][0].'<br>'.$schedule[28][1].'<br>'.$schedule[28][2].'<br><span style="float: left;">9:15</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_2" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[1][0].'<br>'.$schedule[1][1].'<br>'.$schedule[1][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_9" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[8][0].'<br>'.$schedule[8][1].'<br>'.$schedule[8][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_17" class="hvr-fade"><span style="float: left;">9:00</span><br>'.$schedule[15][0].'<br>'.$schedule[15][1].'<br>'.$schedule[15][2].'<br><span style="float: left;">9:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_24" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[22][0].'<br>'.$schedule[22][1].'<br>'.$schedule[22][2].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_31" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$schedule[29][0].'<br>'.$schedule[29][1].'<br>'.$schedule[29][2].'<br><span style="float: left;">10:10</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_3" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[2][0].'<br>'.$schedule[2][1].'<br>'.$schedule[2][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_10" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[9][0].'<br>'.$schedule[9][1].'<br>'.$schedule[9][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_18" class="hvr-fade"><span style="float:left;">9:55</span><br>'.$schedule[16][0].'<br>'.$schedule[16][1].'<br>'.$schedule[16][2].'<br><span style="float: left;">10:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_25" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[23][0].'<br>'.$schedule[23][1].'<br>'.$schedule[23][2].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_32" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$schedule[30][0].'<br>'.$schedule[30][1].'<br>'.$schedule[30][2].'<br><span style="float: left;">11:00</span></td>
							</tr>
							
							<tr>
								<td onclick="onClickTd(this.id)" id="td_4" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[3][0].'<br>'.$schedule[3][1].'<br>'.$schedule[3][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_11" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[10][0].'<br>'.$schedule[10][1].'<br>'.$schedule[10][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_19" class="hvr-fade"><span style="float: left;">10:45</span><br>'.$schedule[17][0].'<br>'.$schedule[17][1].'<br>'.$schedule[17][2].'<br><span style="float: left;">11:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_26" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[24][0].'<br>'.$schedule[24][1].'<br>'.$schedule[24][2].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_33" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$schedule[31][0].'<br>'.$schedule[31][1].'<br>'.$schedule[31][2].'<br><span style="float: left;">11:55</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_5" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[4][0].'<br>'.$schedule[4][1].'<br>'.$schedule[4][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_12" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[11][0].'<br>'.$schedule[11][1].'<br>'.$schedule[11][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_20" class="hvr-fade"><span style="float: left;">11:20</span><br>'.$schedule[18][0].'<br>'.$schedule[18][1].'<br>'.$schedule[18][2].'<br><span style="float: left;">12:05</span></td>
								<td onclick="onClickTd(this.id)" id="td_27" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[25][0].'<br>'.$schedule[25][1].'<br>'.$schedule[25][2].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_34" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$schedule[32][0].'<br>'.$schedule[32][1].'<br>'.$schedule[32][2].'<br><span style="float: left;">12:50</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_6" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[5][0].'<br>'.$schedule[5][1].'<br>'.$schedule[5][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_13" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[12][0].'<br>'.$schedule[12][1].'<br>'.$schedule[12][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_21" class="hvr-fade"><span style="float: left;">12:10</span><br>'.$schedule[19][0].'<br>'.$schedule[19][1].'<br>'.$schedule[19][2].'<br><span style="float: left;">12:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_28" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[26][0].'<br>'.$schedule[26][1].'<br>'.$schedule[26][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_35" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$schedule[33][0].'<br>'.$schedule[33][1].'<br>'.$schedule[33][2].'<br><span style="float: left;">1:45</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_7" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[6][0].'<br>'.$schedule[6][1].'<br>'.$schedule[6][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_14" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[13][0].'<br>'.$schedule[13][1].'<br>'.$schedule[13][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_22" class="hvr-fade"><span style="float: left;">1:00</span><br>'.$schedule[20][0].'<br>'.$schedule[20][1].'<br>'.$schedule[20][2].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_29" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[27][0].'<br>'.$schedule[27][1].'<br>'.$schedule[27][2].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_36" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$schedule[34][0].'<br>'.$schedule[34][1].'<br>'.$schedule[34][2].'<br><span style="float: left;">2:35</span></td>
							</tr>



							<tr>');
							if ($schedule[6][3] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$schedule[6][0].'<br>'.$schedule[6][1].'<br>'.$schedule[6][2].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							if ($schedule[13][3] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$schedule[13][0].'<br>'.$schedule[13][1].'<br>'.$schedule[13][2].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo('<td style="cursor: default;"></td>');
							if ($schedule[28][3] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$schedule[28][0].'<br>'.$schedule[28][1].'<br>'.$schedule[28][2].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo ('<td style="cursor: default;"><span style="float: left;">2:40</span><br><br>X-Block<br><br><span style="float: left;">3:10</span></td></tr>
							</tr>
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
								<p id="login-text">REMEMBER ME</p>
								<input type="checkbox" name="remember" class="login-remember hvr-glow" value="Yes">
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