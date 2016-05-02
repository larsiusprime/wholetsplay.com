<?php

$EmailFrom = "no-reply@wholetsplay.com";
$EmailTo = "contact@wholetsplay.com";
$Subject = "Contact from Who Let's Play";
$Name = Trim(stripslashes($_POST['name'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['message']));
$Check = Trim(stripslashes($_POST['check']));


// validation
$validationOK = intval($Check) == 6;

if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactResult.php?error=validation\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: " . $Name;
$Body .= "\n";
$Body .= "Email: " .  $Email;
$Body .= "\n";
$Body .= "Message: " .  $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactResult.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactResult.php?error=sending\">";
}
?>