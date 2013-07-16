<?php
session_start();
require_once("admin-header.php");
require_once("../includes/initialize.php");

?>
<?php
    if(isset($_POST['submit'])){
        $username= $_POST['username'];
        $password= $_POST['password'];
        $sql="select * from admin where username='$username' and password='$password' limit 1";
        $result=$database->query($sql);
        if(mysql_numrows($result)==1){
            $_SESSION['username']= $username;
            redirect_to("index.php");
        }
        else {
            $message= "Username/ Password incorrect !";
        }
    }
?>
<div id="right-content">
    <div id="login-box">
        <?php if(!empty($message)) echo $message; ?>
            <div class="log-head">
                <h2>Admin Login</h2>
            </div>
        
        <div class="log-body">
            <form name="tech-form" id="tec-login-form" method="post" onsubmit="">
                <table>
                    <tr>
                        <td class="label"><label>Username:</label></td>
                        <td><input type="text" name="username" value="" /></td>
                    </tr>
                    <tr>
                        <td class="label"><label>Password:</label></td>
                        <td><input type="password" name="password" value="" /></td>
                    </tr>
                    <tr>
                        <td class="label"><label></label></td>
                        <td><input type="submit" name="submit" value="Login" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</div><!-- Wrapper closed -->
<div id="footer">
    &copy; 2012 | Website Developed By <span id="credits">Gaurav Doshi (10BCE0301) | Ankit (10BCE0065)</span> 
</div>