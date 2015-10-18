<?php
require_once 'core/init.php';

$user = new User();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
			createHeader(0, "Thunderbots 5604");
		?>
    </head>
    
    <body>
        <div class="nav" id="top-buttons">
            <div class="container">
                <ul class="pull-left">
                    <li><a href="https://github.com/Thunderbots5604">Github</a></li>
                    <li><a href="resources.html">Resources</a></li>
                </ul>
                <center><div align="center" id="nav-picture-div"><a href="index.html"><img src="css/img/thunderbots_logo.PNG" alt="Thunderbots Logo" id="nav-picture"/></a></div><center>
                <ul class="pull-right">
				<?php
					if ($user->isLoggedIn()) {
						$escaped_name = escape($user->data()->username);
						?>
						<li><a href="<?php echo 'profile.php?user=' . $escaped_name; ?>" target="_blank">Profile</a></li>
						<li><a href="logout.php" target="_blank">Log Out</a></li>
					<?php
					} else {
						?>
                    <li><a href="error.html" target="_blank">Sign Up</a></li>
                    <li><a href="error.html" target="_blank">Log In</a></li>
					<?php } ?>
                </ul>
				<?php
				if (Session::exists('home')) {
					?>
				<div class="very-large-space"></div>
                <div class="alert alert-info">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong><?php echo Session::flash('home'); ?></strong>
                </div>
				<?php
				}
				?>
				<?php
				if ($user->isLoggedIn() && ($user->hasPermission('admin') || $user->hasPermission('moderator'))) {
					$msg = $user->hasPermission('admin') ? 'Administrator' : 'Moderator';
					?>
				<div class="very-large-space"></div>
                <div class="alert alert-info">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Welcome <?php echo $msg; ?>!</strong>
                </div>
				<?php
				}
				?>
            </div>
        </div>
        
        <div class="jumbotron">
            <div class="container">
                <h1>Thunderbots 5604</h1>
                <p>Mountain View High School's Robotics Team</p>
                <a href="#learn-more">Learn More ></a>
            </div>
        </div>
        
        <div class="space"></div>
        
        <div class="navigation-buttons" id="learn-more">
            <div class="container">
                <div class="col-sm-4 col-lg-2">
                    <a href="index.html">
                        <div class="nav-button">Home</div>
                    </a>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <a href="events.html">
                        <div class="nav-button">Events</div>
                    </a>
                </div>  
                <div class="col-sm-4 col-lg-2">
                    <a href="community.html">
                        <div class="nav-button">Community</div>
                    </a>
                </div>
                <div class="very-large-space hidden-lg hidden-xs"></div>
                <div class="col-sm-4 col-lg-2">
                    <a href="sponsors.html">
                        <div class="nav-button">Sponsors</div>
                    </a>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <a href="first.html">
                        <div class="nav-button">What is FIRST?</div>
                    </a>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <a href="team.html">
                        <div class="nav-button">Team</div>


                    </a>
                </div>
            </div>
        </div>
        
        <div class="space"></div>
        
        <div class="main-content" id="index">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>World Class</h2>
                        <div align="center">
                            <img src="css/img/world_class.jpg" alt="World Class"/>
                        </div>
                        <div class="small-space"></div>
                        <p>We competed in FTC's World Championship in St. Louis, Missouri!</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Hardworking</h2>
                        <div align="center">
                            <img src="css/img/hardworking.jpg" alt="Hardworking"/>
                        </div>
                        <div class="small-space"></div>
                        <p>We have 2 hour meetings every Monday, Wednesday, and Friday to work, learn, and experiment.</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Talented</h2>
                        <div align="center">
                            <img src="css/img/talented.jpg" alt="Talent"/>
                        </div>
                        <div class="small-space"></div>
                        <p>From our experienced programmers to our creative builders, Thunderbots 5604 is filled with genuine talent.</p>
                    </div>
                </div>
                <div class="video">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="extra-large-space"></div>
                            <h2 align="center">We are a student-run First Tech Challenge team based at Mountain View High School in Vancouver,  Washington. In 2014, we competed globally in the FTC World Championships. In 2015, we ended first in FTC's Minibot Challenge!</h2>
                        </div>
                        <div class="col-md-6" align="center">
                            <iframe width="569" height="340" src="https://www.youtube.com/embed/0UXArkS5QSM" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>

        <iframe src="footer.html" class="footer" style="width:100%;border:none;height:88px;"></iframe>
        
        
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scroll.js"></script>
    </body>
</html>
