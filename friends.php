<?php
	ini_set("memory_limit","128M");
	require "header.php";
?>

<main>
	<?php
	echo ('
	<button id="myBtn" class="hvr-glow">'.$_SESSION['initials'].'</button>
	<button id="friendBtn" class="hvr-glow" onclick="window.location.href=\'friends.php\'"><i class="fas fa-users"></i>&nbsp&nbsp&nbspFriends</button>
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
	<section class="friends-wrap">

		<div class="friends-box" style="float: left;">
			<div class="friends-header">ADD FRIENDS</div>
			<div class="friends-body">
				Type in your friend\'s name carefully <br>
				If you mess up, it just won\'t work and the dumb devs don\'t have the brain power to fix this garbage
			</div>
			<form action="includes/friends.inc.php" method="post" class="friends-form" style="padding: 5% 7% 5% 7%;">
				<p id="input-text">FIRST AND LAST NAME</p>
				<br>
				<input type="text" name="friend" autofocus="autofocus" class="friends-input">
				<button type="submit" name="friends-input" class="log-button hvr-glow">Add</button>
			</form>
		</div>
		<div class="friends-box" style="float: right;">
			<div class="friends-header">MY FRIENDS</div>
			<div class="friends-body"> Click your friend\'s name to see their schedule');
		$csv = array_map('str_getcsv', file('includes/database.csv'));
		$wack = $csv[$_SESSION['userId']];
		if(count($csv[$_SESSION['userId']])>3) {
			echo('<br><br><ul>');
			for($i=3;$i<count($csv[$_SESSION['userId']]);$i++) {
				if ($csv[$_SESSION['userId']][$i] !== ""){
					echo('<li><a style="text-decoration: none; color: black;" href="friend-schedule.php?friend='.$csv[$_SESSION['userId']][$i].'">'.$csv[$_SESSION['userId']][$i].'</a></li>');
				}
			}
			echo('</ul>');
		}
			echo('</div>
		</div>
	</section>
	');
	?>
</main>

<?php
	require "footer.php";
?>