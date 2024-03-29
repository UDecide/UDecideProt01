<?php
require_once 'cResult.php';

$attribute1 = array("luxury", "sporty", "comfortable", "secure", "durable", "fashionable", "expensive", "noisy", "strong", "powerful");
$result1 = array(0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1);
$time1 = array(1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000);
$time2 = array(1371, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000, 1370, 1250, 1100, 1000, 1000);
$item5 = array(
    "id" => 5,
    "date" => "23:59, 22 Nov 2012",
    "results" => $result1,
    "times" => $time1
);
$item4 = array(
    "id" => 4,
    "date" => "23:59, 21 Nov 2012",
    "results" => $result1,
    "times" => $time1
);
$item3 = array(
    "id" => 3,
    "date" => "23:59, 20 Nov 2012",
    "results" => $result1,
    "times" => $time2
);
$item2 = array(
    "id" => 2,
    "date" => "23:59, 19 Nov 2012",
    "results" => $result1,
    "times" => $time1
);
$item1 = array(
    "id" => 1,
    "date" => "23:59, 18 Nov 2012",
    "results" => $result1,
    "times" => $time1
);
$item = array($item5, $item4, $item3, $item2, $item1);
$xdata1 = array(
    "op1name" => "Audi",
    "op2name" => "BMW",
    "attributes" => $attribute1,
    "items" => $item
        )
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>UDecide</title>

        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
            <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                        .selectable {
                        }
                        .selectable:hover {
                            background-color: #EEF;
                        }
                    </style>
                    <script type="text/javascript">
                        var obj;
                        var temp;
                        function writetable(x) {
                            document.getElementById('intro').style.display="none";
                            for (var i = 0; i <= 20; i++) {
                                temp=('tr'+i);
                                document.getElementById(temp).style.display="none";
                            }
                            document.getElementById('tb0b').innerHTML=obj.op1name;
                            document.getElementById('tb0c').innerHTML=obj.op2name;
                            for (var i = 0; i < obj.attributes.length; i++) {
                                temp = ('tb'+(i+1)+'a');
                                document.getElementById(temp).innerHTML=obj.attributes[i];
                                temp = ('tb'+(i+1)+'b');
                                if (obj.items[x].results[i] == 0) {
                                    document.getElementById(temp).innerHTML = 'True (' + obj.items[x].times[i] + 'ms)';
                                } else if (obj.items[x].results[i] == 1) {
                                    document.getElementById(temp).innerHTML = 'False (' + obj.items[x].times[i] + 'ms)';
                                } else {
                                    document.getElementById(temp).innerHTML = 'Missed';
                                }
                                temp = ('tb'+(i+1)+'c');
                                if (obj.items[x].results[i+obj.attributes.length] == 1) {
                                    document.getElementById(temp).innerHTML = 'True (' + obj.items[x].times[i+obj.attributes.length] + 'ms)';
                                } else if (obj.items[x].results[i+obj.attributes.length] == 0) {
                                    document.getElementById(temp).innerHTML = 'False (' + obj.items[x].times[i+obj.attributes.length] + 'ms)';
                                } else {
                                    document.getElementById(temp).innerHTML = 'Missed';
                                }
                            }
                            document.getElementById('c1').style.width='150px';
                            document.getElementById('c2').style.width='180px';
                            document.getElementById('c3').style.width='160px';
                            for (var i = 0; i <= 20; i++) {
                                temp=('tr'+i);
                                document.getElementById(temp).style.display="block";
                            }
                        }
                    </script>
                    </head>

                    <body>
                        <div class="container" style="width: 1160px; background-color: #EEE; margin-bottom: 5px">
                            <!--Side bar-->
                            <a href="index.php"><img src="img/udecide_logo6.png" class="logo"/></a>
                            <!--Survey menu-->
                            <ul class="nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="services.php">Services</a></li>
                                <li><a href="examples.php">Examples</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="container" style="width: 1160px;">
                            <div style="width: 550px; height: 500px; display: inline; overflow-y: auto; float: left;">
                                <h1>View Result</h1>
                                <p id="intro" class="lead">Individual results will be shown below after they have been selected in the right table.</p>
                                <table style='margin-top: 30px; width: 500px;'>
                                    <tr id='tr0' style='display: none;'>
                                        <td id='c1' style='width: 150px;'><p id='tb0a' class="lead"></p>
                                        </td>
                                        <td id='c2' style='width: 180px;'><p id='tb0b' class="lead"></p>
                                        </td>
                                        <td id='c3' style='width: 160px;'><p id='tb0c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr1' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb1a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb1b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb1c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr2' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb2a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb2b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb2c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr3' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb3a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb3b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb3c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr4' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb4a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb4b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb4c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr5' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb5a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb5b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb5c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr6' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb6a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb6b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb6c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr7' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb7a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb7b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb7c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr8' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb8a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb8b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb8c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr9' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb9a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb9b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb9c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr10' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb10a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb10b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb10c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr11' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb11a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb11b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb11c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr12' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb12a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb12b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb12c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr13' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb13a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb13b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb13c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr14' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb14a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb14b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb14c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr15' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb15a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb15b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb15c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr16' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb16a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb16b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb16c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr17' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb17a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb17b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb17c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr18' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb18a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb18b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb18c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr19' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb19a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb19b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb19c' class="lead"></p>
                                        </td>
                                    </tr>
                                    <tr id='tr20' style='display: none;'>
                                        <td style='width: 150px;'><p id='tb20a' class="lead"></p>
                                        </td>
                                        <td style='width: 180px;'><p id='tb20b' class="lead"></p>
                                        </td>
                                        <td style='width: 160px;'><p id='tb20c' class="lead"></p>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                            <div style="float: right;">
                                <button id="editbtn" class="btn btn-primary" style="margin-right: 15px;">Edit Survey</button>
                                <button id="viewsurvey" class="btn btn-primary" style="margin-right: 10px;">Preview Survey</button>
                            </div>

                            <div style="width: 500px; height: 500px; display: inline; overflow-y: auto; float: right;">
                                <div class="divborder4" style="width: 325px;">
                                    <table class="table" id="inditable" style="width: 325px;">
                                        <thead><tr>
                                                <td style="width: 70px;"><p class="lead">No.</p></td>
                                                <td style="width: 220px;"><p class="lead">Submit Time</p></td>
                                            </tr></thead>
                                        <tbody id='tablebody'>
                                        </tbody>
                                    </table>
                                </div>

                                <script type="text/javascript">
                                    function previewsurvey() {
                                        window.location.href="survey.php?id="+obj.id+"&preview=true";
                                    }
                                    document.getElementById('viewsurvey').onclick = previewsurvey;
                                    function editsurvey() {
                                        window.location.href="edit.php?id="+obj.id;
                                    }
                                    document.getElementById('editbtn').onclick = editsurvey;
                                    var obj=<?php echo json_encode($cresult); ?>;
                                    console.log(obj);
                                    var isEmpty = function(obj) {
                                        return obj.items=='';                                             
                                    }
                                    if (isEmpty(obj)) {
                                        document.getElementById('tablebody').innerHTML +="<tr class='selectable'><td colspan=\"2\"><p class='lead' style='color: #0088cc;text-align: center'>" +"No survey has been created"+ "</p></a></td></tr>";                                          
                                    }
                                    else {
                                        var j=1;
                                        for (var i = 0; i < obj.items.length; i++) {
                                            document.getElementById('tablebody').innerHTML +=
                                                "<tr class='selectable' style='cursor: pointer;' onclick='writetable(" + i + ");'><td><p class='lead' style='color: #0088cc;'>" + j + "</p></td><td><p class='lead'><i class='icon-chevron-right' style='float: right; margin-top: 10px; margin-right: 0px;'></i>" + obj.items[i].date + "</p></td></tr>";
                                            j++;
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                    </body>
                    </html>
