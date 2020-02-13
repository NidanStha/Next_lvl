<html>
<head>
  <?php include "connect.php"; include "header.php"; ?>
</head>
<body>
  <?php include "nav.php"; ?>
  <session class="main-body">
    <h2 class="field-heading">Update Employee Data</h2>
    <form action="insert.php" method="get" class="emp-ins">
      <div class="inp-fields">
        <input type="text" name="Name" id="name" class="emp-ins-inp" placeholder="Name" autocomplete="off" required>
      </div>
      <div class="inp-fields">
        <input type="text" name="Address" id="address" class="emp-ins-inp" placeholder="Address" autocomplete="off" required>
      </div>
      <div class="inp-fields">
        <input type="radio" name="Gender" value="Male" id="male" class="emp-radio">
        <label for="male">Male</label>
        <input type="radio" name="Gender" value="Female" id="female" class="emp-radio">
        <label for="female">Female</label>
      </div>
      <div class="inp-fields">
        <input type="text" name="Number" id="" class="emp-ins-inp" placeholder="Number" autocomplete="off" required>
      </div>
      <input type="submit" name="Submit" class="emp-ins-btn">
    </form>
    <?php
    if (isset($_GET['Submit'])) {
      $name = $_GET['Name'];
      $address = $_GET['Address'];
      $gender = $_GET['Gender'];
      $number = $_GET['Number'];
      
    }
    ?>
  </session>
</body>
</html>
