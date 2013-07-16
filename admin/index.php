<?php
session_start();
require_once("admin-header.php");
include_once("../includes/initialize.php");
if(isset($_GET['op'])) $op= $_GET['op'];
else $op= "";
if(!isset($_SESSION['username'])){
    redirect_to("login.php");     
}

?>
<?php
if(isset($_GET['qid'])){
    $sql="update contactus set status=1 where pid={$_GET['qid']}";
    $database->query($sql);
}
?>

<?php
if(isset($_POST['submit'])){
        $regno= $_POST['regno'];
        $ddno=$_POST['ddno'];
        $bank= strtolower($_POST['bank']);
        $date=$_POST['date'];
        
        $sql="insert into payments values ('','$ddno','$bank','$date','$regno')";
        $database->query($sql);
        $message="<span class='highlight'>Payment Added Successfully .</span>";
        
    }
?>


<div id="right-content">
    <?php if($op=="reg"){?>
        <h2>Select Module</h2>
        <form action="index.php?op=reg" method="post">
            <select name="module">
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
            <input type="submit" value="Show" name="show" />
        </form>
<?php
//displaying the selected module's regitration
if(isset($_POST["show"])){
        $module= $_POST['module'];
        $sql= "select reg_number,fname,lname from oracle_data where module='$module'";
        $result= $database->query($sql);
        
        echo "<div id='registration'>";
	if(mysql_numrows($result)==0){
	    echo "No registrations for <span class='highlight'>$module</span> so far !!";
	}
	else{
	    echo "Registrations for <span class='highlight'>$module</span> (Total Registrations:<span class='highlight'>". mysql_numrows($result) ."</span>)<br /><br /><table>";
	    echo "<tr>
			<th>Reg. No</th>
			<th>Name</th>
		    </tr>";
	    while($row=mysql_fetch_array($result)){
		echo "<tr>
			<td>{$row['reg_number']}</td>
			<td>{$row['fname']} {$row['lname']}</td>
			</tr>";
			
	    }
	    echo "</table>";
	}
	echo "</div>";
        
    }
?>
        
    <?php } 
    else if($op=="quer"){
        echo "<h2>Queries from Contact form</h2>";
        $sql ="select * from contactus where status=0 order by pid desc";
        $result= $database->query($sql);
        while($row= mysql_fetch_array($result)){
            echo "<div class='query'>";
            echo "<table>";
            echo "<tr>
                    <td class='table-head'>Name:</td>
                    <td>{$row['full_name']}</td>
                </tr>
                <tr>
                    <td class='table-head'>E-mail:</td>
                    <td>{$row['email']}</td>
                </tr>
                <tr>
                    <td class='table-head'>Message</td>
                    <td><strong>{$row['title']}</strong><br />{$row['message']}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href='index.php?op=quer&qid={$row['pid']}'>Answered</a></td>
                </tr>";
            echo "</table></div>";
        }
        
    }
    else { ?>
    <div id="motivation">
        <?php if(!empty($message)) echo $message; ?>
       <?php payment_form(); ?>
    </div>
    <?php } ?>
</div>
</div><!-- Main-content closed -->
</div><!-- Wrapper closed -->
<div id="footer">
    &copy; 2012 | Website Developed By <span id="credits">Gaurav Doshi (10BCE0301) | Ankit (10BCE0065)</span>
</div>