<?php include 'includes/header.include' ?>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post"><!--Down for temporary maintenance. Or because I broke something. Probably both.-->
					<h2 class="title"><a href="/zombify.php">Zombification</a></h2>
					<?php if ($_SERVER['REQUEST_METHOD'] != 'POST'){
					echo "
					<div class='entry'>
						<div id='fancyform' class='box'>
                        <form name='zombify' action='zombify.php' method='post'>
							<label>This form is for use by a zombie when they have successfully tagged a human. 
							The zombie will need to enter their OWN NetID, followed by the killcode of the human they have tagged.<br /><br />
							The Cornell NetID should be your initials, followed by a number. (There were however, some people who mistakenly registered with their 7-digit student ID. If you suspect you are one of these people, you should enter this instead.) <br /><br /> If you have any problems with zombification, please email one of the moderators with the name and killcode of your victim and we will make sure they are zombified. <br /> <br />Note (10/19) : The website is running a bit slow right now. If you can't zombify, wait a couple of hours and try again. Hopefully it will be resolved soon. 

							</label>
                            <label>
                            <span>Zombie's Cornell Net Id:</span>
                            <input type='text' name='netid' style='width:70px;' value='' class='input_text'/> @cornell.edu
                            </label>
                            <label>
                            <span>Killcode of Human:</span>
                            <input type='text' name='killcode'style='width:150px;' value='' class='input_text'/>
                            </label>
                            <label>
                            <span></span>
                            <input type='submit' name='submit' class='button' id='submit_btn' value='Submit' />
                            </label>
                        </form>
                        </div>
					</div>
					";
					}
					else {
					$netid = ereg_replace("[^A-Za-z0-9]", "", $_POST['netid'] );
					$killcode = ereg_replace("[^A-Za-z0-9]", "", $_POST['killcode']);

					
					$con = mysql_connect("instantkittenscom1.ipagemysql.com","cornellhvz","ZaI0oHDsgV52ZzGt");
					if (!$con){
						die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("hvz", $con);
					
					$sql = "SELECT *
					FROM `users`
					WHERE `killcode` LIKE '$killcode'
					LIMIT 0 , 30";
					$result = mysql_query($sql);
					$victim = mysql_fetch_array($result);
					$sql = "SELECT *
					FROM `users`
					WHERE `netid` LIKE '$netid'
					LIMIT 0 , 30";
					$result = mysql_query($sql);
					$killer = mysql_fetch_array($result);
					
					$victimfirst = $victim['firstname'];
					$victimlast = $victim['lastname'];
					$killerfirst = $killer['firstname'];
					$killerlast = $killer['lastname'];
					
					if ($victimfirst != "" && $killerfirst != ""){
						$killerid = $killer['id'];
						$victimid = $victim['id'];
						$sql = "UPDATE `users` SET `zombie` = '1'
							WHERE `id` = $victimid LIMIT 1 ;";
						
						$kill = mysql_query($sql);
						if ($kill == 1){
						$ip = $_SERVER['REMOTE_ADDR'];
						$sql = "INSERT INTO log (killer, victim, action, ip)
							VALUES
							('$killerid','$victimid','killed', '$ip');";
						
						$kill = mysql_query($sql);
						echo "
						<div class='entry'>
							<div id='fancyform' class='box'>
							<label><p>Success! Marked $victimfirst $victimlast as killed by $killerfirst $killerlast.
							Have a nice day!<br />";
							if ($kill == 1) { echo "Wrote log.";} else { echo "Log failed :[";}
							echo "</p>
							</label>
							</div>
						</div>";
						}
						else {
						echo "Failed :[ please email me what happened. ryanrapini@gmail.com";
						}
					}
					elseif ($killerfirst == ""){
					echo "
					<div class='entry'>
						<div id='fancyform' class='box'>
						<label>Failed. <p>You entered an invalid netid '$netid'. Try again. If it's still not working, possibly you are 
						just bad at this? Or else it's my fault. Either way, please email me what happened. ryanrapini@gmail.com</p>
						</label>
						</div>
					</div>";
					}
					elseif ($victimfirst == ""){					
					echo "
					<div class='entry'>
						<div id='fancyform' class='box'>
						<label>Failed. <p>Could not find anyone with the killcode '$killcode'. Try again. If it's still not working, possibly you are 
						just bad at this? Or else it's my fault. Either way, please email me what happened. ryanrapini@gmail.com</p>
						</label>
						</div>
					</div>";
					}
					else {
					echo "
					<div class='entry'>
						<div id='fancyform' class='box'>
						<label>Failed. <p>Dunno why. Possibly you are just bad at this? Or else it's my fault. 
						Either way, please email me what happened. ryanrapini@gmail.com</p>
						</label>
						</div>
					</div>";
					}
					;
					
					echo "<br /><a href='/zombify.php'>Go back</a>.";
						mysql_close($con);
					}
					?>
					
				</div>
			</div>
			<!-- end #content -->
			<?php include 'includes/sidebar.include' ?>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
	</div>
</div>
<?php include 'includes/footer.include' ?>