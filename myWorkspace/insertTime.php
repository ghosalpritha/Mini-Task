<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";
    $conn = mysqli_connect($servername, $username, $password, $dbname, "3306");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $current_time = time();
    $id=1;
    foreach ($scan_dir as $img) {
        if (in_array($img, array('.', '..')))
            continue;
        $sql = "INSERT INTO IMAGES (id, image_name,Time_img_shown) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $time = date('H:i:s a', $current_time);
        $stmt->bind_param("sss", $id, $img, $time);
        $stmt->execute();
        $estimated_time = 3;
        $current_time += $estimated_time;
        $id++;
    }
    $conn->close();
    ?>