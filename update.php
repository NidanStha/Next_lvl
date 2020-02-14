<html>
<head>
  <?php include "connect.php"; include "header.php"; ?>
</head>
<body>
  <?php include "nav.php"; ?>
  <session class="main-body">
    <h2 class="field-heading">Update Employee Data</h2>
    <?php
      session_start();
      $oper_ed=$_SESSION["oper_ed"];
      $qry = "SELECT * from tb_employee where SN='$oper_ed'";
      $result = $con->query($qry);
      $row = $result->fetch_object();
    ?>
    <form action="update.php" method="get" class="emp-ins">
      <div class="inp-fields">
        <input type="text" name="Name" id="name" class="emp-ins-inp" value="<?php echo $row->Name; ?>" placeholder="Name" autocomplete="off" required>
      </div>
      <div class="inp-fields">
        <input type="text" name="Address" id="address" class="emp-ins-inp" value="<?php echo $row->Address; ?>" placeholder="Address" autocomplete="off" required>
      </div>
      <div class="inp-fields">
        <?php
          echo ($row->Gender == 'Male')?
            '<input type="radio" name="Gender" value="Male" id="male" class="emp-radio" checked>
            <label for="male">Male</label>
            <input type="radio" name="Gender" value="Female" id="female" class="emp-radio">
            <label for="female">Female</label>' :
            '<input type="radio" name="Gender" value="Male" id="male" class="emp-radio">
            <label for="male">Male</label>
            <input type="radio" name="Gender" value="Female" id="female" class="emp-radio" checked>
            <label for="female">Female</label>'
        ?>

      </div>
      <div class="inp-fields">
        <input type="text" name="Number" id="" class="emp-ins-inp" value="<?php echo $row->Contact; ?>" placeholder="Number" autocomplete="off" required>
      </div>
      <input type="submit" name="Submit" class="emp-ins-btn">
    </form>
    <?php
    if (isset($_GET['Submit'])) {
      $name = $_GET['Name'];
      $address = $_GET['Address'];
      $gender = $_GET['Gender'];
      $number = $_GET['Number'];
      if (strlen($number)!==10) {
        echo "<div class='popup'>Invalid number</div>";
        header("location:" , $_SERVER['PHP_SELF']);
      }else {
        $qry = "UPDATE tb_employee set Name='$name',Address='$address',Gender='$gender',Contact='$number' where SN='$oper_ed'";
        $con->query($qry);
        header("location:" . "index.php");
        session_destroy();
      }
    }
    ?>
  </session>
</body>
</html>
