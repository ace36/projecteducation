<?php
    include("./includes/base.php");
    include("./includes/header.php");
    
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    if(!empty($_SESSION['Username']) && !empty($_SESSION['LoggedIn'])){
        echo "Member Area";
        ?>
            <a href="./dashboard.php">dashboard</a>
        <?php
    }
    elseif(!empty($_POST['username']) && !empty($_POST['password'])){
        $result = $connection->query("SELECT * FROM users WHERE Username = '".$username."'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $hash = $row['Password'];
        
        if(password_Verify($password, $hash)){
            $_SESSION['Username'] = $username;
            $_SESSION['LoggedIn'] = 1;

            echo "Success";
            echo "Welcome ".$_SESSION['Username']." !";
            ?>
                Member area
                <a href="./dashboard.php">dashboard</a>
            <?php
        }
        else{
            ?><body onload="loginMarginSet()">
                <div id="login-form-wrapper">
                    <div id="right-login">
                        <div id="login-form" class="center">
                            <span class="logo-part-one">elements</span><br><br>
                            
                            <span style="color: #FA1111"class="oswald-text fweight-300 font18">INCORRECT CREDENTIALS.</span><br><br>
                            <form method="post">
                                <input class="light-input" type="text" placeholder="USERNAME" id="username" name="username"/><br><br>
                                <input class="light-input" type="password" placeholder="PASSWORD" id="password" name="password"/><br><br>
                                <a href="login.php">
                                    <input type="submit" value="LOGIN" />
                                </a>
                            </form>
                        </div>
                    </div>
                    <div id="left-picture">
                        <img src="./assets/images/adastra.jpg" width="1200"/>
                    </div>
                </div>

                <script>
                    function loginMarginSet() {
                        var winHeight = $(window).height();
                        var winHeightMod = ((winHeight-242)/2)
                        $('#login-form').css("margin-top", winHeightMod)
                    }
                </script>
            </body><?php
        }
    }
    else{
?>
<body onload="loginMarginSet()">
    <div id="login-form-wrapper">
        <div id="right-login">
            <div id="login-form" class="center">
                <span class="logo-part-one">ink academy</span><br><br>
                
                <span class="oswald-text fweight-300 font18">LET'S GET YOU LOGGED IN!</span><br><br>
                <form method="post">
                    <input class="light-input" type="text" placeholder="USERNAME" id="username" name="username"/><br><br>
                    <input class="light-input" type="password" placeholder="PASSWORD" id="password" name="password"/><br><br>
                    <a href="login.php">
                        <input type="submit" value="LOGIN" />
                    </a>
                </form>
            </div>
        </div>
        <div id="left-picture">
            <img src="./assets/images/adastra.jpg" width="1200"/>
        </div>
    </div>

    <script>
        function loginMarginSet() {
            var winHeight = $(window).height();
            var winHeightMod = ((winHeight-242)/2)
            $('#login-form').css("margin-top", winHeightMod)
        }
    </script>
</body>
<?php
    }
?>