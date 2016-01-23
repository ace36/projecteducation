<?php
    include("./includes/base.php");
    include("./includes/header.php");

    $username = mysql_real_escape_string($_POST['username']);
    $passwordhash = password_hash(mysql_real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $email = mysql_real_escape_string($_POST['email']);
    $firstname = mysql_real_escape_string($_POST['firstname']);
    $lastname = mysql_real_escape_string($_POST['lastname']);
    $resultTwo = "SELECT Username FROM users";
    $isExist = true;
    
    if(!empty($username) && !empty($passwordhash) && !empty($email) && !empty($firstname) && !empty($lastname) 
       && $_POST['password'] == $_POST['passwordrepeat'] && $isExist == true){ 
        $sqlAddUser = "INSERT INTO users (Username, Password, FirstName, LastName, EmailAddress)
            VALUES ('".$username."', '".$passwordhash."', '".$firstname."', '".$lastname."', '".$email."')";
        $connection->query($sqlAddUser);
        $sqlAddGradeRow = "INSERT INTO grades (Username) VALUES ('".$username."')";
        $connection->query($sqlAddGradeRow);
    }
?>
    <div style="width: 100%; padding-top: 20px; height: 30px; background-color: #4671fb;">
        <div class="wide-width center">
            <span class="logo-part-one" style="color: white;">ink.academy</span>
        </div>
    </div>
    <div class="diag-border-bottom" style="margin-bottom: 58px;"></div>
    <div id="signup-form-wrapper" style="margin-bottom: -25px;" class="bottom-object wide-width center">
        <form onsubmit="return validateForm()" name="signuptrueform" method="post" action="signup.php" id="signupform">
            <h4 class="fweight-300 zero-margin">NAME AND EMAIL</h4><br>
            <input class="light-input" type="text" name="firstname" id="firstname" placeholder="FIRST NAME" /><br><br>
            <input class="light-input" type="text" name="lastname" id="lastname" placeholder="LAST NAME" /><br><br>
            <input class="light-input" type="text" name="email" id="email" placeholder="EMAIL" /><br><br><br>
            
            <h4 class="fweight-300 zero-margin">USERNAME AND PASSWORD</h4><br>
            <input class="light-input" type="text" name="username" id="username" placeholder="USERNAME" /><br><br>
            <input class="light-input" type="password" name="password" id="password" placeholder="PASSWORD" /><br><br>
            <input class="light-input" type="password" name="passwordrepeat" id="passwordrepeat" placeholder="REPEAT PASSWORD" /><br><br>
            
            <a href="login.php">
                <input type="submit" value="SORRY!" name ="signup" id="signup" />
            </a>
        </form>
        <div id="signup-text-right">
            <h2>
            </h2>
        </div>
    </div>

<?php include("./includes/footer.php"); ?>