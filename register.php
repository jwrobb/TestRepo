<?php

if($_POST["city"]) {

    require_once 'lib/header.php';

    $city = $_POST['city'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $lic = $_POST['lic'];
    $business = $_POST['business'];
    $specialty = $_POST['specialty'];
    $meal = $_POST['meal'];
    $patientPercent = $_POST['patientPercent'];
    $patientAge = $_POST['patientAge'];
    $date = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $queryString = "INSERT INTO insideedge_form_reg (regCity,fname,lname,email,lic,business,specialty,meal,patientPercent,patientAge,date,ip) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = $dbObj->stmt_init();

    if($stmt->prepare($queryString)) {
           
        $stmt->bind_param('ssssssssssss',$city,$fname,$lname,$email,$lic,$business,$specialty,$meal,$patientPercent,$patientAge,$date,$ip);
        $stmt->execute();
        $stmt->close();
    }
    
    $emailMsg = "Thank you " . $fname . " " . $lname .", for registering for the discussion being held in $city<br>
        This email confirms that your information has been successfully saved and you will receive formal registration information at this email address within 48 hours.";
    $emailFrom = "registration@fakedomain.com";
    $emailSubject = "Event Registration";
    
    $emailhdrs = "From: " . strip_tags($emailFrom) . "\r\n";
    $emailhdrs .= "Reply-To: ". strip_tags($emailFrom) . "\r\n";
    //$emailhdrs .= "CC: blah@blah.com\r\n";
    $emailhdrs .= "MIME-Version: 1.0\r\n";
    $emailhdrs .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    mail($email, $emailSubject, $emailMsg, $emailhdrs);
    
}

?>
