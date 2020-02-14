<?php
  $con = new mysqli('localhost','root','','db_employee');
  if($con->connect_errno){
    echo "database not found!";
    $host='localhost';
    $user='root';
    $pass='';
    $conn=new mysqli($host,$user,$pass);
    $db="CREATE DATABASE db_employee";
    if($conn->query($db)){
      echo "<div class='popup'>db_employee Not Found</div>";
      echo "<div class='popup-true'>db_employee Database Created</div>";
    }
  }
  if(!$con->query("SELECT * from tb_employee;")){
    $tb="CREATE TABLE tb_employee (
      SN int(100) AUTO_INCREMENT PRIMARY KEY,
      Name varchar(50) not null,
      Address varchar(100) not null,
      Gender varchar(10) not null,
      Contact int(11))";
    if ($con->query($tb)) {
      echo "<div class='popup'>tb_employee Not Found</div>";
      echo "<div class='popup-true'>tb_employee Table Created</div>";
    }
  }
 ?>
