<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db = $conn;
$tableName = "images";
$columns = ['id', 'image_name', 'Time_img_shown'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id DESC";
    $result = $db->query($query);

    if ($result == true) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
        } else {
            $msg = "No Data Found";
        }
    } else {
        $msg = mysqli_error($db);
    }
    return $msg;
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/home.css" type="text/css">
</head>

<body>
    <div class="fadein">
    <h2 style="text-align : center">TASK 2</h2>
        <form action="index.php" method="POST">
            <input type="submit" value="Back" style="background-color:green;
            color:white" />
        </form>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image_name</th>
                            <th>Time_img_shown</th>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($fetchData)) {
                            $id = 1;
                            foreach ($fetchData as $data) {
                        ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $data['image_name'] ?? ''; ?></td>
                                    <td><?php echo $data['Time_img_shown'] ?? ''; ?></td>
                                </tr>
                        <?php
                                $id++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>