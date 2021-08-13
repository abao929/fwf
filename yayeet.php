<?php
	ini_set("memory_limit",-1);
	require "header.php";
?>

	<main>	
		<?php
			if (isset($_SESSION['userUid'])) {
				$_SESSION['initials'] = substr($_SESSION['userEmail'],0,2);
				$data = array();
				$openCsv = fopen('good_data2.csv', 'r');
				while ($line = fgetcsv($openCsv, '1000', ',')) {
					array_push($data, $line);
				}
				fclose($openCsv);
				$classArr = array('AP Biology', 'AP Chemistry', 'AP Comp Sci Principles', 'AP Computer Science', 'AP Environmental Science', 'AP European History', 'AP Latin V', 'AP Music Theory', 'AP Physics', 'AP Studio Art', 'Acting I', 'Acting II', 'Admin Comm Meeting', 'Admission Tour', 'Admission Weekly meeting', 'Admission staff meeting', 'Advanced Projects in Physics', 'Afternoon Program Meeting', 'Alexandria Book Club', 'Algebra ', 'Algebra I', 'Algebra II', 'Algebra II Foundations', 'Alpine Skiing JV', 'Alpine Skiing Varsity', 'American Lit and Race', 'Anatomy & Physiology', 'Animal Rights Club', 'Art History: Renaissan', 'Asian Culture Club', 'Assembly Class I', 'Assembly Class II', 'Assembly Class III', 'Assembly Class IV', 'Assembly Class V', 'Assembly Class VI', 'Astronomy', 'Baseball Boys JV', 'Baseball Boys Middle School', 'Baseball Boys Varsity', 'Basketball Boys 3rd', 'Basketball Boys JV', 'Basketball Boys Middle School', 'Basketball Boys Varsity', 'Basketball Girls JV', 'Basketball Girls Middle School', 'Basketball Girls Varsity', 'Bass Clarinet Lesson/Study Hall', 'Big Data', 'Biochemistry', 'Biolog', 'Biology', 'Boarders 201', 'Brother 2 Brother', 'Bulldawg Blues and Soul Revue (Blues Band)', 'Calculus', 'Calculus AB', 'Calculus BC II/III', 'Campuses Against Cancer', 'Cello Lesson', 'Cello Lesson MAKEUP', 'Ceramics I', 'Ceramics II', 'Chamber Singers', 'Chemistry', 'Chess Club', 'Chinese A', 'Chinese B', 'Chinese I', 'Chinese II', 'Chinese III', 'Chinese IV', 'Chinese VI', 'Chorus', 'Civics', 'Clarinet Lesson', 'Class V Lati', 'Class V Latin', 'Classics Department Meeting', 'Community Service Leadership Core', 'Comp Sci Department Meeting', 'Computer Science Club', 'Concert Choir', 'Creative No', 'Creative Writing I', 'Crew Boys Varsity', 'Crew Girls JV', 'Crew Girls Varsity', 'Crew Learn To Row', 'Cross Country Boys JV', 'Cross Country Boys Varsity', 'Cross Country Girls JV', 'Cross Country Girls Varsity', 'Cross Country Middle School', 'Debate Club 2018', 'Department Heads Meeting', 'Description', 'Digital Media', 'Discrete Math', 'Double Bass Lesson', 'Drama V', 'Drama VI', 'Drawing I', 'Drawing II', 'Drum Ensemble', 'Drum Lesson', 'Electric Bass Lesson', 'Electric Bass Lesson/Study Hall', 'English Department Meeting', 'English II', 'English III', 'English IV', 'English V', 'English via Latin', 'Environmental Action Committee', 'Ethics Club', 'Ethics and Literature', 'Field Hockey Girls JV', 'Field Hockey Girls Middle School', 'Field Hockey Girls Varsity', 'Flute Lesson', 'Focus', 'Football Boys Junior', 'Football Boys Varsity', 'Free', 'French  A', 'French B', 'French Club', 'French I', 'French II', 'French III', 'French IV', 'French IV Honors', 'French V', 'French V Honors', 'Geography', 'Geometr', 'Geometry', 'Golden Dawgs', 'Golf Varsity', 'Guitar Ensemble', 'Guitar Lesson', 'Half Notes', 'History Department Meeting', 'History of Ancient Greece', 'History of the Human Community', 'Hockey Boys JV', 'Hockey Boys Varsity', 'Hockey Girls JV', 'Hockey Girls Varsity', 'Hockey Middle School', 'Honors Chemistry', 'Honors Physics', 'Honors Precalc/BC Calc', 'Imani', 'Independent Ceramics', 'International Affairs Club', 'Intro Comp Principles', 'Intro to Music Theory', 'Intro to Programming', 'Introduction to Theatre', 'Japanese V', 'Japanese VI', 'Jewish Culture Club', 'Journalism', 'Junior Classical League of Nobles', 'Lacrosse Boys JV', 'Lacrosse Boys Middle School', 'Lacrosse Boys Varsity', 'Lacrosse Girls JV', 'Lacrosse Girls Middle School', 'Lacrosse Girls Varsity', 'Large Core Meeting', 'Latin II', 'Latin III', 'Latin IV Honors', 'Latin IV/V Prose', 'Library Proctor', 'Lunch ', 'Lunch/Study Hall', 'MS Advisor Meeting', 'Macroeconomics', 'Madness in Literature', 'Marine Biology', 'Math Club', 'Math Department Meeting', 'Middle School Dance', 'Mock Trial Club', 'Modern America at War', 'Modern Language Department Meeting', 'Modernist Movement', 'Multivariable Calculus', 'Music V', 'Music VI', 'Musical Theater and Ta', 'Nature and the Environ', "Nice People's Campaign", 'Nobelium', 'Nobleonians', 'Nobles Heads Together', 'Nobles Slam Poetry Club', 'Nobles Theatre Collective', 'Noteorious', 'Orchestra', 'P D III', 'P D IV', 'P D V', 'P D VI', 'Painting  II', 'Painting I', 'Performing Arts Department Meeting', 'Photo I', 'Photo II', 'Physics', 'Piano Lesson', 'Politics and Ethics', 'Prealgebra', 'Precalculus FY', 'Psychology', 'Robotics', 'SPECTRUM', 'Satire and Humor', 'Saxophone Lesson', 'Saxophone Lesson/Study Hall', 'School Life Council', 'Science Department Meeting', 'Science V', 'Science VI', 'Small Core Meeting', "So You Think You Can't", 'Soccer Boys 3rd', 'Soccer Boys JV', 'Soccer Boys Middle School', 'Soccer Boys Varsity', 'Soccer Girls JV', 'Soccer Girls Middle School', 'Soccer Girls Varsity', 'Softball Girls JV', 'Softball Girls Varsity', 'Spanish A', 'Spanish B', 'Spanish I', 'Spanish II', 'Spanish III', 'Spanish IV', 'Spanish V', 'Spanish V Honors', 'Squash Boys JV', 'Squash Boys Varsity', 'Squash Girls JV', 'Squash Girls Varsity', 'Squash Middle School', 'Stagecraft', 'Statistics', 'String Ensemble', 'Student for Gender Awareness', 'Study Hall', 'Study Hall: MS', 'Teaching Fellows  Department Meeting', 'Tennis Boys JV', 'Tennis Boys Varsity', 'Tennis Girls JV', 'Tennis Girls Varsity', 'Tennis Middle School', "Thank Goodness It's Friday Open Paint Studio", 'The Contemporary Novel', 'The Epic', 'Track and Field', 'Trombone Lesson', 'Trumpet Lesson', 'US Advisor Meeting', 'US History', 'Ultimate Frisbee', 'Utopia and Terror', 'Violin Lesson', 'Visual Arts Department Meeting', 'Visual Arts V', 'Visual Arts VI', 'Voice Lesson', 'Voice Lesson MAKEUP', 'Volleyball Girls JV', 'Volleyball Girls Varsity', 'Weiki/Go Club', 'Wind Ensemble', 'Wrestling JV', 'Wrestling Middle School', 'Wrestling Varsity', 'Young Democrats', 'interview');
				$roomArr = array('Academic Center 101', 'Academic Center 102', 'Academic Center 118 (Office)', 'Academic Center 119 (Office)', 'Academic Center 124', 'Academic Center 201', 'Academic Center 202', 'Academic Center 203', 'Academic Center 204', 'Admission 103 (Office)', 'Admission 105 (Office)', 'Admission 114 (Office)', 'Art Wing  108 (Office)', 'Art Wing  109', 'Art Wing  110', 'Art Wing  111 (Art Room)', 'Art Wing  209', 'Art Wing  211', 'Art Wing 213 (Photo Lab)', 'Baker 009', 'Baker 010', 'Baker 011', 'Baker 100', 'Baker 109 (Office)', 'Baker 111', 'Baker 113', 'Baker 114', 'Baker 116', 'Baker 117', 'Baker 200', 'Baker 211', 'Baker 213', 'Baker 214', 'Baker 216', 'Baker 217', 'Business Office', 'Castle Dining Hall', 'Castle Library', 'Castle Study', 'Development Office', 'Ensemble Room A', 'Glass Room', 'Henderson Arts Center', 'Henderson Arts Center (Art Studio)', 'Henderson Arts Center 103', 'Henderson Arts Center 104', 'Henderson Arts Center 106', 'Henderson Arts Center 107', 'Henderson Arts Center 125 (Office)', 'Henderson Arts Center 128 (Office)', 'Henderson Arts Center 128a (Office)', 'Henderson Arts Center 142 (Dance Studio)', 'Henderson Arts Center 205', 'Henderson Arts Center 209', 'Henderson Arts Center 210', 'Henderson Arts Center 211', 'Henderson Arts Center 212', 'Henderson Arts Center 213 (Office)', 'Henderson Arts Center 215 (Office)', 'Henderson Arts Center 216 (Office)', 'Henderson Arts Center 217 (Office)', 'Lawrence Aud', 'Library', 'Library Office (Office)', 'Location', 'MS Conference Room', 'MS Core (Office)', 'MS Head Office', 'Memorial Room', 'Morrison Forum', 'Practice Room 2 (HAC 208)', 'Practice Room 3 (HAC 207)', 'Practice Room 4 (HAC 206)', 'Practice Room 6 (HAC 203)', 'Practice Room 7 (HAC 202)', 'Pratt 106', "Pratt 114 (Nurse's Office)", "Pratt 200 (Counselor's Office)", 'Pratt 201', 'Pratt 201A (Office)', 'Pratt 202', 'Pratt 203 (Science Lab)', 'Pratt 204', 'Pratt 207', 'Pratt 208 (Science Lab)', 'Putnam Library', 'Recital Hall', 'Shattuck 001', 'Shattuck 002', 'Shattuck 003', 'Shattuck 004', 'Shattuck 006', 'Shattuck 007', 'Shattuck 110 (Office)', 'Shattuck 111', 'Shattuck 112', 'Shattuck 113', 'Shattuck 114', 'Shattuck 115', 'Shattuck 115A (Office)', 'Shattuck 118', 'Shattuck 119', 'Shattuck 121 (Office)', 'Shattuck 122', 'Shattuck 123', 'Shattuck 124', 'Shattuck 125 (Office)', 'Shattuck 126', 'Shattuck 127 (Office)', 'Shattuck 131', 'Shattuck 200 (Office)', 'Shattuck 201', 'Shattuck 202', 'Shattuck 203', 'Shattuck 204 (Office)', 'Shattuck 206 (Office)', 'Shattuck 213 (Office)', 'Shattuck 214 (Office)', 'Shattuck 215 (Office)', 'Shattuck 216 (Office)', 'Shattuck 219 (Office)', 'Shattuck 225', 'Shattuck 228 (Office)', 'Shattuck 229', 'Shattuck AAC', 'Towles Aud.', 'Vinik Theatre');
				$teacherArr = array('Abby Kelly', 'Adaire Robinson', 'Adam Cluff', 'Alan Johnson', 'Alden Mauck', 'Alex Gallagher', 'Allen Olsen', 'Alycia Scott-Hiser', 'Amadou Seck', 'Anderson Julio', 'Andra Dix', 'Andrew Shumway', 'Anna Calamare', 'Anna Dolan', 'Antonio Berdugo', 'Ayako Anderson', 'Ben Snyder', 'Betsy VanOot', 'Billye Toussaint', 'Binney Stone', 'Bradley Becker', 'Brian Day', 'Brooke Asnis', 'Bruce Bears', 'Caitlin Chipman', 'Cameron Marchant', 'Carl Geneus', 'Carmen Marsico', 'Cassandra Velázquez', 'Catherine Hall', 'Catherine Kershaw', 'Charles Danhof', 'Christine Pasterczyk', 'Christopher Averill', 'Clara Brodie', 'Colette Finley', 'Curtis Mann', 'Dan Reid', 'Daniel Halperin', 'Danielle Chagnon', 'Dao Liu', 'Dariana Guerrero', 'David Roane', 'David Ulrich', 'Deborah Harrison', 'Derrick Campbell', 'Devareaux Brown', 'Dominic Manzo', 'Donald Allard', 'Douglas Jankey', 'Edgar De Leon', 'Efe Osifo', 'Elizabeth Benjamin-Alcayaga', 'Ella Steim', 'Ellen Crowley', 'Ellyses Kuan', 'Emily Tragert', 'Erik Diaz', 'Gabriella Malavé', 'George Blake', 'George Maley', 'Gia Batty', 'Greg Reinauer', 'Gretchen Nash', 'Gretchen Stone', 'Gunilla Chiaranda', 'Hannah Puckett', 'Hayley Edgerley', 'J. Ross Henderson', 'Jacqueline Cronin', 'Jane Strudwick', 'Jeesun Kim', 'Jeff Chanonhouse', 'Jen Craft', 'Jennah Maybury', 'Jennifer Carlson-Pietraszek', 'Jennifer Hamilton', 'Jennifer Hines', 'Jeremy Kovacs', 'Jessica Brennan', 'Jillian Kinard', 'Joanna Hallac', 'Jody McQuillan', 'Joe Liskowsky', 'John Chung', 'John Dorsey', 'John Gifford', 'John Hirsch', 'John Lower', 'Josie Guevara-Torres', 'Julia Russell', 'Karen Gallagher', 'Kate Blake', 'Kate Harrington', 'Kate Ramsdell', 'Kelly Chung', "Kevin O'Neill", 'Kimberly Libby', 'Kimya Charles', 'Laura Yamartino', 'Lauren Overzet', 'Linda Hurley', 'Linda Poland', 'Lindsay Bababekov', 'Lindsey Tonge', "Lisa O'Connor", 'Louis Barassi', 'Margaret Robertson', 'Mark Harrington', 'Mark Sheeran', 'Mark Spence', 'Marty Richards', 'Mary Batty', 'Maryanne MacDonald', 'Maura Sullivan', 'Meg Jacobs', 'Meghan Glenn', 'Meghan Hamilton', 'Meghan Kelleher', 'Melissa Lyons', 'Michael Denning', 'Michael Kalin', 'Michael Polebaum', 'Michael Turner', 'Molly Pascal', 'Nahyon Lee', 'Nhung Truong', 'Nicole Cariglia', 'None', 'Nora Bourdeau', 'Nora Dowley-Liebowitz', 'Oris Bryant', 'Panos Voulgaris', 'Paul Lieberman', 'Randy Zigler', 'Regina Campbell-Malone', 'Richard Baker', 'Richard Nickerson', 'Rick Wilson', 'Robert Moore', 'Ruihua Sun', 'Samantha Burke', 'Sara Masucci', 'Sarah Harthun', 'Shannon Clark', 'Sheila McElwee', 'Stacey Turner', 'Stacy Goins', 'Stephany Muñoz', 'Stephen Ginsberg', 'Susan Kemalian', 'Talya Sokoll', 'Thomas Forteith', 'Thomas Resor', 'Tilesy Harrington', 'Violet Richard', 'William Bussey');
				$key = (array_search($_SESSION['userUid'], array_column($data, '10')));
				$add = '';
				for ($i=0;$i<36;$i++) {
					if ($data[$key+$i][0] != '') {
						$add = $add.array_search($data[$key+$i][0], $classArr).'-';
					}
					else {
						$add = $add.'-';
					}
					if ($data[$key+$i][3] != '' && $data[$key+$i][3] != '<None Specified>') {
						$add = $add.array_search($data[$key+$i][3], $roomArr).'-';
					}
					else {
						$add = $add.'-';
					}
					if ($data[$key+$i][6] != ' ') {
						$add = $add.array_search($data[$key+$i][6], $teacherArr).'-';
					}
					else {
						$add = $add.'-';
					}
				}
				setcookie('userSchedule', json_encode($add), time() + (1*365*24*60*60));
				$schedule = explode('-',json_decode($_COOKIE['userSchedule']));
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
					</div>

					<div id="myModal1" class="modal">
						<div class="modal-content2">
							<div class="modal-header">
								<h1 id="modal-head"></h1>
							</div>
							<div class="modal-body2">
								<ul id="list">

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
								<td onclick="onClickTd(this.id)" id="td_1" class="hvr-fade"><span id="span_1" style="float: left;">8:25</span><br>'.$classArr[$schedule[0]].'<br>'.$roomArr[$schedule[1]].'<br>'.$teacherArr[$schedule[2]].'<br><span id="span2_1"style="float: left;">9:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_8" class="hvr-fade"><span id="span_8" style="float: left;">8:25</span><br>'.$classArr[$schedule[21]].'<br>'.$roomArr[$schedule[22]].'<br>'.$teacherArr[$schedule[23]].'<br><span id="span2_8" style="float: left;">9:15</span></td>
								<td style="cursor: default;"><span style="float: left;">8:25</span><br><br>X-Block<br><br><span style="float: left;">8:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_23" class="hvr-fade"><span id="span_23" style="float: left;">8:25</span><br>'.$classArr[$schedule[63]].'<br>'.$roomArr[$schedule[64]].'<br>'.$teacherArr[$schedule[65]].'<br><span id="span2_23" style="float: left;">9:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_30" class="hvr-fade"><span id="span_30" style="float: left;">8:25</span><br>'.$classArr[$schedule[84]].'<br>'.$roomArr[$schedule[85]].'<br>'.$teacherArr[$schedule[86]].'<br><span id="span2_30" style="float: left;">9:15</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_2" class="hvr-fade"><span id="span_2" style="float: left;">9:20</span><br>'.$classArr[$schedule[3]].'<br>'.$roomArr[$schedule[4]].'<br>'.$teacherArr[$schedule[5]].'<br><span id="span2_2" style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_9" class="hvr-fade"><span id="span_9" style="float: left;">9:20</span><br>'.$classArr[$schedule[24]].'<br>'.$roomArr[$schedule[25]].'<br>'.$teacherArr[$schedule[26]].'<br><span id="span2_9" style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_17" class="hvr-fade"><span id="span_17" style="float: left;">9:00</span><br>'.$classArr[$schedule[45]].'<br>'.$roomArr[$schedule[46]].'<br>'.$teacherArr[$schedule[47]].'<br><span id="span2_17" style="float: left;">9:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_24" class="hvr-fade"><span id="span_24" style="float: left;">9:20</span><br>'.$classArr[$schedule[66]].'<br>'.$roomArr[$schedule[67]].'<br>'.$teacherArr[$schedule[68]].'<br><span id="span2_24" style="float: left;">10:10</span></td>
								<td onclick="onClickTd(this.id)" id="td_31" class="hvr-fade"><span id="span_31" style="float: left;">9:20</span><br>'.$classArr[$schedule[87]].'<br>'.$roomArr[$schedule[88]].'<br>'.$teacherArr[$schedule[89]].'<br><span id="span2_31" style="float: left;">10:10</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_3" class="hvr-fade"><span id="span_3" style="float:left;">10:15</span><br>'.$classArr[$schedule[6]].'<br>'.$roomArr[$schedule[7]].'<br>'.$teacherArr[$schedule[8]].'<br><span id="span2_3" style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_10" class="hvr-fade"><span id="span_10" style="float:left;">10:15</span><br>'.$classArr[$schedule[27]].'<br>'.$roomArr[$schedule[28]].'<br>'.$teacherArr[$schedule[29]].'<br><span id="span2_10" style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_18" class="hvr-fade"><span id="span_18" style="float:left;">9:55</span><br>'.$classArr[$schedule[48]].'<br>'.$roomArr[$schedule[49]].'<br>'.$teacherArr[$schedule[50]].'<br><span id="span2_18" style="float: left;">10:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_25" class="hvr-fade"><span id="span_25" style="float:left;">10:15</span><br>'.$classArr[$schedule[69]].'<br>'.$roomArr[$schedule[70]].'<br>'.$teacherArr[$schedule[71]].'<br><span id="span2_25" style="float: left;">11:00</span></td>
								<td onclick="onClickTd(this.id)" id="td_32" class="hvr-fade"><span id="span_32" style="float:left;">10:15</span><br>'.$classArr[$schedule[90]].'<br>'.$roomArr[$schedule[91]].'<br>'.$teacherArr[$schedule[92]].'<br><span id="span2_32" style="float: left;">11:00</span></td>
							</tr>
							
							<tr>
								<td onclick="onClickTd(this.id)" id="td_4" class="hvr-fade"><span id="span_4" style="float: left;">11:05</span><br>'.$classArr[$schedule[9]].'<br>'.$roomArr[$schedule[10]].'<br>'.$teacherArr[$schedule[11]].'<br><span id="span2_4" style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_11" class="hvr-fade"><span id="span_11" style="float: left;">11:05</span><br>'.$classArr[$schedule[30]].'<br>'.$roomArr[$schedule[31]].'<br>'.$teacherArr[$schedule[32]].'<br><span id="span2_11" style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_19" class="hvr-fade"><span id="span_19" style="float: left;">10:45</span><br>'.$classArr[$schedule[51]].'<br>'.$roomArr[$schedule[52]].'<br>'.$teacherArr[$schedule[53]].'<br><span id="span2_19" style="float: left;">11:15</span></td>
								<td onclick="onClickTd(this.id)" id="td_26" class="hvr-fade"><span id="span_26" style="float: left;">11:05</span><br>'.$classArr[$schedule[72]].'<br>'.$roomArr[$schedule[73]].'<br>'.$teacherArr[$schedule[74]].'<br><span id="span2_26" style="float: left;">11:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_33" class="hvr-fade"><span id="span_33" style="float: left;">11:05</span><br>'.$classArr[$schedule[93]].'<br>'.$roomArr[$schedule[94]].'<br>'.$teacherArr[$schedule[95]].'<br><span id="span2_33" style="float: left;">11:55</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_5" class="hvr-fade"><span id="span_5" style="float: left;">12:00</span><br>'.$classArr[$schedule[12]].'<br>'.$roomArr[$schedule[13]].'<br>'.$teacherArr[$schedule[14]].'<br><span id="span2_5" style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_12" class="hvr-fade"><span id="span_12" style="float: left;">12:00</span><br>'.$classArr[$schedule[33]].'<br>'.$roomArr[$schedule[34]].'<br>'.$teacherArr[$schedule[35]].'<br><span id="span2_12" style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_20" class="hvr-fade"><span id="span_20" style="float: left;">11:20</span><br>'.$classArr[$schedule[54]].'<br>'.$roomArr[$schedule[55]].'<br>'.$teacherArr[$schedule[56]].'<br><span id="span2_20" style="float: left;">12:05</span></td>
								<td onclick="onClickTd(this.id)" id="td_27" class="hvr-fade"><span id="span_27" style="float: left;">12:00</span><br>'.$classArr[$schedule[75]].'<br>'.$roomArr[$schedule[76]].'<br>'.$teacherArr[$schedule[77]].'<br><span id="span2_27" style="float: left;">12:50</span></td>
								<td onclick="onClickTd(this.id)" id="td_34" class="hvr-fade"><span id="span_34" style="float: left;">12:00</span><br>'.$classArr[$schedule[96]].'<br>'.$roomArr[$schedule[97]].'<br>'.$teacherArr[$schedule[98]].'<br><span id="span2_34" style="float: left;">12:50</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_6" class="hvr-fade"><span id="span_6" style="float: left;">12:55</span><br>'.$classArr[$schedule[15]].'<br>'.$roomArr[$schedule[16]].'<br>'.$teacherArr[$schedule[17]].'<br><span id="span2_6" style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_13" class="hvr-fade"><span id="span_13" style="float: left;">12:55</span><br>'.$classArr[$schedule[36]].'<br>'.$roomArr[$schedule[37]].'<br>'.$teacherArr[$schedule[38]].'<br><span id="span2_13" style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_21" class="hvr-fade"><span id="span_21" style="float: left;">12:10</span><br>'.$classArr[$schedule[57]].'<br>'.$roomArr[$schedule[58]].'<br>'.$teacherArr[$schedule[59]].'<br><span id="span2_21" style="float: left;">12:55</span></td>
								<td onclick="onClickTd(this.id)" id="td_28" class="hvr-fade"><span id="span_28" style="float: left;">12:55</span><br>'.$classArr[$schedule[78]].'<br>'.$roomArr[$schedule[79]].'<br>'.$teacherArr[$schedule[80]].'<br><span id="span2_28" style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_35" class="hvr-fade"><span id="span_35" style="float: left;">12:55</span><br>'.$classArr[$schedule[99]].'<br>'.$roomArr[$schedule[100]].'<br>'.$teacherArr[$schedule[101]].'<br><span id="span2_35" style="float: left;">1:45</span></td>
							</tr>

							<tr>
								<td onclick="onClickTd(this.id)" id="td_7" class="hvr-fade"><span id="span_7" style="float: left;">1:50</span><br>'.$classArr[$schedule[18]].'<br>'.$roomArr[$schedule[19]].'<br>'.$teacherArr[$schedule[20]].'<br><span id="span2_7" style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_14" class="hvr-fade"><span id="span_14" style="float: left;">1:50</span><br>'.$classArr[$schedule[39]].'<br>'.$roomArr[$schedule[40]].'<br>'.$teacherArr[$schedule[41]].'<br><span id="span2_14" style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_22" class="hvr-fade"><span id="span_22" style="float: left;">1:00</span><br>'.$classArr[$schedule[60]].'<br>'.$roomArr[$schedule[61]].'<br>'.$teacherArr[$schedule[62]].'<br><span id="span2_22" style="float: left;">1:45</span></td>
								<td onclick="onClickTd(this.id)" id="td_29" class="hvr-fade"><span id="span_29" style="float: left;">1:50</span><br>'.$classArr[$schedule[81]].'<br>'.$roomArr[$schedule[82]].'<br>'.$teacherArr[$schedule[83]].'<br><span id="span2_29" style="float: left;">2:40</span></td>
								<td onclick="onClickTd(this.id)" id="td_36" class="hvr-fade"><span id="span_36" style="float: left;">1:50</span><br>'.$classArr[$schedule[102]].'<br>'.$roomArr[$schedule[103]].'<br>'.$teacherArr[$schedule[104]].'<br><span id="span2_36" style="float: left;">2:35</span></td>
							</tr>



							<tr>');
							if ($data[$key+6][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$classArr[$schedule[18]].'<br>'.$roomArr[$schedule[19]].'<br>'.$teacherArr[$schedule[20]].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							if ($data[$key+13][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$classArr[$schedule[39]].'<br>'.$roomArr[$schedule[40]].'<br>'.$teacherArr[$schedule[41]].'<br><span style="float: left;">3:10</span></td>');
							}
							else {
								echo('<td style="cursor: default;"></td>');
							}
							echo('<td style="cursor: default;"></td>');
							if ($data[$key+27][4] == '7, 8') {
								echo('<td style="cursor: default;"><span style="float: left;">2:40</span><br>'.$classArr[$schedule[81]].'<br>'.$roomArr[$schedule[82]].'<br>'.$teacherArr[$schedule[83]].'<br><span style="float: left;">3:10</span></td>');
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
		<script type="text/javascript">
		var classArr = ['AP Biology', 'AP Chemistry', 'AP Comp Sci Principles', 'AP Computer Science', 'AP Environmental Science', 'AP European History', 'AP Latin V', 'AP Music Theory', 'AP Physics', 'AP Studio Art', 'Acting I', 'Acting II', 'Admin Comm Meeting', 'Admission Tour', 'Admission Weekly meeting', 'Admission staff meeting', 'Advanced Projects in Physics', 'Afternoon Program Meeting', 'Alexandria Book Club', 'Algebra ', 'Algebra I', 'Algebra II', 'Algebra II Foundations', 'Alpine Skiing JV', 'Alpine Skiing Varsity', 'American Lit and Race', 'Anatomy & Physiology', 'Animal Rights Club', 'Art History: Renaissan', 'Asian Culture Club', 'Assembly Class I', 'Assembly Class II', 'Assembly Class III', 'Assembly Class IV', 'Assembly Class V', 'Assembly Class VI', 'Astronomy', 'Baseball Boys JV', 'Baseball Boys Middle School', 'Baseball Boys Varsity', 'Basketball Boys 3rd', 'Basketball Boys JV', 'Basketball Boys Middle School', 'Basketball Boys Varsity', 'Basketball Girls JV', 'Basketball Girls Middle School', 'Basketball Girls Varsity', 'Bass Clarinet Lesson/Study Hall', 'Big Data', 'Biochemistry', 'Biolog', 'Biology', 'Boarders 201', 'Brother 2 Brother', 'Bulldawg Blues and Soul Revue (Blues Band)', 'Calculus', 'Calculus AB', 'Calculus BC II/III', 'Campuses Against Cancer', 'Cello Lesson', 'Cello Lesson MAKEUP', 'Ceramics I', 'Ceramics II', 'Chamber Singers', 'Chemistry', 'Chess Club', 'Chinese A', 'Chinese B', 'Chinese I', 'Chinese II', 'Chinese III', 'Chinese IV', 'Chinese VI', 'Chorus', 'Civics', 'Clarinet Lesson', 'Class V Lati', 'Class V Latin', 'Classics Department Meeting', 'Community Service Leadership Core', 'Comp Sci Department Meeting', 'Computer Science Club', 'Concert Choir', 'Creative No', 'Creative Writing I', 'Crew Boys Varsity', 'Crew Girls JV', 'Crew Girls Varsity', 'Crew Learn To Row', 'Cross Country Boys JV', 'Cross Country Boys Varsity', 'Cross Country Girls JV', 'Cross Country Girls Varsity', 'Cross Country Middle School', 'Debate Club 2018', 'Department Heads Meeting', 'Description', 'Digital Media', 'Discrete Math', 'Double Bass Lesson', 'Drama V', 'Drama VI', 'Drawing I', 'Drawing II', 'Drum Ensemble', 'Drum Lesson', 'Electric Bass Lesson', 'Electric Bass Lesson/Study Hall', 'English Department Meeting', 'English II', 'English III', 'English IV', 'English V', 'English via Latin', 'Environmental Action Committee', 'Ethics Club', 'Ethics and Literature', 'Field Hockey Girls JV', 'Field Hockey Girls Middle School', 'Field Hockey Girls Varsity', 'Flute Lesson', 'Focus', 'Football Boys Junior', 'Football Boys Varsity', 'Free', 'French  A', 'French B', 'French Club', 'French I', 'French II', 'French III', 'French IV', 'French IV Honors', 'French V', 'French V Honors', 'Geography', 'Geometr', 'Geometry', 'Golden Dawgs', 'Golf Varsity', 'Guitar Ensemble', 'Guitar Lesson', 'Half Notes', 'History Department Meeting', 'History of Ancient Greece', 'History of the Human Community', 'Hockey Boys JV', 'Hockey Boys Varsity', 'Hockey Girls JV', 'Hockey Girls Varsity', 'Hockey Middle School', 'Honors Chemistry', 'Honors Physics', 'Honors Precalc/BC Calc', 'Imani', 'Independent Ceramics', 'International Affairs Club', 'Intro Comp Principles', 'Intro to Music Theory', 'Intro to Programming', 'Introduction to Theatre', 'Japanese V', 'Japanese VI', 'Jewish Culture Club', 'Journalism', 'Junior Classical League of Nobles', 'Lacrosse Boys JV', 'Lacrosse Boys Middle School', 'Lacrosse Boys Varsity', 'Lacrosse Girls JV', 'Lacrosse Girls Middle School', 'Lacrosse Girls Varsity', 'Large Core Meeting', 'Latin II', 'Latin III', 'Latin IV Honors', 'Latin IV/V Prose', 'Library Proctor', 'Lunch ', 'Lunch/Study Hall', 'MS Advisor Meeting', 'Macroeconomics', 'Madness in Literature', 'Marine Biology', 'Math Club', 'Math Department Meeting', 'Middle School Dance', 'Mock Trial Club', 'Modern America at War', 'Modern Language Department Meeting', 'Modernist Movement', 'Multivariable Calculus', 'Music V', 'Music VI', 'Musical Theater and Ta', 'Nature and the Environ', "Nice People's Campaign", 'Nobelium', 'Nobleonians', 'Nobles Heads Together', 'Nobles Slam Poetry Club', 'Nobles Theatre Collective', 'Noteorious', 'Orchestra', 'P D III', 'P D IV', 'P D V', 'P D VI', 'Painting  II', 'Painting I', 'Performing Arts Department Meeting', 'Photo I', 'Photo II', 'Physics', 'Piano Lesson', 'Politics and Ethics', 'Prealgebra', 'Precalculus FY', 'Psychology', 'Robotics', 'SPECTRUM', 'Satire and Humor', 'Saxophone Lesson', 'Saxophone Lesson/Study Hall', 'School Life Council', 'Science Department Meeting', 'Science V', 'Science VI', 'Small Core Meeting', "So You Think You Can't", 'Soccer Boys 3rd', 'Soccer Boys JV', 'Soccer Boys Middle School', 'Soccer Boys Varsity', 'Soccer Girls JV', 'Soccer Girls Middle School', 'Soccer Girls Varsity', 'Softball Girls JV', 'Softball Girls Varsity', 'Spanish A', 'Spanish B', 'Spanish I', 'Spanish II', 'Spanish III', 'Spanish IV', 'Spanish V', 'Spanish V Honors', 'Squash Boys JV', 'Squash Boys Varsity', 'Squash Girls JV', 'Squash Girls Varsity', 'Squash Middle School', 'Stagecraft', 'Statistics', 'String Ensemble', 'Student for Gender Awareness', 'Study Hall', 'Study Hall: MS', 'Teaching Fellows  Department Meeting', 'Tennis Boys JV', 'Tennis Boys Varsity', 'Tennis Girls JV', 'Tennis Girls Varsity', 'Tennis Middle School', "Thank Goodness It's Friday Open Paint Studio", 'The Contemporary Novel', 'The Epic', 'Track and Field', 'Trombone Lesson', 'Trumpet Lesson', 'US Advisor Meeting', 'US History', 'Ultimate Frisbee', 'Utopia and Terror', 'Violin Lesson', 'Visual Arts Department Meeting', 'Visual Arts V', 'Visual Arts VI', 'Voice Lesson', 'Voice Lesson MAKEUP', 'Volleyball Girls JV', 'Volleyball Girls Varsity', 'Weiki/Go Club', 'Wind Ensemble', 'Wrestling JV', 'Wrestling Middle School', 'Wrestling Varsity', 'Young Democrats', 'interview'];
		var roomArr = ['Academic Center 101', 'Academic Center 102', 'Academic Center 118 (Office)', 'Academic Center 119 (Office)', 'Academic Center 124', 'Academic Center 201', 'Academic Center 202', 'Academic Center 203', 'Academic Center 204', 'Admission 103 (Office)', 'Admission 105 (Office)', 'Admission 114 (Office)', 'Art Wing  108 (Office)', 'Art Wing  109', 'Art Wing  110', 'Art Wing  111 (Art Room)', 'Art Wing  209', 'Art Wing  211', 'Art Wing 213 (Photo Lab)', 'Baker 009', 'Baker 010', 'Baker 011', 'Baker 100', 'Baker 109 (Office)', 'Baker 111', 'Baker 113', 'Baker 114', 'Baker 116', 'Baker 117', 'Baker 200', 'Baker 211', 'Baker 213', 'Baker 214', 'Baker 216', 'Baker 217', 'Business Office', 'Castle Dining Hall', 'Castle Library', 'Castle Study', 'Development Office', 'Ensemble Room A', 'Glass Room', 'Henderson Arts Center', 'Henderson Arts Center (Art Studio)', 'Henderson Arts Center 103', 'Henderson Arts Center 104', 'Henderson Arts Center 106', 'Henderson Arts Center 107', 'Henderson Arts Center 125 (Office)', 'Henderson Arts Center 128 (Office)', 'Henderson Arts Center 128a (Office)', 'Henderson Arts Center 142 (Dance Studio)', 'Henderson Arts Center 205', 'Henderson Arts Center 209', 'Henderson Arts Center 210', 'Henderson Arts Center 211', 'Henderson Arts Center 212', 'Henderson Arts Center 213 (Office)', 'Henderson Arts Center 215 (Office)', 'Henderson Arts Center 216 (Office)', 'Henderson Arts Center 217 (Office)', 'Lawrence Aud', 'Library', 'Library Office (Office)', 'Location', 'MS Conference Room', 'MS Core (Office)', 'MS Head Office', 'Memorial Room', 'Morrison Forum', 'Practice Room 2 (HAC 208)', 'Practice Room 3 (HAC 207)', 'Practice Room 4 (HAC 206)', 'Practice Room 6 (HAC 203)', 'Practice Room 7 (HAC 202)', 'Pratt 106', "Pratt 114 (Nurse's Office)", "Pratt 200 (Counselor's Office)", 'Pratt 201', 'Pratt 201A (Office)', 'Pratt 202', 'Pratt 203 (Science Lab)', 'Pratt 204', 'Pratt 207', 'Pratt 208 (Science Lab)', 'Putnam Library', 'Recital Hall', 'Shattuck 001', 'Shattuck 002', 'Shattuck 003', 'Shattuck 004', 'Shattuck 006', 'Shattuck 007', 'Shattuck 110 (Office)', 'Shattuck 111', 'Shattuck 112', 'Shattuck 113', 'Shattuck 114', 'Shattuck 115', 'Shattuck 115A (Office)', 'Shattuck 118', 'Shattuck 119', 'Shattuck 121 (Office)', 'Shattuck 122', 'Shattuck 123', 'Shattuck 124', 'Shattuck 125 (Office)', 'Shattuck 126', 'Shattuck 127 (Office)', 'Shattuck 131', 'Shattuck 200 (Office)', 'Shattuck 201', 'Shattuck 202', 'Shattuck 203', 'Shattuck 204 (Office)', 'Shattuck 206 (Office)', 'Shattuck 213 (Office)', 'Shattuck 214 (Office)', 'Shattuck 215 (Office)', 'Shattuck 216 (Office)', 'Shattuck 219 (Office)', 'Shattuck 225', 'Shattuck 228 (Office)', 'Shattuck 229', 'Shattuck AAC', 'Towles Aud.', 'Vinik Theatre'];
		var teacherArr = ['Abby Kelly', 'Adaire Robinson', 'Adam Cluff', 'Alan Johnson', 'Alden Mauck', 'Alex Gallagher', 'Allen Olsen', 'Alycia Scott-Hiser', 'Amadou Seck', 'Anderson Julio', 'Andra Dix', 'Andrew Shumway', 'Anna Calamare', 'Anna Dolan', 'Antonio Berdugo', 'Ayako Anderson', 'Ben Snyder', 'Betsy VanOot', 'Billye Toussaint', 'Binney Stone', 'Bradley Becker', 'Brian Day', 'Brooke Asnis', 'Bruce Bears', 'Caitlin Chipman', 'Cameron Marchant', 'Carl Geneus', 'Carmen Marsico', 'Cassandra Velázquez', 'Catherine Hall', 'Catherine Kershaw', 'Charles Danhof', 'Christine Pasterczyk', 'Christopher Averill', 'Clara Brodie', 'Colette Finley', 'Curtis Mann', 'Dan Reid', 'Daniel Halperin', 'Danielle Chagnon', 'Dao Liu', 'Dariana Guerrero', 'David Roane', 'David Ulrich', 'Deborah Harrison', 'Derrick Campbell', 'Devareaux Brown', 'Dominic Manzo', 'Donald Allard', 'Douglas Jankey', 'Edgar De Leon', 'Efe Osifo', 'Elizabeth Benjamin-Alcayaga', 'Ella Steim', 'Ellen Crowley', 'Ellyses Kuan', 'Emily Tragert', 'Erik Diaz', 'Gabriella Malavé', 'George Blake', 'George Maley', 'Gia Batty', 'Greg Reinauer', 'Gretchen Nash', 'Gretchen Stone', 'Gunilla Chiaranda', 'Hannah Puckett', 'Hayley Edgerley', 'J. Ross Henderson', 'Jacqueline Cronin', 'Jane Strudwick', 'Jeesun Kim', 'Jeff Chanonhouse', 'Jen Craft', 'Jennah Maybury', 'Jennifer Carlson-Pietraszek', 'Jennifer Hamilton', 'Jennifer Hines', 'Jeremy Kovacs', 'Jessica Brennan', 'Jillian Kinard', 'Joanna Hallac', 'Jody McQuillan', 'Joe Liskowsky', 'John Chung', 'John Dorsey', 'John Gifford', 'John Hirsch', 'John Lower', 'Josie Guevara-Torres', 'Julia Russell', 'Karen Gallagher', 'Kate Blake', 'Kate Harrington', 'Kate Ramsdell', 'Kelly Chung', "Kevin O'Neill", 'Kimberly Libby', 'Kimya Charles', 'Laura Yamartino', 'Lauren Overzet', 'Linda Hurley', 'Linda Poland', 'Lindsay Bababekov', 'Lindsey Tonge', "Lisa O'Connor", 'Louis Barassi', 'Margaret Robertson', 'Mark Harrington', 'Mark Sheeran', 'Mark Spence', 'Marty Richards', 'Mary Batty', 'Maryanne MacDonald', 'Maura Sullivan', 'Meg Jacobs', 'Meghan Glenn', 'Meghan Hamilton', 'Meghan Kelleher', 'Melissa Lyons', 'Michael Denning', 'Michael Kalin', 'Michael Polebaum', 'Michael Turner', 'Molly Pascal', 'Nahyon Lee', 'Nhung Truong', 'Nicole Cariglia', 'None', 'Nora Bourdeau', 'Nora Dowley-Liebowitz', 'Oris Bryant', 'Panos Voulgaris', 'Paul Lieberman', 'Randy Zigler', 'Regina Campbell-Malone', 'Richard Baker', 'Richard Nickerson', 'Rick Wilson', 'Robert Moore', 'Ruihua Sun', 'Samantha Burke', 'Sara Masucci', 'Sarah Harthun', 'Shannon Clark', 'Sheila McElwee', 'Stacey Turner', 'Stacy Goins', 'Stephany Muñoz', 'Stephen Ginsberg', 'Susan Kemalian', 'Talya Sokoll', 'Thomas Forteith', 'Thomas Resor', 'Tilesy Harrington', 'Violet Richard', 'William Bussey'];
		function onClickLogout() {
		  $("#myModal0").css("display", "block");
		}

		function cookieNames() {
			var cookies = document.cookie.split(';');
			var names = [];
			for (i=0;i<cookies.length;++i) {
				var cName = cookies[i].split('=')[0].replace(/\ /g, '');
				if (cName != "userSchedule" && cName != "PHPSESSID") {
					names.push(cName);
				}
			}
			return names;
		}



		function onClickTd(click_id) {
		  var td_id = click_id.split('_')[1]-1;
		  $("#myModal1").css("display", "block");
		  var scheduleTemp = JSON.parse(Cookies.get('userSchedule'));
		  var schedule = scheduleTemp.split('-');
		  var info = "You have " + classArr[schedule[td_id*3]] + " with " + teacherArr[schedule[td_id*3+2]] + " in " + roomArr[schedule[td_id*3+1]];
		  if (classArr[schedule[td_id*3]] == "Free") {
		  	info = "You are free!";
		  }
		  var cookieList = cookieNames();
		  var list = "<li>" + info + "</li>";
		  for (i=0;i<cookieList.length;++i) {
		  	var friendTemp = JSON.parse(Cookies.get(cookieList[i]));
		  	var friendSchedule = friendTemp.split('-');
		  	if (classArr[friendSchedule[td_id*3]] == "Free") {
		  		list = list + "<li>" + cookieList[i].replace("-", " ") + " is free!";
		  	}
		  	else {
		  		list = list + "<li>" + cookieList[i].replace("-", " ") + " has " + classArr[friendSchedule[td_id*3]] + " with " + teacherArr[friendSchedule[td_id*3+2]] + " in " + roomArr[friendSchedule[td_id*3+1]];
		  	}

		  }
		  $("#list").html(list);
		  var startTime = $("#span_"+(td_id+1)).text();
		  var endTime = $("#span2_"+(td_id+1)).text();
		  var DOW = '';
		  if (0<=td_id && td_id<=6) {
		  	DOW = "Monday";
		  } else if(7<=td_id && td_id<=13) {
		  	DOW = "Tuesday";
		  } else if(14<=td_id && td_id<=21) {
		  	DOW = "Wednesday";
		  } else if(22<=td_id && td_id<=28) {
		  	DOW = "Thursday";
		  } else if(29<=td_id && td_id<=36) {
		  	DOW = "Friday";
		  }
		  $("#modal-head").text("On " + DOW + " From " + startTime + "-" + endTime);
		}

		window.onclick = function(event) {
		  if (event.target.id.includes("Modal")) {
		  	document.getElementById(event.target.id).style.display = "none";
		  }
		}

		</script>
	</main>
<?php
	require "footer.php";
?>