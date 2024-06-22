<!DOCTYPE html>
<html>
<head>
  <title>Table with Search Bar</title>
  <style>
    /* CSS Styles */
    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .search-container {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 10px;
    }

    .search-container input {
      padding: 5px;
      border: 1px solid #ddd;
      border-radius: 3px;
      width: 200px;
    }
  </style>
</head>
<body>
  <div class="search-container">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search...">
  </div>

  <table id="myTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>national</th>
        <th>phone</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
                    $conn =new mysqli('localhost','root','','ma3rad');
                    $sql = "SELECT * FROM applied";
                    $result= $conn->query($sql);

                    if(!$result)
                    {
                        die("Invalid query".$conn->error);
                    }
                    while($row=$result->fetch_assoc()){
                        echo"                <tr>
                    <td>".$row['opportunity']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['national']."</td>
                    <td>".$row['phone']."</td>
                </tr>";
                    }
                ?>
      </tr>
    </tbody>
  </table>

  <script>
    function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          if (td[j].textContent.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break;
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
</body>
</html>