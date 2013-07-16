<?php
// 中文
ini_set('display_errors',1); 
error_reporting(E_ALL);
?><?php
require_once("initialize.php");
function redirect_to($location){
	header("Location:{$location}");
	exit;
}

function output_message($message=""){
	if(!empty($message)){
		echo "<p class=\"message\">{$message}</p>";
	}
	else { return ""; }
}

function num_of_rows($table){
	global $database;
	$sql= "select * from ". $table;
	$result =$database->query($sql);
	$num_rows= mysql_num_rows($result);
	return $num_rows;
}

function convert_to_mysql_date_format($date){
	if(substr($date,21,2)=="AM"||substr($date,21,2)=="PM"){
		$months= array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
		$MysqlDate= substr($date,7,4);
		$MysqlDate.="-".$months[substr($date,3,3)];
		$MysqlDate.="-".substr($date,0,2);
		$AMorPM = substr($date,21,2);
		
		if($AMorPM=="PM") {$hrs= intval(substr($date,12,2))+12; }
		else $hrs=substr($date,12,2);
		$MysqlDate.=" ".$hrs .":". substr($date,15,2).":".substr($date,18,2);
		return $MysqlDate;
	}
	else { return $date; }
	
}

function contact_form(){
	echo "<h2>Contact Form:</h2>";
	echo "Post Your quries here and we'll respond to you as soon as possible.";
	echo "<form method=\"post\" name='contact-form' onsubmit=\"return validate_contact_Form()\" action=\"contact.php\">
	<table id=\"requestform\">
        <tr>
		<td class=\"label\"><label>Full Name:</label></td>
		<td><input type=\"text\" name=\"name\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>E-mail:</label></td>
		<td><input type=\"text\" name=\"email\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>Subject:</label></td>
		<td><input type=\"text\" name=\"subject\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>Message:</label></td>
		<td><textarea name=\"message\" cols=\"30\" rows=\"10\"></textarea></td>
        </tr>
	<tr>
		<td class=\"label\"><label></label></td>
		<td><input type=\"submit\" name=\"submit\" value=\"Submit\" /></td>
        </tr>
	</table>
	</form>";
	
}

function payment_form(){
echo "<h2>Add Payment:</h2>";
	echo "<form method=\"post\" name='payment-form' onsubmit=\"return validate_payment_Form()\" action=\"index.php\">
	<table id=\"requestform\">
        <tr>
		<td class=\"label\"><label>Registration No.:</label></td>
		<td><input type=\"text\" name=\"regno\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>DD Number:</label></td>
		<td><input type=\"text\" name=\"ddno\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>Bank:</label></td>
		<td><input type=\"text\" name=\"bank\" value=\"\" /></td>
        </tr>
	 <tr>
		<td class=\"label\"><label>Date (dd/mm/yyyy) :</label></td>
		<td><input type=\"text\" name=\"date\" value=\"\" /></td>
        </tr>
	<tr>
		<td class=\"label\"><label></label></td>
		<td><input type=\"submit\" name=\"submit\" value=\"Submit\" /></td>
        </tr>
	</table>
	</form>";
}

function reg_form(){
?>
<form method="post" name="reg-form" onsubmit="return validate_reg_Form()" action="registration.php">
	<table id="requestform">
        <tr>
		<td class="label"><label>Registration Number:</label></td>
		<td><input type="text" name="regno" value="" /></td>
        </tr>
        <tr>
                <td class="label"><label>Course:</label></td>
                <td> <select name="course">
			<option value="B.Tech">B.Tech</option>
			<option value="M.Tech">M.Tech</option>
			<option value="MS">MS</option>
			<option value="BCA">BCA</option>
			<option value="MCA">MCA</option>
			<option value="B.Sc">B.Sc</option>
			<option value="M.Sc">M.Sc</option>
			<option value="MBA">MBA</option>
		      </select>
		</td>
        </tr>
        <tr>
                <td class="label"><label>Branch:</label></td>
                <td><input type="text" name="branch" value="" /></td>
        </tr>
	<tr>
                <td class="label"><label>First Name:</label></td>
                <td><input type="text" name="fname" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>Last Name:</label></td>
                <td><input type="text" name="lname" value="" /></td>
		
        </tr>
	 <tr>
                <td class="label"><label>Address:</label></td>
                <td><textarea name="address" cols="17" rows="3"></textarea></td>
        </tr>
	<tr>
                <td class="label"><label>City:</label></td>
                <td><input type="text" name="city" value="" /></td>
        </tr>
	<tr>
                <td class="label"><label>State:</label></td>
                <td><select name="state">
		<?php
			global $database;
			$sql="select name from states";
			$result = $database->query($sql);
			while($state=mysql_fetch_array($result)){
				echo "<option value=\"{$state['name']}\">{$state['name']}</option>";
			}
		?>
		</select></td>
        </tr>
	<tr>
                <td class="label"><label>Pincode:</label></td>
                <td><input type="text" name="pin" value="" /></td>
        </tr>
	<tr>
                <td class="label"><label>Select Module:</label></td>
                <td> <select name="module">
			<option value="-">------Oracle Modules-----</option>
			<option value="ORACLE 10g: INTRODUCTION TO SQL">ORACLE 10g: INTRODUCTION TO SQL</option>
			<option value="ORACLE 10G: PROGRAM WITH PL/SQL">ORACLE 10G: PROGRAM WITH PL/SQL</option>
			<option value="ORACLE 10G: DATABASE ADMINISTRATION-I">ORACLE 10G: DATABASE ADMINISTRATION-I</option>
			<option value="ORACLE 10G: DATABASE ADMINISTRATION-II">ORACLE 10G: DATABASE ADMINISTRATION-II</option>
			<option value="-">------Java Modules----</option>
			<option value="Fundamentals of JAVA Programming Language, Java SE 6">Fundamentals of JAVA Programming Language, Java SE 6</option>
			<option value="JAVA Programming Language, Java SE 6">JAVA Programming Language, Java SE 6</option>
			<option value="Developing Applications with Java SE 6 Platform">JAVA Programming Language, Java SE 6</option>
			<option value="Web Component Development with Servlets & JSP, Java EE 6">Web Component Development with Servlets & JSP, Java EE 6</option>
		      </select>
		</td>
        </tr>
	<tr>
                <td class="label"><label>Phone No.:</label></td>
                <td><input type="text" name="phno" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>E-mail:</label></td>
                <td><input type="text" name="email" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>DD Number:</label></td>
                <td><input type="text" name="ddno" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>Bank Name:</label></td>
                <td><input type="text" name="bank" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>Date of Issue (DD/MM/YYYY):</label></td>
                <td><input type="text" name="doi" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label>Amount of DD.:</label></td>
                <td><input type="text" name="amt" value="" /></td>
		
        </tr>
	<tr>
                <td class="label"><label></label></td>
                <td><input type="submit" name="submit" value="Register"/></td>
		
        </tr>
	</table>
</form>
<?php
}

function verify_payment($ddno,$bank){
	global $database;
	$sql= "select * from payments where ddno='$ddno' and bank='$bank' limit 1";
	$result=$database->query($sql);
	if(mysql_numrows($result)==1){
		return true;
	}
	else return false;
}
?>