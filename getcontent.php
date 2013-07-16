<?php
    include_once("includes/initialize.php");
    $opt= $_GET['op'];
    function get_module($table,$no,$head){
        echo "<h2>Module $no</h2>
            <h3>$head</h3>
            <h4>Major Concepts to be covered:</h4>";
        global $database;
        $sql= "select * from $table where mno=$no";
        $result=$database->query($sql);
        while($module= mysql_fetch_array($result)){
            echo "<li>".$module['name']."</li>";
        }
    }
    if($opt=="about"){
?>
    <div id="wdp-team">
        <h2>Oracle WDP Team</h2>
        <div id="wdp-team-image"><img src="images/DSC00344.jpg" height="250px" width="350px"/></div>
        <div id="wdp-team-desc">Oracle Corporation launched the Workforce Development Program (WDP) to address the skills shortage challenge in the
        global Information Technology (IT) industry. This program also strives to meet the need for accessible and low cost IT skills training.
        WDP allows for easy and low-cost access to authorized Oracle training across the country. This program provides opportunity to the students to
        become oracle certified professionals.
        </div>
    </div>
    <div id="wdp-faculty">
        <h2>Faculty Associates</h2>
        <?php
            $faculties= Faculty::find_all_faculty();
            echo "<ul>";
            foreach($faculties as $faculty){
               echo "<li class='fac-info'>";
               echo "<div id='fac-left'><img src='images/$faculty->imageLink' height='100px' width='73px' /></div>";
               echo "<div id='fac-right'><h4>$faculty->name, $faculty->designation, $faculty->school</h4>";
               echo "<h5>$faculty->post</h5><br />";
               echo "Division: $faculty->division, Cabin:$faculty->cabin";
               echo "<br />Email: $faculty->email";
               echo "</div></li>";
            }
            echo "</ul>";
            
        ?>
    </div>

<?php } 
    else if($opt=="O-mod"){
?>
<h2>Oracle WorkForce Development Program - <span class="mod">Oracle Modules</span></h2>
<div class="upper-mods">
    <div class="module1">
        <?php
            get_module("oraclemodules",1,"ORACLE 10g: INTRODUCTION TO SQL");
        ?>
    </div>
    <div class="module2">
        <?php
            get_module("oraclemodules",2,"ORACLE 10G: PROGRAM WITH PL/SQL");
        ?>
    </div>
</div>
<div class="lower-mods">
    <div class="module3">
        <?php
            get_module("oraclemodules",3,"ORACLE 10G: DATABASE ADMINISTRATION–I");
        ?>
    </div>
    <div class="module4">
        <?php
            get_module("oraclemodules",4,"ORACLE 10G: DATABASE ADMINISTRATION–II");
        ?>
    </div>
</div>


 <?php   }
    else if($opt=="J-mod"){
    ?>
<h2>Oracle WorkForce Development Program - <span class="mod">JAVA Modules</span></h2>
<div class="upper-mods">
    <div class="module1">
        <?php
            get_module("javamodules",1,"Fundamentals of JAVA Programming Language, Java SE 6");
        ?>
    </div>
    <div class="module2">
        <?php
            get_module("javamodules",2,"JAVA Programming Language, Java SE 6");
        ?>
    </div>
</div>
<div class="lower-mods">
    <div class="module3">
        <?php
            get_module("javamodules",3,"Developing Applications with Java SE 6 Platform");
        ?>
    </div>
    <div class="module4">
        <?php
            get_module("javamodules",4,"Web Component Development with Servlets & JSP, Java EE 6");
        ?>
    </div>
</div>
        
<?php }
    else if($opt=="schedule"){
    ?>
    <h2>Schedules</h2>
    
    <div id="o-schedule">
        <h3>Oracle Modules</h3>
        <ul>
            <li><a href="docs/O-Module-1.pdf" target="_blank">ORACLE 10g: INTRODUCTION TO SQL</a></li>
            <li><a href="docs/O-Module-2.pdf" target="_blank">ORACLE 10G: PROGRAM WITH PL/SQL</a></li>
            <li><a href="docs/O-Module-3.pdf" target="_blank">ORACLE 10G: DATABASE ADMINISTRATION-I</a></li>
            <li><a href="docs/O-Module-4.pdf" target="_blank">ORACLE 10G: DATABASE ADMINISTRATION-II</a></li>
        </ul>
    </div>
    <div id="j-schedules">
        <h3>Java Modules</h3>
        <ul>
            <li><a href="docs/J-Module-1.pdf" target="_blank">Fundamentals of JAVA Programming Language, Java SE 6</a></li>
            <li><a href="docs/J-Module-2.pdf" target="_blank">JAVA Programming Language, Java SE 6</a></li>
            <li><a href="docs/J-Module-3.pdf" target="_blank">Developing Applications with Java SE 6 Platform</a></li>
            <li><a href="docs/J-Module-4.pdf" target="_blank">Web Component Development with Servlets & JSP, Java EE 6</a></li>
        </ul>
    </div>
<?php }
    else if($opt=="reg"){
?>
<h2>Registration Procedure</h2>
<h3>Step-1</h3>
<p>Kindly take Demand Draft in favour of VIT University payable at vellore.
Submit to - <span class="highlight">Mrs.S.Kanagalatha,SJT322</span>,
SCSE, School Office.</p>
<h3>Step-2</h3>
Fill the following Form to complete the registration :
<?php
reg_form();
?>
           
<?php }
    else if($opt=="contact"){
       contact_form();
    }
?>