<?php include("./includes/base.php"); ?>
<?php include("./includes/securityCheck.php"); ?>
<?php include("./includes/header.php");

$username = $_SESSION['Username'];

$result = $connection->query("SELECT * FROM users WHERE Username = '".$username."'");
$row = $result->fetch_array(MYSQLI_ASSOC);
$UserID = $row['UserID'];
echo $UserID;

$courseID = $_GET["courseID"];
echo $courseID;
$sqlDeleteUser = "DELETE FROM users_courses WHERE UserID = ".$UserID." and CourseID = ".$courseID."";
$connection->query($sqlDeleteUser);
?>