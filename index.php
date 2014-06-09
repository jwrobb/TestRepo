<?
require_once 'lib/header.php';
$result = $dbObj->query("SELECT city from insideedge_form_cfg;")
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/styles.css">
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #137ca4;
}
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div style="margin-left: 20px; margin-right: 20px; text-align: center;">
  <img src="images/main-image.jpg" width="920" height="642" />
  </div>
  <div class="body"><!-- CONTENT BEGINS -->
  
        <p>Below is a list of all events that are currently open for registration. Click on the event name to proceed.</p>

        <div class="dropdown btn-group">
            <button class="btn dropdown-toggle" data-toggle="dropdown">
                <span id="citySelectText">Select a city to proceed</span>
                <span class="caret"></span>
            </button>
             <ul class="dropdown-menu">
                 <?php while($c = $result->fetch_array(MYSQLI_ASSOC)): ?>
                 <li><a href="#<?=$c["city"]?>" class="citySelect"><?=$c["city"]?></a></li>   
                 <?php endwhile; ?>
            </ul>
        </div>

        <div class="alert text-center" id="loading" style="display:none;">
            Loading city information...<br />
            <img src="images/ajax-loader.gif">
        </div>

        <div id="regReveal" style="display:none;">
            <hr />
            <table border="0" cellpadding="5" cellspacing="0">
                <tbody>
                    <tr>
                        <td align="left"><b>City:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_city"></span></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Date:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_date"></span></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Time:<b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_time"></span></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Location:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_location"></span></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Speaker:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_speaker"></span></td>
                    </tr>

                    <tr>
                        <td align="left"><b>Speaker Title:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_speakerTitle"></span></td>
                    </tr>

                    <tr>
                        <td align="left"><b>Moderator:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_mod"></span></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Moderator Title:</b></td>
                        <td>&nbsp;&nbsp;</td>
                        <td align="left"><span id="evt_modTitle"></span></td>
                    </tr>
                </tbody>
            </table>
            
            <hr />

            <p>&nbsp;</p>

            <div class="alert alert-danger" id="submitError" style="display:none;">
                <strong>Error Submitting the form!</strong> Please complete the fields outlined in red below
            </div>

            <p>Please fill out all the fields below to request attendance to the program:</p>
            <form method="post" id="regForm" name="regForm" role="form" accept-charset="utf-8">
                <input type="hidden" name="city" id="city" value="">
                <div class="form-group">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" style="width:50%;" required>
                </div>

                <div class="form-group">
                    <label for="lname" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" style="width:50%;" required>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" style="width:50%;" required>
                </div>

                <div class="form-group">
                    <label for="lic" class="control-label">State License #</label>
                    <input type="text" class="form-control" id="lic" name="lic" style="width:50%;" required>
                </div>

                <div class="form-group">
                    <label for="business" class="control-label">Place of Business</label>
                    <input type="text" class="form-control" id="business" name="business" style="width:50%;" required>
                </div>

                 <div class="form-group">
                    <label for="specialty" class="control-label">Specialty</label>
                    <input type="text" class="form-control" id="specialty" name="specialty" style="width:50%;" required>
                </div>
                    
                <div class="form-group">
                    <label for="meal" class="control-label">Meal Option</label>
                    <select class="form-control" id="meal" name="meal" style="width:50%;" required>
                        <option value="">- Make a Selection -</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>                
                </div>

                <div class="form-group">
                    <label for="patientPercent" class="control-label">What percentage of patients do you treat with MDD and / or Bipolar?</label>
                    <select class="form-control" id="patientPercent" name="patientPercent" style="width:50%;" required>
                        <option value="">- Make a Selection -</option>
                        <option value="x">< 10%</option>
                        <option value="x">10% - 25%</option>
                        <option value="x">26% - 39%</option>
                        <option>40% - 50%</option>
                        <option>>50%</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="patientAge" class="control-label">What percent of your patients are 65 or older?</label>
                    <select class="form-control" id="patientAge" name="patientAge" style="width:50%;" required>
                        <option value="">- Make a Selection -</option>
                        <option>< 10%</option>
                        <option>10% - 25%</option>
                        <option>26% - 39%</option>
                        <option>40% - 50%</option>
                        <option>>50%</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sec" class="control-label">Do you have a secondary specialty of ObGyn?</label>
                    <select class="form-control" id="sec" name="sec" style="width:50%;" required>
                        <option value="">- Make a Selection -</option> 
                        <option value="x">Yes</option>
                        <option>No</option>
                     </select>
                </div>
                <button type="submit" class="btn btn-large btn-primary">Submit Registration</button>
            </form>
            <div id="mealOptionPopOver" style="display:none;">
                <p>Stuff about the meal...</p>
            </div>
        </div>
        
        <hr />
      
  <!-- CONTENT ENDS -->
  </div>
 
    
