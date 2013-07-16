<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Oracle @ VIT Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="../stylesheet/style.css?version=5" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../javascript/es_js.js?version=1"></script>
</head>
<body>
    <div id="wrapper" class="group">
        <div id="header">
        <h1><a href="../index.php" id="home-link">OWDP</a></h1>
        <div id="wdpLogo">
            <img src="../images/wdplogo.png" />
        </div>
        <div id="at">
            <img src="../images/at.png" height="70px" width="70px" />
        </div>
        <div id="vitLogo">
            <img src="../images/vitlogo.png" />
        </div>
        </div>
        <?php if(isset($_SESSION['username'])) { ?>
        <div id="nav">
            <ul>
                <li><a href="index.php" class="first">Payment</a></li>
                <li><a href="index.php?op=reg">Registrations</a></li>
                <li><a href="index.php?op=quer">Queries</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <?php } ?>