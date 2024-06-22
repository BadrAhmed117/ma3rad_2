<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
</head>
<body style="margin: 50px;">

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fname</th>
                    <th>Sname</th>
                    <th>Job Name</th>
                    <th>Company Name</th>
                    <th>Company Activity</th>
                    <th>Telephone</th>
                    <th>Mobile</th>
                    <th>Web</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $conn =new mysqli('localhost','root','','ma3rad');
                    $sql = "SELECT * FROM users";
                    $result= $conn->query($sql);

                    if(!$result)
                    {
                        die("Invalid query".$conn->error);
                    }
                    while($row=$result->fetch_assoc()){
                        echo"                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['fname']."</td>
                    <td>".$row['sname']."</td>
                    <td>".$row['job']."</td>
                    <td>".$row['cname']."</td>
                    <td>".$row['cactivity']."</td>
                    <td>".$row['telephone']."</td>
                    <td>".$row['mobile']."</td>
                    <td>".$row['web']."</td>
                    <td>".$row['city']."</td>
                    <td>".$row['country']."</td>
                    <td>".$row['status']."</td>
                </tr>";
                    }
                ?>


            </tbody>
        </table>

</body>
</html>