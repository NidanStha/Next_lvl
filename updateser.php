<html>
<head>
  <?php include "connect.php"; include "header.php"; ?>
</head>
<body>
  <?php include "nav.php"; ?>
  <session class="main-body">
    <h2 class="field-heading">Search Employee Data</h2>
    <form action="updateser.php" method="get" class="emp-ins">
      <div class="inp-fields">
        <input type="text" name="Name" id="name" class="emp-ins-inp" placeholder="Employee Name" autocomplete="off" required>
      </div>
      <input type="submit" value="Search" name="Submit" class="emp-ser-btn">
    </form>
    <?php
      if (isset($_GET['Submit'])) {
        $name = $_GET['Name'];
        $qry = "SELECT * from tb_employee where Name='$name'";
        $result = $con->query($qry);
        $row = $result->fetch_object();
        if(isset($row)){
          session_start();
          $_SESSION['oper_ed'] = $row->SN;
          header("location:" . "update.php");
        }else{
          echo "<div class='popup'>$name not found</div>";
        }
      }
    ?>
  </session>
</body>
</html>
