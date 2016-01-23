<?php
include("./includes/base.php");
include("./includes/header.php");
include("./includes/securityCheck.php");

$username = $_SESSION['Username'];
$result = $connection->query("SELECT * FROM users WHERE Username = '".$username."'");
$row = $result->fetch_array(MYSQLI_ASSOC);
$UserID = $row['UserID'];
$courseID = $_GET["courseID"];
$resultTwo = $connection->query("SELECT currentLessonID FROM users_courses WHERE UserID = ".$UserID." and CourseID = ".$courseID."");
$rowTwo = $resultTwo->fetch_array(MYSQLI_ASSOC);
$resultThree = $connection->query("SELECT CourseName FROM courses WHERE CourseID = ".$courseID."");
$rowThree = $resultThree->fetch_array(MYSQLI_ASSOC);
$editCourseName = strtolower($rowThree['CourseName']);
$editCourseName = str_replace(" ", "_", $editCourseName);
$currentLessonID = $rowTwo['currentLessonID'];
$resultFour = $connection->query("SELECT * FROM ".$editCourseName." WHERE lessonID = ".$currentLessonID."");
$rowFour = $resultFour->fetch_array(MYSQLI_ASSOC);
?>
<div style="width: 100%; height: 50px; background-color: #4671fb;">
	<div class="wide-width center"></div>
</div>
<div class="diag-border-bottom"></div>
<div style="width: 750px;"class="wide-width center">
	<h1 class="fweight-300"><?php echo $rowFour['lessonTitle']; ?></h1>
	<h6>ABISHEK CHOZHAN</h6>
	<div style="line-height: 30px;"><p class="fweight-300"><?php echo $rowFour['lessonContent']; ?></p></div><br>
	<a class="light-btn" href="./lessonView.php">CONTENTS</a>
	<a class="dark-btn" href="./lessonView.php">TO QUIZ</a>
</div>
<?php include "./includes/footer.php" ?>