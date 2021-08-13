<?php
	ini_set("memory_limit","128M");
	require "header.php";
?>

	<main>
		<?php
			if (isset($_SESSION['userUid'])) {
				$_SESSION['initials'] = substr($_SESSION['userEmail'],0,2);
				$data = array();
				$openCsv = fopen('orderednoS2ScheduleData.csv', 'r');
				while ($line = fgetcsv($openCsv, '1000', ',')) {
					array_push($data, $line);
				}
				fclose($openCsv);
				$key = (array_search($_SESSION['userUid'], array_column($data, '22')));
				$schedule = array(array(array()));
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
					<div id="myModal1" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 8:25-9:15</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key][6].' with '.$data[$key][16].' in '.$data[$key][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>	
					<div id="myModal2" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 9:20-10:10</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+1][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+1][6].' with '.$data[$key+1][16].' in '.$data[$key+1][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 1;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal3" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+2][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+2][6].' with '.$data[$key+2][16].' in '.$data[$key+2][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 2;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal4" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 11:05-11:55</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+3][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+3][6].' with '.$data[$key+3][16].' in '.$data[$key+3][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 3;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal5" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 12:00-12:50</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+4][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+4][6].' with '.$data[$key+4][16].' in '.$data[$key+4][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 4;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal6" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 12:55-1:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+5][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+5][6].' with '.$data[$key+5][16].' in '.$data[$key+5][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 5;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal7" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Monday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+6][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+6][6].' with '.$data[$key+6][16].' in '.$data[$key+6][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 6;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>

					<div id="myModal8" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+7][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+7][6].' with '.$data[$key+7][16].' in '.$data[$key+7][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 7;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>					
					<div id="myModal9" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 9:20-10:10</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+8][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+8][6].' with '.$data[$key+8][16].' in '.$data[$key+8][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 8;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal10" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+9][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+9][6].' with '.$data[$key+9][16].' in '.$data[$key+9][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 9;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal11" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 11:05-11:55</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+10][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+10][6].' with '.$data[$key+10][16].' in '.$data[$key+10][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 10;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal12" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 12:00-12:50</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+11][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+11][6].' with '.$data[$key+11][16].' in '.$data[$key+11][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 11;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal13" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 12:55-1:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+12][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+12][6].' with '.$data[$key+12][16].' in '.$data[$key+12][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 12;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal14" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Tuesday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+13][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+13][6].' with '.$data[$key+13][16].' in '.$data[$key+13][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 13;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal16" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 9:00-9:50</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+16][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+16][6].' with '.$data[$key+16][16].' in '.$data[$key+16][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 16;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>					
					<div id="myModal17" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 9:55-10:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+17][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+17][6].' with '.$data[$key+17][16].' in '.$data[$key+17][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 17;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal18" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 10:45-11:15</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+18][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+18][6].' with '.$data[$key+18][16].' in '.$data[$key+18][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 18;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal=19" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 11:20-12:05</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+19][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+19][6].' with '.$data[$key+19][16].' in '.$data[$key+19][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 19;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal20" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 12:10-12:55</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+20][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+20][6].' with '.$data[$key+20][16].' in '.$data[$key+20][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 20;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal21" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Wednesday From 1:00-1:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+21][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+21][6].' with '.$data[$key+21][16].' in '.$data[$key+21][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 21;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					
					<div id="myModal22" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 8:25-9:15</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+22][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+22][6].' with '.$data[$key+22][16].' in '.$data[$key+22][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 22;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>					
					<div id="myModal23" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 9:20-10:10</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+23][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+23][6].' with '.$data[$key+23][16].' in '.$data[$key+23][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 23;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal24" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+24][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+24][6].' with '.$data[$key+24][16].' in '.$data[$key+24][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 24;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal25" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 11:05-11:55</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+25][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+25][6].' with '.$data[$key+25][16].' in '.$data[$key+25][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 25;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal26" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 12:00-12:50</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+26][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+26][6].' with '.$data[$key+26][16].' in '.$data[$key+26][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 26;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal27" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 12:55-1:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+27][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+27][6].' with '.$data[$key+27][16].' in '.$data[$key+27][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 27;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal28" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Thursday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+28][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+28][6].' with '.$data[$key+28][16].' in '.$data[$key+28][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 28;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>

					<div id="myModal29" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 8:25-9:15</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+29][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+29][6].' with '.$data[$key+29][16].' in '.$data[$key+29][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 29;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>					
					<div id="myModal30" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 9:20-10:10</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+30][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+30][6].' with '.$data[$key+30][16].' in '.$data[$key+30][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 30;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal31" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+31][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+31][6].' with '.$data[$key+31][16].' in '.$data[$key+31][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 31;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal32" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 11:05-11:55</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+32][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+32][6].' with '.$data[$key+32][16].' in '.$data[$key+32][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 32;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal33" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 12:00-12:50</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+33][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+33][6].' with '.$data[$key+33][16].' in '.$data[$key+33][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 33;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal34" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 12:55-1:45</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+34][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+34][6].' with '.$data[$key+34][16].' in '.$data[$key+34][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 34;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<div id="myModal35" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1>On Friday From 10:15-11:00</h1>
							</div>
							<div class="modal-body2">
								<ul>');
									if ($data[$key+35][6] == "Free") {
										echo('<li>You are Free!</li>');
									}
									else {
										echo('
									<li>You have '.$data[$key+35][6].' with '.$data[$key+35][16].' in '.$data[$key+35][10].'</li>');
									}
									$csv = array_map('str_getcsv', file('includes/database.csv'));
									$wack = $csv[$_SESSION['userId']];
									if(count($csv[$_SESSION['userId']])>3) {
										for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
											$keyF = array_search($csv[$_SESSION['userId']][$i], array_column($data, '22'));
											$keyF += 35;
											if ($data[$keyF][6] == "Free") {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' is Free!');
											}
											else {
												echo('<li>'.$csv[$_SESSION['userId']][$i].' has '.$data[$keyF][6].' with '.$data[$keyF][16].' in '.$data[$keyF][10].'</li>');
											}
										}
									}
									echo ('
								</ul>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="modal.js"></script>
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
								<td onclick="onClick1()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key][6].'<br>'.$data[$key][10].'<br>'.$data[$key][16].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClick8()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+7][6].'<br>'.$data[$key+7][10].'<br>'.$data[$key+7][16].'<br><span style="float: left;">9:15</span></td>
								<td style="cursor: default;"><span style="float: left;">8:25</span><br><br>X-Block<br><br><span style="float: left;">8:55</span></td>
								<td onclick="onClick22()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+22][6].'<br>'.$data[$key+22][10].'<br>'.$data[$key+22][16].'<br><span style="float: left;">9:15</span></td>
								<td onclick="onClick29()" class="hvr-fade"><span style="float: left;">8:25</span><br>'.$data[$key+29][6].'<br>'.$data[$key+29][10].'<br>'.$data[$key+29][16].'<br><span style="float: left;">9:15</span></td>
							</tr>

							<tr>
								<td onclick="onClick2()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+1][6].'<br>'.$data[$key+1][10].'<br>'.$data[$key+1][16].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick9()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+8][6].'<br>'.$data[$key+8][10].'<br>'.$data[$key+8][16].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick16()" class="hvr-fade"><span style="float: left;">9:00</span><br>'.$data[$key+16][6].'<br>'.$data[$key+16][10].'<br>'.$data[$key+16][16].'<br><span style="float: left;">9:50</span></td>
								<td onclick="onClick23()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+23][6].'<br>'.$data[$key+23][10].'<br>'.$data[$key+23][16].'<br><span style="float: left;">10:10</span></td>
								<td onclick="onClick30()" class="hvr-fade"><span style="float: left;">9:20</span><br>'.$data[$key+30][6].'<br>'.$data[$key+30][10].'<br>'.$data[$key+30][16].'<br><span style="float: left;">10:10</span></td>
							</tr>

							<tr>
								<td onclick="onClick3()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+2][6].'<br>'.$data[$key+2][10].'<br>'.$data[$key+2][16].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick10()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+9][6].'<br>'.$data[$key+9][10].'<br>'.$data[$key+9][16].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick17()" class="hvr-fade"><span style="float:left;">9:55</span><br>'.$data[$key+17][6].'<br>'.$data[$key+17][10].'<br>'.$data[$key+17][16].'<br><span style="float: left;">10:45</span></td>
								<td onclick="onClick24()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+24][6].'<br>'.$data[$key+24][10].'<br>'.$data[$key+24][16].'<br><span style="float: left;">11:00</span></td>
								<td onclick="onClick31()" class="hvr-fade"><span style="float:left;">10:15</span><br>'.$data[$key+31][6].'<br>'.$data[$key+31][10].'<br>'.$data[$key+31][16].'<br><span style="float: left;">11:00</span></td>
							</tr>
							
							<tr>
								<td onclick="onClick4()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+3][6].'<br>'.$data[$key+3][10].'<br>'.$data[$key+3][16].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick11()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+10][6].'<br>'.$data[$key+10][10].'<br>'.$data[$key+10][16].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick18()" class="hvr-fade"><span style="float: left;">10:45</span><br>'.$data[$key+18][6].'<br>'.$data[$key+18][10].'<br>'.$data[$key+18][16].'<br><span style="float: left;">11:15</span></td>
								<td onclick="onClick25()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+25][6].'<br>'.$data[$key+25][10].'<br>'.$data[$key+25][16].'<br><span style="float: left;">11:55</span></td>
								<td onclick="onClick32()" class="hvr-fade"><span style="float: left;">11:05</span><br>'.$data[$key+32][6].'<br>'.$data[$key+32][10].'<br>'.$data[$key+32][16].'<br><span style="float: left;">11:55</span></td>
							</tr>

							<tr>
								<td onclick="onClick5()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+4][6].'<br>'.$data[$key+4][10].'<br>'.$data[$key+4][16].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick12()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+11][6].'<br>'.$data[$key+11][10].'<br>'.$data[$key+11][16].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick19()" class="hvr-fade"><span style="float: left;">11:20</span><br>'.$data[$key+19][6].'<br>'.$data[$key+19][10].'<br>'.$data[$key+19][16].'<br><span style="float: left;">12:05</span></td>
								<td onclick="onClick26()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+26][6].'<br>'.$data[$key+26][10].'<br>'.$data[$key+26][16].'<br><span style="float: left;">12:50</span></td>
								<td onclick="onClick33()" class="hvr-fade"><span style="float: left;">12:00</span><br>'.$data[$key+33][6].'<br>'.$data[$key+33][10].'<br>'.$data[$key+33][16].'<br><span style="float: left;">12:50</span></td>
							</tr>

							<tr>
								<td onclick="onClick6()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+5][6].'<br>'.$data[$key+5][10].'<br>'.$data[$key+5][16].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick13()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+12][6].'<br>'.$data[$key+12][10].'<br>'.$data[$key+12][16].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick20()" class="hvr-fade"><span style="float: left;">12:10</span><br>'.$data[$key+20][6].'<br>'.$data[$key+20][10].'<br>'.$data[$key+20][16].'<br><span style="float: left;">12:55</span></td>
								<td onclick="onClick27()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+27][6].'<br>'.$data[$key+27][10].'<br>'.$data[$key+27][16].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick34()" class="hvr-fade"><span style="float: left;">12:55</span><br>'.$data[$key+34][6].'<br>'.$data[$key+34][10].'<br>'.$data[$key+34][16].'<br><span style="float: left;">1:45</span></td>
							</tr>

							<tr>
								<td onclick="onClick7()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+6][6].'<br>'.$data[$key+6][10].'<br>'.$data[$key+6][16].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick14()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+13][6].'<br>'.$data[$key+13][10].'<br>'.$data[$key+13][16].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick21()" class="hvr-fade"><span style="float: left;">1:00</span><br>'.$data[$key+21][6].'<br>'.$data[$key+21][10].'<br>'.$data[$key+21][16].'<br><span style="float: left;">1:45</span></td>
								<td onclick="onClick28()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+28][6].'<br>'.$data[$key+28][10].'<br>'.$data[$key+28][16].'<br><span style="float: left;">2:40</span></td>
								<td onclick="onClick35()" class="hvr-fade"><span style="float: left;">1:50</span><br>'.$data[$key+35][6].'<br>'.$data[$key+35][10].'<br>'.$data[$key+35][16].'<br><span style="float: left;">2:35</span></td>
							</tr>

							<tr>');
							if ($data[$key+6][12] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+6][6].'<br>'.$data[$key+6][10].'<br>'.$data[$key+6][16].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							if ($data[$key+13][12] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+13][6].'<br>'.$data[$key+13][10].'<br>'.$data[$key+13][16].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo('<td style="cursor: default;"></td>');
							if ($data[$key+28][12] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$data[$key+28][6].'<br>'.$data[$key+28][10].'<br>'.$data[$key+28][16].'<br><span style="float: left;">3:10</span></td>');
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
								<p id="login-text">NAME/EMAIL</p>
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