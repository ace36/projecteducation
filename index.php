<?php include "./includes/header.php" ?>
<body onload="homeMarginSet()">
	
	<div id="index-view" class="center" style="z-index: 100; position: relative;">
		<br><br>
		<span class="logo-part-one">ink </span>
		<span class="logo-part-two">academy</span>

		<h1 class="fweight-300 darkgrey-text">WE AIM TO EQUALIZE EDUCATIONAL 
			<span class="raised-highlight">OPPORTUNITIES</span> FOR EVERYONE.</h1>

		<a style="margin-right: 5px;"class="dark-btn" href="./login.php">LOGIN</a>
		<a class="light-btn" href="./signup.php">SIGNUP</a>
		<br><br><br><br><br><br>

		<a href="#stats"><div class="fab center">
			<img style="margin-top: 19px;" width="24" src="http://amyjoberman.com/wp-content/uploads/2015/04/arrow-down-gray-md.png" />
		</div></a>
	</div>

	<div class="diag-border"></div>
	<div id="stats" class="center">
		<div id="inner-stats" class="center">
			<!--<div id="left-stats">
				<div id="pt-counter" style="font-size: 80px;" class="oswald-text fweight-300 grey-text">0</div>
			</div>
			<div id="right-stats">
				<img src="./assets/images/browser.png" height="400"/>
			</div>-->
			<h1 style="text-align: center;"><span class="fweight-300 oswald-text white-text">FOR THE STUDENTS, BY THE STUDENTS.</span></h1>
		</div>
	</div>
	<div class="diag-border-bottom"></div>

	<div class="wide-width center">
		<h1 class="fweight-300">THE TEAM</h1>
		<div class="profileCard" style="margin-right: 20px; margin-bottom: 15px;">
			<img src="http://www.american.edu/uploads/profiles/large/chris_palmer_profile_11.jpg" width="200" />
		</div>
		<div class="profileCard">
			<img src="http://organicthemes.com/demo/profile/files/2012/12/profile_img.png" width="200" />
		</div>
		<div class="profileCard" style="margin-right: 20px; margin-bottom: 15px;">
			<img src="http://www.morganstanley.com/assets/images/people/tiles/adam-parker-large.jpg" width="200" />
		</div>
		<div class="profileCard">
			<img src="http://www.morganstanley.com/assets/images/people/tiles/michael-asmar.jpg" width="200" />
		</div>
		<div class="profileCard" style="margin-right: 20px; margin-bottom: 15px;">
			<img src="http://www.morganstanley.com/assets/images/people/tiles/karlene-quigley-large.jpg" width="200" />
		</div>
		<div class="profileCard">
			<img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Daniel_Ingram_Profile.png" width="200" />
		</div>
	</div>

	<!--SCRIPTS-->
	<script>
		function homeMarginSet() {
			var winHeight = $(window).height();
			var winHeightMod = ((winHeight-528)/2)
			$('#index-view').css("margin-top", winHeightMod)
			$('#index-view').css("margin-bottom", winHeightMod/3)
			/*$('#stats').css("height", winHeight)*/
		}
	</script>
	<script>
		$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
	</script>
	<script>
		var options = {
			useEasing : true, 
			useGrouping : true, 
			separator : ',', 
			decimal : '.', 
			prefix : '', 
			suffix : '' 
		};

		var demo = new CountUp("pt-counter", 0, 364, 0, 3, options);
		demo.start();
	</script>
	<!--SCRIPTS-->

</body>
<?php include "./includes/footer.php" ?>