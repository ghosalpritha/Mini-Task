<html>
<title>Mini-task</title>
<head>
<link rel="stylesheet" href="./css/home.css" type="text/css">
</head>

<body>
    <?php include 'createDb.php'; ?>
    <?php include 'createTable.php'; ?>
    <?php include 'truncateTable.php'; ?>

    <h2 style="text-align : center">TASK 1</h2>
    <div id="showButton">
        <form action="showTable.php" method="POST">
            <input class="mx-6" type="submit" value="Show Table" style="background-color:green;
            color:white" />
        </form>
    </div>
    <div class="fadein">
        <?php
        $dir = "images/";
        $files = glob($dir . '*.jpg');
        $scan_dir = scandir($dir);
        shuffle($scan_dir);
        foreach ($scan_dir as $img) {
            if (in_array($img, array('.', '..')))
                continue;
        ?>
            <div class="slides fade">
                <img src="<?php echo $dir . $img ?>" alt="<?php echo $img ?>">
            </div>
        <?php
        }
        ?>
        <script type="text/javascript">
            let slideIndex = 0;
            let showTableButton = false;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("slides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex <= slides.length)
                    slides[slideIndex - 1].style.display = "block";

                if (slideIndex < slides.length) {
                    setTimeout(showSlides, 3000);
                    document.getElementById("showButton").style.visibility = "hidden";
                } else {
                    document.getElementById("showButton").style.visibility = "visible";
                }
            }
        </script>
        <?php include "insertTime.php"; ?>
    </div>
</body>

</html>