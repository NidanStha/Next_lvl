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
            echo"<td>" . $i . "</td>";
            echo"<td>" . $row->Name . "</td>";
            echo"<td>" . $row->Address . "</td>";
            echo"<td>" . $row->Gender . "</td>";
            echo"<td>" . $row->Contact . "</td>";
            echo "</tr>";
            ++$i;
          }
        }
      ?>
    </table>
  </session>
</body>
</html>
