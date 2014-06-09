<?php

if($_GET['cc']) {

    require_once 'lib/header.php';
        
    $stmt =  $dbObj->stmt_init();
    if($stmt->prepare("SELECT * from insideedge_form_cfg where city = ?")) {
    
        $stmt->bind_param('s',$_GET['cc']);
        $stmt->execute();
        $stmt->bind_result($id,$city,$cityCode,$date,$location,$socName,$prgTitle,$speaker,$speakerTitle,$mod,$modTitle,$eventName,$intro,$outtro);
        $stmt->fetch();

        $time = new DateTime($date);
        $f_date = $time->format('M-j-Y');
        $f_time = $time->format('h:i a');
        
        $cityArray = array(
                'id'=>$id,
                'city'=>$city,
                'cityCode'=>$cityCode,
                'date'=>$f_date,
                'time'=>$f_time,
                'location'=>$location,
                'socName'=>$socName,
                'prgTitle'=>$prgTitle,
                'speaker'=>$speaker,
                'speakerTitle'=>$speakerTitle,
                'mod'=>$mod,
                'modTitle'=>$modTitle,
                'eventName'=>$eventName,
                'intro'=>$intro,
                'outtro'=>$outtro);

        echo(json_encode($cityArray));

        $stmt->close();
    }
    
    $dbObj->close();
}

?>
