<?PHP
	header("Location: http://qsconference.com"); //Redirect URL
	
	//POST content from form to variables
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$birthdate = $_POST["birthdate"];
	$email = $_POST["email"];
	$university = $_POST["university"];
	$program = $_POST["program"];
	$major = $_POST["major"];
	$yearOfStudy = $_POST["yearOfStudy"];
	$dinnerPref = $_POST["dinnerPref"];
	$dietRest = $_POST["dietRest"];
	$roommatePref = $_POST["roommatePref"];
	$photoConsent = $_POST["photoConsent"];
	$table = $_POST["ticketType"];
	$q1 = $_POST["q1"];
	$q2 = $_POST["q2"];
	$q3 = $_POST["q3"];
	$file = $_POST["resume"];
	
	if($university == "Other"){
		$university = $_POST["universityOtherVal"];
		$coordinator = 'Alex Shieck';
		$inex = "External";
	}
	else{
		$coordinator = 'Michaela Thomas';
		$inex = "Internal";
	}
	if($yearOfStudy == "Other"){
		$yearOfStudy = $_POST["yearOfStudyOtherVal"];
	}
	
	$servername = "qsconference.com.mysql";
	$username = "qsconference_com";
	$password = "qsc2016";
	$dbname = "qsconference_com";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql1 = "SELECT ID FROM ".$table."";
	$result = $conn->query($sql1);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$id += 1;
			echo "id: " . $row["ID"] . "<br>";
		}
	} else {
		echo "0 results <br>";
	}
	
	if(($id >= 20 && $table == "general") || ($id >= 5 && $table == "platinum")){
		$status = "At this time we have received our maximum number of applications for our Early Bird Ticket Sales. Your application has been added to our wait list and you will be informed of any changes in the status of your application.";
		$waitlisted = "yes";
	} else{
		$status = "We are currently reviewing your application and will respond within the next 5 days.";
		$waitlisted = "no";
	}
	
	$sql2 = "INSERT INTO `".$table."`(`firstName`, `lastName`, `birthdate`, `email`, `university`, `program`, `major`, `yearOfStudy`, `dinnerPref`, `dietRest`, `roommatePref`, `photoConsent`, `waitlisted`, `q1`, `q2`, `q3`, `resume`) 
	VALUES ('".$firstName."','".$lastName."','".$birthdate."','".$email."','".$university."','".$program."','".$major."','".$yearOfStudy."','".$dinnerPref."','".$dietRest."','".$roommatePref."','".$photoConsent."','".$waitlisted."','".$q1."','".$q2."','".$q3."','".$file."')";
	
	if ($conn->query($sql2) === TRUE) {
		echo "New record created successfully<br>";
	} else {
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}

	$conn->close();
	
	
	//Prepare Email
	$to1 = "qsconference@gmail.com";
	$to2 = $email;
	$subject1 = $firstName." ".$lastName." has applied to QSC 2016!";
	$subject2 = "Thank you for applying to QSC 2016!";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: z.harley@qsconference.com\r\n";
	
	$my_message = '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/"> <head>
	
	<meta property="fb:page_id" content="43929265776" />        
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<!-- Facebook sharing information tags -->
	<meta property="og:title" content="Queen&#039;s Space Conference: Delegate Application Confirmation">
	
	<title>Queen&#039;s Space Conference: Delegate Application Confirmation</title>
	
	<style type="text/css">
		#outlook a{
		padding:0;
		}
		body{
		width:100% !important;
		}
		.ReadMsgBody{
		width:100%;
		}
		.ExternalClass{
		width:100%;
		}
		body{
		-webkit-text-size-adjust:none;
		}
		body{
		margin:0;
		padding:0;
		}
		img{
		border:0;
		height:auto;
		line-height:100%;
		outline:none;
		text-decoration:none;
		}
		table td{
		border-collapse:collapse;
		}
		#backgroundTable{
		height:100% !important;
		margin:0;
		padding:0;
		width:100% !important;
		}
		body,#backgroundTable{
		background-color:#FAFAFA;
		}
		#templateContainer{
		border:1px solid #DDDDDD;
		}
		h1,.h1{
		color:#202020;
		display:block;
		font-family:Arial;
		font-size:34px;
		font-weight:bold;
		line-height:100%;
		margin-top:0;
		margin-right:0;
		margin-bottom:10px;
		margin-left:0;
		text-align:left;
		}
		h2,.h2{
		color:#202020;
		display:block;
		font-family:Arial;
		font-size:30px;
		font-weight:bold;
		line-height:100%;
		margin-top:0;
		margin-right:0;
		margin-bottom:10px;
		margin-left:0;
		text-align:left;
		}
		h3,.h3{
		color:#202020;
		display:block;
		font-family:Arial;
		font-size:26px;
		font-weight:bold;
		line-height:100%;
		margin-top:0;
		margin-right:0;
		margin-bottom:10px;
		margin-left:0;
		text-align:left;
		}
		h4,.h4{
		color:#202020;
		display:block;
		font-family:Arial;
		font-size:22px;
		font-weight:bold;
		line-height:100%;
		margin-top:0;
		margin-right:0;
		margin-bottom:10px;
		margin-left:0;
		text-align:left;
		}
		#templatePreheader{
		background-color:#FAFAFA;
		}
		.preheaderContent div{
		color:#505050;
		font-family:Arial;
		font-size:10px;
		line-height:100%;
		text-align:left;
		}
		.preheaderContent div a:link,.preheaderContent div a:visited,.preheaderContent div a .yshortcuts {
		color:#336699;
		font-weight:normal;
		text-decoration:underline;
		}
		#templateHeader{
		background-color:#FFFFFF;
		border-bottom:0;
		}
		.headerContent{
		color:#202020;
		font-family:Arial;
		font-size:34px;
		font-weight:bold;
		line-height:100%;
		padding:0;
		text-align:center;
		vertical-align:middle;
		}
		.headerContent a:link,.headerContent a:visited,.headerContent a .yshortcuts {
		color:#336699;
		font-weight:normal;
		text-decoration:underline;
		}
		#headerImage{
		height:auto;
		max-width:600px;
		}
		#templateContainer,.bodyContent{
		background-color:#FFFFFF;
		}
		.bodyContent div{
		color:#505050;
		font-family:Arial;
		font-size:14px;
		line-height:150%;
		text-align:left;
		}
		.bodyContent div a:link,.bodyContent div a:visited,.bodyContent div a .yshortcuts {
		color:#336699;
		font-weight:normal;
		text-decoration:underline;
		}
		.bodyContent img{
		display:inline;
		height:auto;
		}
		#templateFooter{
		background-color:#FFFFFF;
		border-top:0;
		}
		.footerContent div{
		color:#707070;
		font-family:Arial;
		font-size:12px;
		line-height:125%;
		text-align:left;
		}
		.footerContent div a:link,.footerContent div a:visited,.footerContent div a .yshortcuts {
		color:#336699;
		font-weight:normal;
		text-decoration:underline;
		}
		.footerContent img{
		display:inline;
		}
		#social{
		background-color:#FAFAFA;
		border:0;
		}
		#social div{
		text-align:center;
		}
		#utility{
		background-color:#FFFFFF;
		border:0;
		}
		#utility div{
		text-align:center;
		}
		#monkeyRewards img{
		max-width:190px;
		}
		</style></head> <body id="archivebody"> 
        <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="-webkit-text-size-adjust: none;margin: 0;padding: 0;background-color: #FAFAFA;width: 100% !important;">
			<center>
				<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable" style="margin: 0;padding: 0;background-color: #FAFAFA;height: 100% !important;width: 100% !important;">
					<tr>
						<td align="center" valign="top" style="border-collapse: collapse;">
							<!-- // Begin Template Preheader \\ -->
							<table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader" style="background-color: #FAFAFA;">
								<tr>
									<td valign="top" class="preheaderContent" style="border-collapse: collapse;">
										
										<!-- // Begin Module: Standard Preheader \ -->
										<table border="0" cellpadding="10" cellspacing="0" width="100%">
											<tr>
												<td valign="top" style="border-collapse: collapse;">
													<div style="color: #505050;font-family: Arial;font-size: 10px;line-height: 100%;text-align: left;"><p class="p1">Welcome to the Queen&#39;s Space Conference mailing list. We&#39;ll keep you up to date with the latest information about conference speakers, timeline, and events.</p>
													</div>
												</td>
												<!--  -->
											</tr>
										</table>
										<!-- // End Module: Standard Preheader \ -->
										
									</td>
								</tr>
							</table>
							<!-- // End Template Preheader \\ -->
							<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer" style="border: 1px solid #DDDDDD;background-color: #FFFFFF;">
								<tr>
									<td align="center" valign="top" style="border-collapse: collapse;">
										<!-- // Begin Template Header \\ -->
										<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader" style="background-color: #FFFFFF;border-bottom: 0;">
											<tr>
												<td class="headerContent" style="border-collapse: collapse;color: #202020;font-family: Arial;font-size: 34px;font-weight: bold;line-height: 100%;padding: 0;text-align: center;vertical-align: middle;">
													
													<!-- // Begin Module: Standard Header Image \\ -->
													<img src="https://gallery.mailchimp.com/eaab54b1a8add0f6fd50dbaf7/images/ea41bb8d-a5f1-4a26-a7bf-0117b9e417f4.png" alt="" border="0" style="border-style: none;margin: 0;padding: 0;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;">
													<!-- // End Module: Standard Header Image \\ -->
													
												</td>
											</tr>
										</table>
										<!-- // End Template Header \\ -->
									</td>
								</tr>
								<tr>
									<td align="center" valign="top" style="border-collapse: collapse;">
										<!-- // Begin Template Body \\ -->
										<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
											<tr>
												<td valign="top" class="bodyContent" style="border-collapse: collapse;background-color: #FFFFFF;">
													
													<!-- // Begin Module: Standard Postcard Content \\ -->
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr mc:repeatable="repeat_1" mc:repeatindex="0" mc:hideable="hideable_repeat_1_1" mchideable="hideable_repeat_1_1">
															<td valign="top" style="border-collapse: collapse;">
																<table border="0" cellpadding="20" cellspacing="0" width="100%">
																	<tr>
																		<td valign="top" style="border-collapse: collapse;">
																			<div style="color: #505050;font-family: Arial;font-size: 14px;line-height: 150%;text-align: left;"></div>
																			<h2 class="null" style="color: #202020;display: block;font-family: Arial;font-size: 30px;font-weight: bold;line-height: 100%;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;"><span style="color:#8B4513"><span style="font-size:18px"><span style="font-family:arial,helvetica neue,helvetica,sans-serif">QSC 2016: Delegate Application Confirmation	</span></span></span></h2>
																			
																			<div style="color: #505050;font-family: Arial;font-size: 14px;line-height: 150%;text-align: left;">Hi '.$firstName.',<br>
																				<br>
																				Thanks for applying to be a Queen&#39;s Space Conference 2016 Delegate! '.$status.'Below is the information which was entered into your application:<br>
																				<br>
																				<table>
																					<tr>
																						<td style="width:300px;padding:05px 10px 0px 0px;">First Name</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$firstName.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Last Name</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$lastName.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Birthdate</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$birthdate.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Email</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$email.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">University</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$university.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Program</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$program.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Major</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$major.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Year of Study</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$yearOfStudy.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Dinner Preference</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$dinnerPref.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Dietary Restrictions/Allergies</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$dietRest.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Who would you like to room with at QSC 2016?</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$roommatePref.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Do you agree to having your photo released in official QSC media Posts?</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$photoConsent.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Type of ticket:</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$table.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">How did you hear about QSC, and what was the ‘tipping point’ that made you want to apply?</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$q1.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">What topics/speakers are you hoping to cover at the conference?</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$q2.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Describe an event where you experienced the impact of space and the space industry on your life.</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$q3.'</td>
																					</tr>
																					<tr>
																						<td style="width:300px;padding:0px 10px 0px 0px;">Link to my resume</td>
																						<td style="width:300px;padding:0px 0px 0px 10px;">'.$file.'</td>
																					</tr>
																				</table>
																				<br>
																				If you have any questions or concerns please feel free to contact me. <br>
																			<br>
																			<br>
																			Cheers,<br>
																			<br>
																			'.$coordinator.'<br>
																			<span style="font-size:12px">'.$inex.' Delegates Coordinator<br>
																			Queen&#39;s Space Conference 2016<br>
																			'.$inex.'@qsconference.com</span><br>
																			&nbsp;</div>
																			</td>
																			</tr>
																			</table>
																			</td>
																			</tr>
																			</table>
																			<!-- // End Module: Standard Postcard Content \\ -->
																			
																			</td>
																			</tr>
																			</table>
																			<!-- // End Template Body \\ -->
																			</td>
																			</tr>
																			<tr>
																			<td align="center" valign="top" style="border-collapse: collapse;">
																			<!-- // Begin Template Footer \\ -->
																			<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter" style="background-color: #FFFFFF;border-top: 0;">
																			<tr>
																			<td valign="top" class="footerContent" style="border-collapse: collapse;">
																			
																			<!-- // Begin Module: Standard Footer \\ -->
																			<table border="0" cellpadding="10" cellspacing="0" width="100%">
																			<tr>
																			<td colspan="2" valign="middle" id="social" style="border-collapse: collapse;background-color: #FAFAFA;border: 0;">
																			<div style="color: #707070;font-family: Arial;font-size: 12px;line-height: 125%;text-align: center;"><span style="font-size:13px">Twitter: @QSConference | Facebook: Queen&#39;s Space Conference<br>
																			Website: www.QSConference.com | Instagram: queensspace</span></div>
																			</td>
																			</tr>
																			<tr>
																			<td valign="top" width="350" style="border-collapse: collapse;">
																			<div style="color: #707070;font-family: Arial;font-size: 12px;line-height: 125%;text-align: left;"><strong>Contact us at:<br>
																			QSConference@gmail.com</strong><br>
																			<br>
																			&nbsp;</div>
																			</td>
																			<td valign="top" width="190" id="monkeyRewards" style="border-collapse: collapse;">
																			<div style="color: #707070;font-family: Arial;font-size: 12px;line-height: 125%;text-align: left;"></div>
																			</td>
																			</tr>
																			<tr>
																			<td colspan="2" valign="middle" id="utility" style="border-collapse: collapse;background-color: #FFFFFF;border: 0;">
																			<div style="color: #707070;font-family: Arial;font-size: 12px;line-height: 125%;text-align: center;">
																			&nbsp;<a href="http://QSConference.us3.list-manage1.com/unsubscribe?u=eaab54b1a8add0f6fd50dbaf7&id=75f4d6cdb0&e=641bd14a53&c=c4be222dd2" style="color: #336699;font-weight: normal;text-decoration: underline;">unsubscribe from this list</a> | <a href="http://QSConference.us3.list-manage.com/profile?u=eaab54b1a8add0f6fd50dbaf7&id=75f4d6cdb0&e=641bd14a53" style="color: #336699;font-weight: normal;text-decoration: underline;">update subscription preferences</a>&nbsp;
																			</div>
																			</td>
																			</tr>
																			</table>
																			<!-- // End Module: Standard Footer \\ -->
																			
																			</td>
																			</tr>
																			</table>
																			<!-- // End Template Footer \\ -->
																			</td>
																			</tr>
																			</table>
																			<br>
																			</td>
																			</tr>
																			</table>
																			</center>
																			</body>    </body> </html>';
	$this_mail1 = mail($to1, $subject1, $my_message, $headers);
	
	if ($this_mail1) echo 'sent qsc 52 <br>';
	else echo error_message;
	
	$this_mail2 = mail($to2, $subject2, $my_message, $headers);
	
	if ($this_mail2) echo 'sent user 52 <br>';
	else echo error_message;
	
	exit;
?>