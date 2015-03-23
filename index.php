<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bradley University ACM League Tournament Sign Up</title>
		<meta charset="utf-8">

		<link href="/inc/css/bootstrap/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
		<!--<link href="css/bootstrap-switch.min.css" rel="stylesheet">-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
		<link href="/inc/css/font-awesome/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">

		<script src="/inc/js/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="/inc/js/bootstrap/bootstrap-3.2.0-dist/js/bootstrap.min.js" type="text/javascript"></script>
		<!--<script src="js/bootstrap-switch.min.js" type="text/javascript"></script>-->
		<script src="js/functions.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<center><img src="img/logo.png" class="img-responsive"/></center>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="lol_title">Bradley University League of Legends Tournament Signup!</div>
					<div class="lol_blur">
						<div class="lol_content lol_white">
							<form role="form" id="lol_teamForm">
								<div class="form-group" wrapping="lol_captainName">
									<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Team Captain's Real Name" id="lol_captainName" name="lol_captainName">
								</div>
								<div class="form-group" wrapping="lol_captainEmail">
									<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Team Captain's Email"  id="lol_captainEmail" name="lol_captainEmail">
								</div>
								<div class="form-group" wrapping="lol_captainPhone">
									<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Team Captain's Phone"  id="lol_captainPhone" name="lol_captainPhone">
								</div>
								<div class="form-group" wrapping="lol_teamName">
									<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Team Name"  id="lol_teamName" name="lol_teamName">
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group" wrapping="lol_sName1">
											<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Summoner 1"  id="lol_sName1" name="lol_sName1">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group" wrapping="lol_sName2">
											<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Summoner 2"  id="lol_sName2" name="lol_sName2">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group" wrapping="lol_sName3">
											<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Summoner 3"  id="lol_sName3" name="lol_sName3">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-md-offset-2">
										<div class="form-group" wrapping="lol_sName4">
											<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Summoner 4"  id="lol_sName4" name="lol_sName4">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group" wrapping="lol_sName5">
											<input type="text" class="form-control input-lg lol_formField lol_blur" placeholder="Summoner 5"  id="lol_sName5" name="lol_sName5">
										</div>
									</div>
								</div>

								<div class="form-group" style="text-align:center;" wrapping="">
									<input type="checkbox" id="lol_checkbox" name="lol_checkbox" data-label-text="<span class='fa fa-arrows-h fa-lg'></span>">
									<label class="control-label lol_formLabel" for="lol_checkbox"> I agree to the rules below (Seriously, read these)</label>
								</div>
								<input type="hidden" name="letsSubmit" value="ok" />
								<center>
								<button type="submit" id="lol_submitButton" class="btn btn-success btn-lg lol_button"><span class="lol_emailLoader"></span> Sign me up!</button>
								<div id="lol_message" class="lol_message"></div>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="lol_title">Dates and Facebook Event</div>
					<div class="lol_blur">
						<div class="lol_content lol_white">
							<p>The tournament will take place on November 22-23.</p>
							<p>It will be located in Bradley Hall, in the computer science labs (Right Side, first floor. Rm 150-180).</p>
							<p>A Facebook event is coming soon with more details an exact time very soon!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="lol_title">The Rules</div>
					<div class="lol_blur">
						<div class="lol_content lol_white">
							These are the rules. If something is not clear, please email (sfields@mail.bradley.edu), or speak with her at the event.
							<ol>
								<li><strong>Anything an event coordinator says is FINAL, in case a game issue arises.</strong></li>
								<li>You must read rule #1 again.</li>
								<li>There is a $5 fee per team member paid the day of the tournament in cash, a.k.a. $25 per team ($7 fee per member if you register the day of the tournament).</li>
								<li>Teams of 5. All team members must be physically present at the tournament to participate. They do not have to be Bradley Students.</li>
								<li>Each player must own 16 champions (free week champions count).</li>
								<li>Up until the semi-finals, all rounds will consist of one game, winner moves on. The semi-finals and finals will be best out of 3 games. There will be a consolation bracket as well, so every team will get to play at least 2 games. All games are draft pick.</li>
								<li>We highly recommend you bring your own computer and Ethernet cable if you desire a wired connection. Lab computers will be available for use at your own risk, we are not responsible for their performance. </li>
								<li>All players must abide by Riot's summoner code.</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="lol_title">The Prizes</div>
					<div class="lol_blur">
						<div class="lol_content lol_white">
							<p>There will be a cash prize of $10 per player for the winning team. Each winning team member will also receive the tournament-exclusive Triumphant Ryze skin.<br />The top four teams in the tournament will be given RP prizes as well.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="lol_title">The Facebook Event</div>
					<div class="lol_blur">
						<div class="lol_content lol_white">
							
							(Coming soon)
						</div>
					</div>
				</div>
			</div>
		</div>-->

	</body>
</html>
