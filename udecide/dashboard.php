<?php
//require_once 'cDashboard.php';

	$id05 = array(
		"name" => "Luxury Car Brands05",
		"id" => 5,
		"date" => "23:59 22 Dec 2012",
		"total" => 20
	);
	$id04 = array(
		"name" => "Smart phone brands04",
		"id" => 4,
		"date" => "23:59 21 Dec 2012",
		"total" => 40
	);
	$id03 = array(
		"name" => "Luxury Car Brands03",
		"id" => 3,
		"date" => "23:59 20 Dec 2012",
		"total" => 60
	);
	$id02 = array(
		"name" => "Smart phone brands02",
		"id" => 2,
		"date" => "23:59 20 Dec 2012",
		"total" => 80
	);
	$id01 = array(
		"name" => "Luxury Car Brands01",
		"id" => 1,
		"date" => "23:59 19 Dec 2012",
		"total" => 100
	);
	$arr = array($id05, $id04, $id03, $id02, $id01);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<style type="text/css">
.logo {
	float: left;
	margin: 25px;
	display: inline;
}
.nav {
	position: relative;
	float: right;
	display: inline;
	right: 100px;
}
.nav li {
	float:left;
	margin-right: 15px;
	margin-left: 15px;
	font-size: 18px;
	margin-top: 45px;
}
.nav li a {
	color: #666;
}
.nav li a:hover {
	color: #000;
	background-color: #EEE;
}
.elementnone {
	display: none;
}
.elementinline {
	display: inline;
}
.elementblock {
	display: block;
}
.selectable {
}
.selectable:hover {
	background-color: #EEF;
}
.divborder4 {
	position: relative;
	background-color: #fff;
	border: 1px solid #ddd;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	margin-top: 15px;
	margin-right: 0;
	margin-bottom: 15px;
	margin-left: 0;
	padding-top: 19px;
	padding-right: 19px;
	padding-bottom: 2px;
	padding-left: 19px;
}
</style>
</head>

<body>
    <div class="container" style="background-color: #EEE; margin-bottom: 5px">
    <!--Side bar-->
    <a href="login.php"><img src="img/udecide_logo6.png" class="logo"/></a>
    <!--Survey menu-->
    <ul class="nav hidden-tablet hidden-phone">
            <li><a href="login.php">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="examples.html">Examples</a></li>
            <li><a href="contact.html">Contact us</a></li>
    </ul>
    </div>
    
	<div class="container">
    <div style="float: right;">
    <a href="create.html"><button class="btn btn-primary" >Create New Survey</button></a>
    <a href="index.html"><button class="btn btn-primary" style="margin-left: 10px;">Log out</button></a>
    </div>
    
    <div style="width: 870px;">
    <h1 style="margin-top: 20px; margin-bottom: 30px;">Results</h1>
    <div class="divborder4" style="width: 860px;">
    <table class="table" id="disptable" style="width: 800px;">
    <thead><tr>
    <th><p class="lead" style="width: 250px; margin-top: 5px;">Survey Name</p></th>
    <th><p class="lead" style="width: 80px; margin-top: 5px;">id</p></th>
    <th><p class="lead" style="width: 230px; margin-top: 5px;">Posted on</p></th>
    <th><p class="lead" style="width: 240px; margin-top: 5px;">Number of Responses</p></th>
    </tr></thead>
    <tbody id="tablebody">
    </tbody>
    </table>
    </div>
    <script type="text/javascript">
		var obj=<?php echo json_encode($arr); ?>;
		for (var i = 0; i < obj.length; i++) {
		document.getElementById('tablebody').innerHTML +=
		"<tr class='selectable' style='cursor: pointer;' onclick='window.location.href=\"result.php?id=" + obj[i].id +"\"'><td><p class='lead' style='color: #0088cc;'>" + obj[i].name + "</p></a></td><td><p class='lead'>" + obj[i].id + "</p></td><td><p class='lead'>" + obj[i].date + "</p></td><td><p class='lead'><i class='icon-chevron-right' style='float: right; margin-top: 10px; margin-right: 15px;'></i>" + obj[i].total + "</p></td></tr>";
		}
	</script>
    </div>
    </div>
</body>
</html>
