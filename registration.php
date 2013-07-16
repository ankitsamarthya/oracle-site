<?php
require_once("includes/header.php");
include_once("includes/initialize.php");
?>
<?php
    if(isset($_POST['submit'])){
        $regno= $_POST['regno'];
        $course= $_POST['course'];
        $branch= $_POST['branch'];
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $address= $_POST['address'];
        $city= $_POST['city'];
        $state= $_POST['state'];
        $pincode= $_POST['pin'];
        $module= $_POST['module'];
        $phno= $_POST['phno'];
        $email= $_POST['email'];
        $ddno= $_POST['ddno'];
        $bank= strtolower($_POST['bank']);
        $doi= $_POST['doi'];
        $amt= $_POST['amt'];
        $sql= "insert into oracle_data values ('$regno', '$fname', '$lname', '$address', '$city', '$state','$pincode','$ddno','$bank','$doi','$amt','$phno','$email','$module')";

    }
?>
<div id="main-content"> 
    <div id="left-content">
        <h2>Timeline</h2>
        <ul>
            <li>Registrations start from ----</li>
            <li>Class commencement from 3rd March, 2012</li>
        </ul>
        <h3>Sheduled Dates</h3>
        <li>March: 3,4,10,11,17,18</li>
        <li>Total No of Class:10days</li>
        <h3>Timings</h3>
        <p>Saturdays & Sundays:</p>
        <p>SQL/PL-SQL :9.00A.M to 1.00P.M</p>
        <p>DBA-1/DBA-11:1.30PM TO 5.30PM</p>
        <h3>Oracle WDP offers the following Modules:</h3>
        <h4>Oracle modules</h4>
        <ul>
            <li><a href="docs/O-Module-1.pdf" target="_blank">ORACLE 10g: INTRODUCTION TO SQL</a></li>
            <li><a href="docs/O-Module-2.pdf" target="_blank">ORACLE 10G: PROGRAM WITH PL/SQL</a></li>
            <li><a href="docs/O-Module-3.pdf" target="_blank">ORACLE 10G: DATABASE ADMINISTRATION-I</a></li>
            <li><a href="docs/O-Module-4.pdf" target="_blank">ORACLE 10G: DATABASE ADMINISTRATION-II</a></li>
        </ul>
        <h4>Java modules</h4>
        <ul>
            <li><a href="docs/J-Module-1.pdf" target="_blank">Fundamentals of JAVA Programming Language, Java SE 6</a></li>
            <li><a href="docs/J-Module-2.pdf" target="_blank">JAVA Programming Language, Java SE 6</a></li>
            <li><a href="docs/J-Module-3.pdf" target="_blank">Developing Applications with Java SE 6 Platform</a></li>
            <li><a href="docs/J-Module-4.pdf" target="_blank">Web Component Development with Servlets & JSP, Java EE 6</a></li>
        </ul>
        
         <br /><br />
    </div>
    <div id="right-content">
         <?php
         if(verify_payment($ddno,$bank)){
        
         if($database->query($sql)){
            echo "Congratulations! You have successfully registered for <span class='highlight'>$module</span> under Oracle Workforce Development Program.";
            echo "<p><a href='index.php'>Return to Home</a></p>";
         }
         else {
            echo "$regno is already register. !!"; 
         }
        }
       else {
         echo "Your Payment source is not verified yet. Make sure that you submitted the Demand Draft before registering";
       }
        ?>
         <br /><br />
    </div>
</div><!-- Main-content closed -->
</div><!-- Wrapper closed -->
<div id="footer">
    &copy; 2012 | Website Developed By <span id="credits">Gaurav Doshi (10BCE0301) | Ankit (10BCE0065)</span>
</div>
