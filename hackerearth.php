
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
    <h1>HACKEREARTH</h1>
<form class="form" method="post" action="hackerback.php">
  <input type="text" style="background-color:{{handle}}" ng-model="handle" name="search" required><br />
  <button type="submit" class="btn btn-success" >search</button>
  <h1 style="background-color:{{handle}}" >{{handle | uppercase}}</h1>
</form>
</div>
<script>
  angular.module('myapp',[]).controller('myctrl',function($scope){
    $scope.handle="jugta";
  });
</script>

</body>
</html>