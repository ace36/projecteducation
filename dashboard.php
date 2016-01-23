<?php
    include("./includes/base.php");
    include("./includes/header.php");
    include("./includes/securityCheck.php");
    $username = $_SESSION['Username'];
    $result = $connection->query("SELECT * FROM users WHERE Username = '".$username."'");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $fname = $row['FirstName'];
    $userID = $row['UserID'];
    $lname = strtolower($row['LastName']);
    $fnamelow = strtolower($fname);
    $fnamefinal = strtoupper($fname);
?>
<div style="width: 100%; padding-top: 20px; height: 95px; background-color: #4671fb;">
    <div class="wide-width center">
        <h1 class="fweight-300 white-text" style="margin-bottom: 0px; margin-top:10px;"><?php echo $fnamefinal; ?>'S DASHBOARD</h1>
    </div>
</div>
<div class="diag-border-bottom"></div>
<div class="wide-width center">
    <h5 class="fweight-300 lowgrey-text" style="margin-bottom: 8px; margin-top: 10px;">CURRENT COURSES</h5>
    <?php
        $resultTwo = $connection->query("SELECT c.CourseName FROM users s, courses c, users_courses sc WHERE s.UserID = ".$userID." AND s.UserID=sc.UserID AND sc.courseID = c.courseID");
        $resultThree = $connection->query("SELECT sc.lessonsCompleted FROM users s, courses c, users_courses sc WHERE s.UserID = ".$userID." AND s.UserID=sc.UserID AND sc.courseID = c.courseID");
        $resultFour = $connection->query("SELECT c.numberOfLessons FROM users s, courses c, users_courses sc WHERE s.UserID = ".$userID." AND s.UserID=sc.UserID AND sc.courseID = c.courseID");
        ?><div id="dash-cards"><?php
        while($rowTwo = $resultTwo->fetch_array(MYSQLI_ASSOC)){
            $rowThree = $resultThree->fetch_array(MYSQLI_ASSOC);
            $rowFour = $resultFour->fetch_array(MYSQLI_ASSOC);
            $finalPercent = ($rowThree['lessonsCompleted'] / $rowFour['numberOfLessons']) * 100;
           	?>
                <a class="course-card" href="./lessonView.php?courseID=1"><div style="margin-bottom: 12px;">
                    <h5 class="fweight-400 zero-margin" style="float:left;"><?php echo $rowTwo['CourseName'];?></h5>
                    <h5 class="fweight-400 zero-margin" style="float:right; color:<?php if($finalPercent < 30){ echo "red";}elseif($finalPercent < 75){echo "#4671fb";}else{echo "green";} ?>"><?php echo round($finalPercent, 1); ?> %</h5>
                </div></a>
            <?php
        }
        ?></div>
    <h5 class="fweight-300 lowgrey-text" style="margin-bottom: 8px;">GRADES</h5>
    <div style="height: auto; overflow: hidden">
        <!-- <table style="width:100%; border: 0px; margin-left: -3px;">
        <tr style="text-align: left;">
            <th><h6 class="fweight-300 zero-margin">CLASS NAME</h6></th>
            <th><h6 class="fweight-300 zero-margin">POINTS EARNED</h6></th>
            <th><h6 class="fweight-300 zero-margin">TOTAL POINTS</h6></th>
          </tr>
          <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
          </tr>
          <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
          </tr>
          <tr>
            <td>John</td>
            <td>Doe</td>    
            <td>80</td>
          </tr>
        </table>-->
    </div>
    <h5 class="fweight-300 lowgrey-text" style="margin-bottom: 8px;">IMPROVEMENTS</h5>
    <?php

        /*$rowTwo = $resultTwo->fetch_array(MYSQLI_ASSOC);
        $fnameTwo = $rowTwo['CourseName'];
        $rowThree = $resultTwo->fetch_array(MYSQLI_ASSOC);
        $fnameThree = $rowThree['CourseName'];*/
    ?>
    <h6><a class="light-link" href="./logout.php">logout</a></h6>
    <h6><a class="light-link" href="./allcourses.php">all courses here</a></h6>
</div>