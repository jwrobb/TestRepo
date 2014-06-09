<?
require_once 'lib/header.php';
$result = $dbObj->query("SELECT city from insideedge_form_cfg;")
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ABILIFY&reg; (aripiprazole) Event Registration</title>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="960"><div style="background-color: #FFF; width: 960px;">
<table width="960" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:15px;">
  <tr>
    <td width="960"><table width="960" border="0" cellpadding="5" cellspacing="0">
      <tr>
        <td width="109" valign="top"><div style="margin-top:17px;"><img src="images/img-abilify-logo.jpg" width="109" height="108" /></div></td>
        <td valign="top">
            <div class="ISI">
            <table width="790" height="18" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left"><strong>IMPORTANT SAFETY INFORMATION</strong></td>
                <td align="right"><a href="http://www.otsuka-us.com/Documents/Abilify.PI.pdf" target="_blank">U.S. FULL PRESCRIBING INFORMATION</a>, including <strong>Boxed WARNINGS</strong>, and <a href="https://www.abilify.com/hcp/pdf/Medication_Guide.pdf" target="_blank">Medication Guide</a></td>
              </tr>
            </table>
            <p>Elderly patients with dementia-related psychosis treated with antipsychotic drugs are at an increased risk (1.6 to 1.7 times) of death compared to placebo (4.5% vs 2.6%, respectively). Although the causes of death were varied, most of the deaths appeared to be cardiovascular (eg, heart failure, sudden death) or infectious (eg, pneumonia) in nature. ABILIFY is not approved for the treatment of patients with dementia-related psychosis. <br />
              <strong>SAFETY INFORMATION CONTINUED BELOW</strong></p>
          </div>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
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
                <p>This program may include the provision of a modest meal. Otsuka does not offer such a meal to healthcare
                professionals (HCPs) whose institutions prohibit such hospitality, nor does Otsuka offer a meal where federal or
                state laws (e.g., Vermont) limit HCP ability to accept such a meal. Accordingly, please consult your legal or ethics advisor
                regarding any applicable limitation before attending this educational program. Please note that Otsuka is
                required to report the value of a provided meal pursuant to applicable federal and/or state laws. Invitations are nontransferable.</p>
                <p>You may choose to participate without receiving a meal.</p>
            </div>
        </div>
        
        <hr />
      
  <!-- CONTENT ENDS -->
  </div>
  <div class="ISI">
  <div style="background-color: #137ca4; color: #FFF; width: 500px; padding: 5px;"><strong>IMPORTANT SAFETY INFORMATION and INDICATIONS for ABILIFY® (aripiprazole)</strong></div>
    <br />
    <p><strong>IMPORTANT SAFETY INFORMATION</strong></p>
    <p><strong class="subhead" id="subhead">Increased Mortality in Elderly Patients with Dementia-Related Psychosis</strong></p>
    <p><strong>Elderly patients with dementia-related psychosis treated with antipsychotic drugs are at an increased risk (1.6 to 1.7 times) of death compared to<br />
      placebo (4.5% vs 2.6%, respectively). Although the causes of death were varied, most of the deaths appeared to be cardiovascular (eg, heart failure, sudden death) or infectious (eg, pneumonia) in nature. ABILIFY is not approved for the treatment of patients with dementia-related psychosis.</strong></p>
    <p id="subhead">Suicidality and Antidepressant Drugs</p>
    <p><strong>Antidepressants increased the risk compared to placebo of suicidal thinking and behavior (suicidality) in children, adolescents, and young adults in <br />
      short-term studies of Major Depressive Disorder (MDD) and other psychiatric disorders. Anyone considering the use of adjunctive ABILIFY or another antidepressant in a child, adolescent, or young adult must balance this risk with the clinical need. Short-term studies did not show an increased risk of suicidality in adults beyond age 24. Depression and certain other psychiatric disorders are themselves associated with increases in the risk of suicide. Patients of all ages who are started on antidepressant therapy should be monitored appropriately and observed closely for clinical worsening, suicidality, or unusual changes in behavior. Families and caregivers should be advised of the need for close observation and communication with the prescriber. ABILIFY is not approved for use in pediatric patients with depression.</strong></p>
    <p><strong><em>See Full Prescribing Information for complete Boxed WARNINGS</em></strong></p>
    <p><strong>Contraindication</strong> — Known hypersensitivity reaction to ABILIFY. Reactions have ranged from pruritus/urticaria to anaphylaxis.</p>
    <ul>
      <li><strong>Cerebrovascular Adverse Events, Including Stroke</strong> — Increased incidence of cerebrovascular adverse events (eg, stroke, transient ischemic attack), including fatalities, have been reported in clinical trials of elderly patients with dementia-related psychosis treated with ABILIFY<br />
        <br />
      </li>
      <li> <strong>Neuroleptic Malignant Syndrome (NMS)</strong> — As with all antipsychotic medications, a rare and potentially fatal condition known as NMS has been reported with ABILIFY. NMS can cause hyperpyrexia, muscle rigidity, diaphoresis, tachycardia, irregular pulse or blood pressure, cardiac dysrhythmia, and altered mental status. Additional signs may include elevated creatinine phosphokinase, myoglobinuria (rhabdomyolysis), and acute renal failure. Management should include immediate discontinuation of antipsychotic drugs and other drugs not essential to concurrent therapy, intensive symptomatic treatment and medical monitoring, and treatment of any concomitant serious medical problems<br />
        <br />
      </li>
      <li> <strong>Tardive Dyskinesia (TD)</strong> — The risk of developing TD and the potential for it to become irreversible are believed to increase as the duration of treatment and the total cumulative dose of antipsychotic increase. The syndrome can develop, although much less commonly, after relatively brief treatment periods at low doses. Prescribing should be consistent with the need to minimize TD. The syndrome may remit, partially or completely, if antipsychotic treatment is withdrawn<br />
        <br />
      </li>
      <li><strong> Metabolic Changes</strong> — Atypical antipsychotic drugs have been associated with metabolic changes that include hyperglycemia/diabetes mellitus, dyslipidemia, and body weight gain<br />
        <br />
      </li>
      <div style="margin-left:25px;"><li><strong> Hyperglycemia/Diabetes Mellitus</strong> — Hyperglycemia, in some cases extreme and associated with ketoacidosis, coma, or death, has been reported in patients treated with atypical antipsychotics including ABILIFY (aripiprazole). Patients with diabetes should be regularly monitored for worsening of glucose control; those with risk factors for diabetes should undergo baseline and periodic fasting blood glucose testing. Any patient treated with atypical antipsychotics should be monitored for symptoms of hyperglycemia including polydipsia, polyuria, polyphagia, and weakness. Patients who develop symptoms of hyperglycemia should also undergo fasting blood glucose testing. In some cases, hyperglycemia has resolved when the atypical antipsychotic was discontinued; however, some patients required continuation of anti-diabetic treatment despite discontinuation of the suspect drug<br />
        <br />
      </li>
      <li><strong> Dyslipidemia</strong> — Undesirable alterations in lipids have been observed in patients treated with atypical antipsychotics. There were no significant differences between ABILIFY- and placebo-treated patients in the proportion with changes from normal to clinically significant levels for fasting/nonfasting total cholesterol, fasting triglycerides, fasting LDLs, and fasting/nonfasting HDLs<br />
        <br />
      </li>
      <li><strong> Weight Gain</strong> — Weight gain has been observed with atypical antipsychotic use. Clinical monitoring of weight is recommended. When treating pediatric patients, weight gain should be monitored and assessed against that expected for normal growth<br />
        <br />
      </li></div>
      <li><strong> Orthostatic Hypotension</strong> — ABILIFY may be associated with orthostatic hypotension and should be used with caution in patients with known cardiovascular disease, cerebrovascular disease, or conditions which would predispose them to hypotension.</li>
    </ul>
    <p><strong>Leukopenia, Neutropenia, and Agranulocytosis</strong> — Leukopenia, neutropenia, and agranulocytosis have been reported with antipsychotics, including ABILIFY. Patients with history of a clinically significant low white blood cell (WBC) count or drug-induced leukopenia/neutropenia should have their complete blood count (CBC) monitored frequently during the first few months of therapy and discontinuation of ABILIFY should be considered at the first sign of a clinically significant decline in WBC count in the absence of other causative factors.</p>
    <p><strong>Seizures/Convulsions</strong> — As with other antipsychotic drugs, ABILIFY should be used with caution in patients with a history of seizures or with conditions that lower the seizure threshold (eg, Alzheimer’s dementia).</p>
    <p><strong>Potential for Cognitive and Motor Impairment</strong> — Like other antipsychotics, ABILIFY may have the potential to impair judgment, thinking, or motor skills. Patients should not drive or operate hazardous machinery until they are certain ABILIFY does not affect them adversely.</p>
    <p><strong>Body Temperature Regulation</strong> — Disruption of the body’s ability to reduce core body temperature has been attributed to antipsychotics. Appropriate care is advised for patients who may exercise strenuously, be exposed to extreme heat, receive concomitant medication with anticholinergic activity, or be subject to dehydration.</p>
    <p><strong>Suicide</strong> — The possibility of a suicide attempt is inherent in psychotic illnesses, Bipolar Disorder, and Major Depressive Disorder, and close supervision of high-risk patients should accompany drug therapy. Prescriptions should be written for the smallest quantity consistent with good patient management in order to reduce the risk of overdose.</p>
    <p><strong>Dysphagia</strong> — Esophageal dysmotility and aspiration have been associated with antipsychotic drug use, including ABILIFY; use caution in patients at risk for aspiration pneumonia. Aspiration pneumonia is a common cause of morbidity and mortality in elderly patients, in particular those with advanced Alzheimer’s dementia.</p>
    <p>Physicians should advise patients to avoid alcohol while taking ABILIFY.</p>
    <p>Strong CYP3A4 (eg, ketoconazole) or CYP2D6 (eg, fluoxetine) inhibitors will increase ABILIFY drug concentrations; reduce ABILIFY dose by one-half when used concomitantly, except when used as adjunctive treatment with antidepressants in adults with Major Depressive Disorder. If a strong CYP3A4 inhibitor and strong CYP2D6 inhibitor are coadministered or a known CYP2D6 poor metabolizer is receiving a concomitant strong CYP3A4 inhibitor, the ABILIFY dose should be reduced to one-quarter (25%) of the usual dose.</p>
    <p>CYP3A4 inducers (eg, carbamazepine) will decrease ABILIFY (aripiprazole) drug concentrations; double ABILIFY dose when used concomitantly.</p>
    <p><strong>Commonly observed adverse reactions</strong> (≥5% incidence and at least twice the rate of placebo for ABILIFY vs placebo, respectively):</p>
    <ul>
      <li>Adult patients with Major Depressive Disorder (adjunctive treatment to antidepressant therapy): akathisia (25% vs 4%), restlessness (12% vs 2%), <br />
        insomnia (8% vs 2%), constipation (5% vs 2%), fatigue (8% vs 4%), and blurred vision (6% vs 1%)<br />
        <br />
      </li>
      <li> Adult patients (monotherapy) with Bipolar Mania: akathisia (13% vs 4%), sedation (8% vs 3%), tremor (6% vs 3%), restlessness (6% vs 3%), and extrapyramidal disorder (5% vs 2%)<br />
        <br />
      </li>
      <li> Adult patients (adjunctive therapy with lithium or valproate) with Bipolar Mania: akathisia (19% vs 5%), insomnia (8% vs 4%), and <br />
        extrapyramidal disorder (5% vs 1%)<br />
        <br />
      </li>
      <li> Pediatric patients (10 to 17 years) with Bipolar Mania: somnolence (23% vs 3%), extrapyramidal disorder (20% vs 3%), fatigue (11% vs 4%), <br />
        nausea (11% vs 4%), akathisia (10% vs 2%), blurred vision (8% vs 0%), salivary hypersecretion (6% vs 0%), and dizziness (5% vs 1%)<br />
        <br />
      </li>
      <li> Adult patients with Schizophrenia: akathisia (8% vs 4%)<br />
        <br />
      </li>
      <li> Pediatric patients (13 to 17 years) with Schizophrenia: extrapyramidal disorder (17% vs 5%), somnolence (16% vs 6%), and tremor (7% vs 2%)<br />
        <br />
      </li>
      <li> Pediatric patients (6 to 17 years) with irritability associated with Autistic Disorder: sedation (21% vs 4%), fatigue (17% vs 2%), vomiting (14% vs 7%), somnolence (10% vs 4%), tremor (10% vs 0%), pyrexia (9% vs 1%), drooling (9% vs 0%), decreased appetite (7% vs 2%), 
        salivary hypersecretion (6% vs 1%), extrapyramidal disorder (6% vs 0%), and lethargy (5% vs 0%)<br />
        <br />
      </li>
      <li> Adult patients with agitation associated with Schizophrenia or Bipolar Mania: nausea (9% vs 3%)</li>
      </ul>
    <p>      Dystonia is a class effect of antipsychotic drugs. Symptoms of dystonia may occur in susceptible individuals during the first days of treatment and at low doses.</p>
    <p><strong>Pregnancy: Non-Teratogenic Effects</strong> — Neonates exposed to antipsychotic drugs during the third trimester of pregnancy are at risk for extrapyramidal and/or withdrawal symptoms following delivery. These complications have varied in severity; from being self-limited to requiring intensive care and prolonged hospitalization. ABILIFY should be used during pregnancy only if the potential benefit justifies the potential risk to the fetus.</p>
    <p><strong>INDICATIONS</strong></p>
    <p><strong>ABILIFY (aripiprazole) is indicated for:</strong></p>
    <ul>
      <li>Use as an adjunctive therapy to antidepressants in adults with Major Depressive Disorder who have had an inadequate response to antidepressant therapy<br />
        Acute treatment of manic or mixed episodes associated with Bipolar I Disorder as monotherapy and as an adjunct to lithium or valproate in adult and pediatric patients 10 to 17 years of age</li>
      <li> Maintenance treatment of Bipolar I Disorder, both as monotherapy and as an adjunct to lithium or valproat</li>
      <li> Treatment of Schizophrenia in adults and adolescents 13 to 17 years of age</li>
      <li> Treatment of irritability associated with Autistic Disorder in pediatric patients 6 to 17 years of age</li>
      </ul>
    <p> <strong>Special Considerations for Pediatric Uses:</strong></p>
    <ul>
      <li> Treatment for pediatric patients should be initiated only after a thorough diagnostic evaluation and careful consideration of the risks and benefits of treatment. Medication should be part of a treatment program that also includes psychological, educational, and social interventions</li>
      </ul>
    <p><strong>ABILIFY Injection is indicated for:</strong></p>
    <ul>
      <li>Acute treatment of agitation associated with Schizophrenia or Bipolar Disorder, manic or mixed in adults<br />
        Please see U.S. FULL PRESCRIBING INFORMATION, including Boxed WARNINGS, and Medication Guide for ABILIFY.</li>
      </ul>
    <p><a href="http://www.otsuka-us.com/Documents/Abilify.PI.pdf" target="_blank">U.S. FULL PRESCRIBING INFORMATION</a>, including <strong>Boxed WARNINGS</strong>, and <a href="https://www.abilify.com/hcp/pdf/Medication_Guide.pdf" target="_blank">Medication Guide</a></p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>© 2013 Otsuka America Pharmaceutical, Inc. All Rights Reserved. </td>
        <td align="right"><!--img src="images/img-bristol-mysers-squibb.gif" width="133" height="22" /--> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/img-otsuka.gif" width="186" height="22" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
    
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
