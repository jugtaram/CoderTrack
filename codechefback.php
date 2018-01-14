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
  <body ng-app="myapp" ng-controller="myctrl"
  style="background:url('http://cdn.wonderfulengineering.com/wp-content/uploads/2014/04/code-wallpaper-8.jpg')" >

<?php
include('navbar.php');
?>
<div align="center" style="margin-top:200px " >
   <h1>CODECHEF</h1
<form class="form" method="post" action="codechefback.php">
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
    $url = 'https://www.codechef.com/users/'.$value;
    $result=curlFile($url,$proxy_ip,$proxy_port,$loginpassw);
    ?>
    <div align="center" style="background-color:black;color:white">
      <?php
    //$res=file_get_contents($url);
    //echo $result;
      if(!$result)
      {
        echo "<h1>invalid handle</h1>";
      }
      else
      {
    $match[0]=array();
    preg_match_all('!<span>[a-zA-Z0-9\s\_]*<\/span>!',$result, $match);
    // $string_version = implode(' ', $match[0]);
  echo "<hr><span>USERNAME:</span>  ".$match[0][1]."<hr><br />";
  echo "<hr><span>STATE:</span>  ".$match[0][2]."<hr><br />";
   echo "<hr><span>CITY:</span>  ".$match[0][3]."<hr><br />";
    echo "<hr><span>MOTTO:</span>  ".$match[0][4]."<hr><br />";
     echo "<hr><span>PROFESSION:</span>  ".$match[0][5]."<hr><br />";
      echo "<hr><span>INSTITUTION:</span>  ".$match[0][sizeof($match[0])-1]."<hr><br />";
  //   if(preg_match_all('/[a-zA-Z0-9\s\_]*/',,$crt))
  //      $content[$i]=$crt;
  // }
    // print_r($content);
    preg_match_all('/<span class="user-country-name" style="vertical-align:bottom">([a-zA-Z0-9]*)<\/span>/s',$result, $match);
     echo "<hr><span>COUNTRY:</span>  ".$match[0][0]."<hr><br />";
    // preg_match_all('!<span>[a-zA-Z0-9]*<\/span>!',$result, $match);
    // print_r($match);
    preg_match_all('!<div class="rating-number">[0-9]*<\/div>!',$result, $match);
     echo "<hr><span>RATING:</span>  ".$match[0][0]."<hr><br />";

    preg_match_all('!<span style="background-color:#[a-zA-Z0-9]*">[\S]*<\/span>!',$result, $match);
    $matc=" ";
    for($i=0;$i<count($match[0]);$i++)
      $matc.=$match[0][$i];
     echo "<hr><span>STAR:</span>  ".$matc."<hr><br />";
    

    preg_match_all('!<strong>[0-9]*<\/strong>!',$result, $match);
     echo "<hr><span>WORLD RANK:</span>  ".$match[0][0]."<hr><br />";
      echo "<hr><span>COUNTRY RANK:</span>  ".$match[0][1]."<hr><br />";
 preg_match_all('!<h5>[a-zA-Z0-9\s]* \(\d{0,3}\)<\/h5>!',$result, $match);
     echo "<hr>  ".$match[0][0]."<hr><br />";
      echo "<hr>  ".$match[0][1]."<hr><br />";
 preg_match_all('!<small>\([a-zA-Z0-9\s]*\)<\/small>
!',$result, $match);
  echo "<hr>  ".$match[0][0]."<hr><br />";
 }
   

?>
</div>
</body>
</html>
