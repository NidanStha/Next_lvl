<html>
<head>
  <?php include "connect.php"; include "header.php"; ?>
</head>
<body>
  <?php include "nav.php"; ?>
  <session class="main-body">
    <h2 class="field-heading">Employee Status</h2>
    <table class="status-table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Contact</th>
        <th colspan="2">Operation</th>
      </tr>
      <?php
        $i=1;
        $query = "SELECT * from tb_employee";
        $result=$con->query($query);
        if ($result->num_rows==0) {
          echo "<tr><td colspan='100%'><b>No data in Table</b></td></tr>";
        }else{
          while($row=$result->fetch_object()){
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row->Name . "</td>";
            echo "<td>" . $row->Address . "</td>";
            echo "<td>" . $row->Gender . "</td>";
            echo "<td>" . $row->Contact . "</td>";
            echo "<td><form action='index.php' method='get'>" .
                    "<button class='opr-btn' name='oper_del' value='$row->SN'>Delete</button></form></td>" .
                  "<td><form action='index.php' method='get'>" .
                    "<button class='opr-btn' name='oper_ed' value='$row->SN'>Edit</button></form></td>";
            echo "</tr>";
            ++$i;
          }
        }
      ?>
      <?php
        if (isset($_GET['oper_del'])) {
          $oper=$_GET['oper_del'];
          $qry = "DELETE from tb_employee where SN='$oper'";
          if($con->query($qry)){
            echo "<div class='popup-true'>Deleted</div>";
            sleep(1);
            header("location:" . $_SERVER['PHP_SELF']);
          }
        }
        if (isset($_GET['oper_ed'])) {
          session_start();
          $oper_ed=$_GET['oper_ed'];
          $_SESSION["oper_ed"] = $oper_ed;
          header("location:" . "update.php");
        }
       ?>
    </table>
  </session>
</body>
</html>