<div class="fullOverlay" id="regComplete" style="display:none; background-color:white;" >
    <div class="container" style="padding-top: 25px;">
        <div class="jumbotron">
            <h2>Thank you for your registration request. You will receive your registration confirmation within 48 hours.</h2>
        </div>
    </div>
</div>

<div class="fullOverlay" id="regError" style="display:none; background-color:white;" >
    <div class="container" style="padding-top: 25px;">
        <div class="jumbotron">
            <h2 class="text-danger">We apologize but the criteria you enter does not match with company guidelines to attend this meeting</h2>
        </div>
    </div>
</div>
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/popover.js"></script>
<script type="text/javascript">

    $("#regForm").submit(function(event){

        event.preventDefault();

        var $form = $(this);
        var $inputs = $form.find("input, select");

        if(validForm($inputs)) {

            var serializedData = $form.serialize();

            $inputs.prop("disabled", true);

            var jqxhr = $.post("<?=$urlPath?>register.php", serializedData);

            jqxhr.done(function (response, textStatus, jqXHR){
              $('#regComplete').fadeIn('fast');
            });

            jqxhr.fail(function (jqXHR, textStatus, errorThrown){
              console.error("The following error occured: " + textStatus, errorThrown );
              $('#submitError').fadeIn('fast');
            });
        } else {
            $('#submitError').fadeIn('fast');
        }
    });

    $('.citySelect').click(function(event){
        $('#loading').slideDown('fast');

        //Get the selected info
        var city = $(this).attr('href');
        city = city.substring(1,city.length);
        $('#city').val(city);
        $('#citySelectText').text($(this).text());

        var jqxhr = $.get("<?=$svrPath?>cityInfo.php",{cc:city});

        jqxhr.done(function(d){
            var dataObj = $.parseJSON(d);

            $("#evt_city").text(dataObj.city);
            $("#evt_speaker").text(dataObj.speaker);
            $("#evt_date").text(dataObj.date);
            $("#evt_speakerTitle").text(dataObj.speakerTitle);
            $("#evt_location").text(dataObj.location);
            $("#evt_mod").text(dataObj.mod);
            $("#evt_time").text(dataObj.time);
            $("#evt_modTitle").text(dataObj.modTitle);

            $('#loading').slideUp('fast');
            $('#regReveal').slideDown('fast');
        });

    });

    function validForm($inputs) {
        var formIsValid = true;

        //First check if all fields have values
        $inputs.each(function(){
            if($(this).val() === "") {
                $(this).closest('div.form-group').addClass("has-error");
                formIsValid = false;
            } else {
                $(this).closest('div.form-group').removeClass("has-error");
            }
        });

        //Second check for special cases
        if(formIsValid) {
            $inputs.each(function(){
                if($(this).prop("type") == "select-one" && $(this).val() == "x") {
                    $("#regError").fadeIn('fast');
                    //$(this).closest('div.form-group').addClass("has-error");
                    formIsValid = false;
                } else if($(this).prop('name') == "email" && $(this).val().match(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i) == null) {
                    $("#submitError").html("Please check the format of your email address");
                    $(this).closest('div.form-group').addClass("has-error");
                    formIsValid = false;
                } else {
                    $(this).closest('div.form-group').removeClass("has-error");
                }
            });
        }

        return formIsValid;
    }
    
    $("#meal").popover({
        trigger: "focus",
        placement: "right",
        html : true,
        animation: true,
        title: "Meal Option",
        content: function() {
            return $('#mealOptionPopOver').html();
        }
    });
</script>
</body>
</html>
