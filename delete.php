<html>
<head>
  <?php include "connect.php"; include "header.php"; ?>
</head>
<body>
  <?php include "nav.php";
    session_start();
    $oper_del = $_SESSION['oper_del'];
    $qry = "SELECT * from tb_employee where SN='$oper_del'";
    $result = $con->query($qry);
    $row = $result->fetch_object();
  ?>
  <session class="main-body">
    <h2 class="field-heading">Delete Employee Data</h2>
    <form action="delete.php" method="get" class="emp-ins">
      <div class="inp-fields">
        <input type="text" name="Name" id="name" class="emp-ins-inp" value="<?php echo $row->Name; ?>" placeholder="Name" autocomplete="off" required disabled>
      </div>
      <div class="inp-fields">
        <input type="text" name="Address" id="address" class="emp-ins-inp" value="<?php echo $row->Address; ?>" placeholder="Address" autocomplete="off" required disabled>
      </div>
      <div class="inp-fields">
        <?php
          echo ($row->Gender == 'Male')?
            '<input type="radio" name="Gender" value="Male" id="male" class="emp-radio" checked disabled>
            <label for="male">Male</label>
            <input type="radio" name="Gender" value="Female" id="female" class="emp-radio" disabled>
            <label for="female">Female</label>' :
            '<input type="radio" name="Gender" value="Male" id="male" class="emp-radio" disabled>
            <label for="male">Male</label>
            <input type="radio" name="Gender" value="Female" id="female" class="emp-radio" checked disabled>
            <label for="female">Female</label>'
        ?>

      </div>
      <div class="inp-fields">
        <input type="text" name="Number" id="" class="emp-ins-inp" value="<?php echo $row->Contact; ?>" placeholder="Number" autocomplete="off" required disabled>
      </div>
      <input type="submit" name="Del" value="Delete" class="emp-del-btn">
    </form>
    <?php
      if (isset($_GET['Del'])) {
        $qry = "DELETE from tb_employee where SN='$oper_del'";
        $con->query($qry);
        header("location:" . "index.php");
      }
    ?>
  </session>
</body>
</html>
