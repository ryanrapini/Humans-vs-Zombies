<?php include 'includes/header.include' ?>
<script src="scripts/runonload.js"></script>
<script src="scripts/forms.js"></script>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
					<h2 class="title"><a href="#">Registration:</a></h2>
					<div class="entry">
						<div id="fancyform" class="box">
                        <form name="registration" action="" method="post">
                            <label>
                            <span>First name:</span>
                            <input type="text" name="firstname" id="firstname" size="30" value="" class="input_text"/>
                            </label>
                            <div class="error" for="firstname" id="firstname_error">This field is required.</div>
                            <label>
                            <span>Last name:</span>
                            <input type="text" name="lastname" id="lastname" size="30" value="" class="input_text"/>
                            </label>
                            <div class="error" for="lastname" id="lastname_error">This field is required.</div>
                            <label>
                            <span>Cornell Net ID:</span>
                            <input type="text" name="netid" id="netid" size="30" value="" class="input_text"/>
                            </label>
                            <div class="error" for="netid" id="netid_error">This field is required.</div>
                            <label>
                            <span>Phone Number:</span>
                            <input type="text" name="phone" id="phone" size="30" value="" class="input_text"/>
                            </label>
                            <div class="error" for="phone" id="phone_error">Please enter a valid phone number!</div>
                            <label>
                            <span>Gender:</span>
                            <select name="gender" class="select_drop" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            </label>
                            <div class="error" for="gender" id="gender_error">You must be either male of female!</div>
                            <label>
                            <span>Class Year:</span>
                            <select name="year" class="select_drop" id="year">
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="other">Other</option>
                            </select>
                            </label>
                            <div class="error" for="year" id="year_error" >This field is required.</div>
                            <label>
                            <span></span>
                            <input type="submit" name="submit" class="button" id="submit_btn" value="Submit" />
                            </label>
                        </form>
                        </div>
                        
					</div>
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