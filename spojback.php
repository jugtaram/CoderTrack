<?php
$value=$_POST['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CoderTrack</title>
  <meta name="keyword" content="coderaccount,allcodingaccount,codertarget">
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1,width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Volkhov" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.0/css/all.css" rel="stylesheet">
 
  </head>
  <body ng-app="myapp" ng-controller="myctrl" style="background:url('http://cdn.wonderfulengineering.com/wp-content/uploads/2014/04/code-wallpaper-8.jpg')">

<?php
include('navbar.php');
?>
<div align="center" style="margin-top:200px " >
   <h1>SPOJ</h1>
<form class="form" method="post" action="spojback.php">
  <input type="text" style="background-color:{{handle}}" ng-model="handle" name="search" required><br />
  <button type="submit" class="btn btn-success" >search</button>
  <h1 style="background-color:{{handle}}" >{{handle | uppercase}}</h1>
</form>
</div>
<script>
  angular.module('myapp',[]).controller('myctrl',function($scope){
    $scope.handle="jagat100";
  });
</script>

<?php
function curlFile($url,$proxy_ip,$proxy_port,$loginpassw)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);
   $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpCode!=
  200)
{
  curl_close($ch);
return 0;
}
else{
    curl_close($ch);

    return $data;
  }
}
$loginpassw = 'edcguest:edcguest';
    $proxy_ip = '172.31.52.52';
    $proxy_port = '3128';
    $url = 'http://www.spoj.com/users/'.$value.'/';
    $result=curlFile($url,$proxy_ip,$proxy_port,$loginpassw);
    ?>
    <div align="center" style="background-color:black;color:white">
    <?php
    if(!$result)
      {
        echo "<h1>invalid handle</h1>";
      }
      else
      {
    $match[0]=array();
    preg_match_all('!<h\d{1}>[\@\_a-zA-Z0-9\s]*<\/h\d{1}>!',$result, $match);
 echo "<hr><span>NAME:  ".$match[0][0]."</span><hr>";
 echo "<hr><span>USERNAME:</span>  ".$match[0][1]."</span><hr>";
 preg_match_all('/<p><i class="fa fa-[a-zA-Z0-9\-\s]*"><\/i>[a-zA-Z0-9\,\(\)\:\#\s\.]*<\/p>/s',$result, $match);
   echo "<hr><span>FROM:</span>  ".$match[0][0]."<hr>";
    echo "<hr><span>MEMBERSHIP:</span>  ".$match[0][1]."<hr>";
    echo "<hr>  ".$match[0][2]."<hr>";
      echo "<hr> ".$match[0][3]."<hr>";
     preg_match_all('/<dd>\d{0,4}<\/dd>/s',$result, $match);
      echo "<hr><span>PROBLEM SOLVED:</span>  ".$match[0][0]."<hr>";
      echo "<hr><span>SOLUTIONS SUBMITTED:</span>  ".$match[0][1]."<hr>";
    }

?>
</div>
</body>
</html>
