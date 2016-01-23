<?php include("./includes/base.php"); ?>
<?php include("./includes/header.php"); ?>
<?php include("./includes/securityCheck.php"); ?>
<body>
	<div style="width: 100%; padding-top: 20px; height: 95px; background-color: #4671fb;">
	    <div class="wide-width center">
	        <h1 class="fweight-300 white-text" style="margin-bottom: 0px; margin-top:10px;"><?php echo $fnamefinal; ?>ALL COURSES</h1>
	    </div>
	</div>
	<div class="diag-border-bottom"></div>
	<div style="margin-bottom: 40px;"></div>
	<div class="wide-width center">
		<?php
			$result = $connection->query("SELECT COUNT(*) FROM courses;");
	        $row = $result->fetch_array(MYSQLI_ASSOC);
	        $totalCourseNumber = $row['COUNT(*)'];

	        $courseCardElement = "";
	        ?><div id="allcoursecards"><?php
			for($courseCounter = 1; $courseCounter < $totalCourseNumber + 1; $courseCounter++){
				$infoResult = $connection->query("SELECT * FROM courses WHERE CourseID = $courseCounter");
	        	$infoRow = $infoResult->fetch_array(MYSQLI_ASSOC);
	        	$courseName = $infoRow['CourseName'];
	        	$updateCourseName = str_replace(" ", "+", $courseName);
	        	$courseDesc = $infoRow['Description']
	        	?>
	        		<div class="course-card-all" style="height: 360px;">
	        			<div style="background-color: red; height: 50px; width: 50px; z-index: 0;"></div>
	        			<div class="course-top-info">
	  						<?php echo $courseName; ?>
	  						<h6 class="fweight-300 zero-margin" style="margin-top: 5px; margin-bottom: 10px;">
	        				<?php echo $courseDesc; ?>
	        				</h6>
	        				<a class="dark-btn"	href="./course.php?autocourse=<?php echo $updateCourseName; ?>">LEARN MORE</a>
	  					</div>
	  					<div class="diag-course">
	  				</div>
	        			<!--<span class="fweight-700 zero-margin oswald-text font18"></span>-->
	        			<!--<img style="margin-top: 5px; border-radius: 3px;"
	        			src="http://bestinspired.com/wp-content/uploads/2015/03/beautiful-nature-wallpapers-.jpg"
	        			width="202.5"/>-->
	        			<!--<h6 class="fweight-300 zero-margin" style="margin-top: 5px; margin-bottom: 10px;">
	        			</h6>-->
	        			
	        		</div>
	        	<?php
			}
			?></div><?php
		?>
	</div>
</body>
<?php include("./includes/footer.php"); ?>