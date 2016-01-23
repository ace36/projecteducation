<?php include("./includes/base.php"); ?>
<?php include("./includes/securityCheck.php"); ?>
<?php include("./includes/header.php");

$username = $_SESSION['Username'];

$result = $connection->query("SELECT * FROM users WHERE Username = '".$username."'");
$row = $result->fetch_array(MYSQLI_ASSOC);
$UserID = $row['UserID'];

$courseID = $_GET["courseID"];
$resultTwo = $connection->query("SELECT * FROM courses WHERE courseID = ".$courseID."");
$rowTwo = $resultTwo->fetch_array(MYSQLI_ASSOC);
$courseName = $rowTwo['CourseName'];
$sqlAddUser = "INSERT INTO users_courses (UserID, CourseID) VALUES ($UserID, $courseID)";
$connection->query($sqlAddUser);
?>
<div class="wide-width center">
	<h1 class="fweight-300">CONGRATULATIONS!</h1>
	<h6 class="fweight-300" style="margin-bottom: 15px;">YOU'VE SUCCESSFULLY JOINED <span class="fweight-700"><?php echo $courseName; ?>!</span> WE WISH YOU GODSPEED AND GOOD FORTUNE AHEAD!</h6>
	<a class="dark-btn" style="margin-top: 0px;" href="./lessonView.php?courseID=<?php echo $courseID; ?>">FIRST LESSON</a>
	<a class="light-btn" style="margin-top: 0px;" href="./dashboard.php">DASHBOARD</a>
</div>