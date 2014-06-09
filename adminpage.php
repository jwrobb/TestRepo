<?php
session_start();

if($_SESSION['admin'] != true) {
    header("Location: adminlogin.php");
    die();
}

require_once 'lib/header.php';

$result1 = $dbObj->query("SELECT id,regCity,fname,lname,email,lic,business,specialty,meal,patientPercent,patientAge,date FROM robbins_clients.insideedge_form_reg order by regCity asc;");
    
$allRegs = array();
while($r = $result1->fetch_array(MYSQLI_ASSOC)) {
    $reg["id"] = $r['id'];
    $reg["fname"] = $r['fname'];
    $reg["lname"] = $r['lname'];
    $reg["email"] = $r['email'];
    $reg["lic"] = $r['lic'];
    $reg["business"] = $r['business'];
    $reg["specialty"] = $r['specialty'];
    $reg["meal"] = $r['meal'];
    $reg["patientPercent"] =  $r['patientPercent'];
    $reg["patientAge"] =  $r['patientAge'];
    $reg["date"] = $r['date'];   
    $reg["regCity"] = $r['regCity'];
    
    array_push($allRegs, $reg);    
    unset($reg);
}
$result1->close();


$result2 = $dbObj->query("SELECT distinct(city) FROM insideedge_form_cfg;");

$allCities = array();
while($c = $result2->fetch_array(MYSQLI_ASSOC)) {
    array_push($allCities, $c["city"]);
}

$result2->close();
$dbObj->close();


//Handle an export request
if($_POST["export"] && $_POST["scope"]){
    
    $scope = $_POST["scope"];
    
    download_send_headers("Registrants_" . date("Y-m-d") . "_" . $scope . ".csv");
    
    $exportArray = array();
        
    if($scope != "all") {
        foreach($allRegs as $e_reg) {
            if($e_reg["regCity"] == $scope)
                array_push($exportArray, $e_reg);
        }
    } else {
        $exportArray = $allRegs;
    }
    
    echo array2csv($exportArray);
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration page</title>
        <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.4.custom.css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fixheadertable.css">
        <link rel="stylesheet" href="css/styles.css">


    </head>
    <body>
        <div class="container text-center">
            <h1>Administration Page</h1>

            <h3>All results un-filtered</h3>
            
             <div class="form-actions downloadBtn">
                <form method="post">
                    <button type="submit" class="btn btn-large btn-default">Download all registrations</button>
                    <input type="hidden" name="scope" value="all">
                    <input type="hidden" name="export" value="true">
                </form>
            </div>  
            
            <table id="resultsTable" class="regCityTable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>License</th>
                        <th>Business</th>
                        <th>Specialty</th>
                        <th>Meal</th>
                        <th>Patient Percent</th>
                        <th>Patient Age</th>
                        <th>City</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allRegs as $reg): ?>
                    <tr>
                        <td><?=$reg["fname"]?></td>
                        <td><?=$reg["lname"]?></td>
                        <td><?=$reg["email"]?></td>
                        <td><?=$reg["lic"]?></td>
                        <td><?=$reg["business"]?></td>
                        <td><?=$reg["specialty"]?></td>
                        <td><?=$reg["meal"]?></td>
                        <td><?=$reg["patientPercent"]?></td>
                        <td><?=$reg["patientAge"]?></td>
                        <td><?=$reg["regCity"]?></td>
                        <td><?=$reg["date"]?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <h2>Results filtered by registration city.</h2>
            <p><em>Click a city name to expand those results. Please note, if there are no registrations for a specific city that city will NOT appear below.</em></p>
            
            <div class="accordion" id="cityResults">
            <?php foreach($allCities as $cit): ?>
                <h2 style="font-weight:bold;"><?=$cit?> registrations</h2>
                    <div>
                        <div class="form-actions downloadBtn">
                            <form method="post">
                                <button type="submit" class="btn btn-large btn-default">Download all registrations for <?=$cit?></button>
                                <input type="hidden" name="scope" value="<?=$cit?>">
                                <input type="hidden" name="export" value="true">
                            </form>
                        </div>
                        
                        <table id="cityResultsTable" class="cityResult regCityTable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>License</th>
                                    <th>Business</th>
                                    <th>Specialty</th>
                                    <th>Meal</th>
                                    <th>Patient Percent</th>
                                    <th>Patient Age</th>
                                    <th>Register Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allRegs as $reg): ?>
                                    <?php if($reg["regCity"] == $cit): ?>
                                    <tr>
                                        <td><?=$reg["fname"]?></td>
                                        <td><?=$reg["lname"]?></td>
                                        <td><?=$reg["email"]?></td>
                                        <td><?=$reg["lic"]?></td>
                                        <td><?=$reg["business"]?></td>
                                        <td><?=$reg["meal"]?></td>
                                        <td><?=$reg["specialty"]?></td>
                                        <td><?=$reg["patientPercent"]?></td>
                                        <td><?=$reg["patientAge"]?></td>
                                        <td><?=$reg["date"]?></td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br><br><br>
                    </div>
            <?php endforeach; ?>
            </div>
            
        </div>
       
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="js/jquery.fixheadertable.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                    $('#resultsTable').fixheadertable({
                        addTitles : true,
                        height : 500,
                        resizeCol : true,
                        zebra: true,
                        zebraClass: "stripeRow",
                        sortable : true,
                        sortedColId : 1, 
                        sortType : ['string', 'string', 'string', 'string', 'string', 'string', 'string', 'string', 'string', 'string', 'date'],
                        dateFormat : 'Y-m-d',
                        pager       : true,
                        rowsPerPage : 25
                    });
                    
                     $('#cityResultsTable.cityResult').fixheadertable({
                        showHide : true,
                        height : 400
                    });
                    
                    $("#cityResults").accordion({
                        active: false,
                        collapsible: true
                    });
                    
                    $(".exportBtn").click(function(){
                        
                    });
                });
        </script>
           
    </body>
</html>
