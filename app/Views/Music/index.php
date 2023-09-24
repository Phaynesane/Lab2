<?php include 'include/First.php'; ?>
<body>
    <?php include 'include/Second.php';?>
    <?php include 'include/Third.php';?>

    <form action="/searchMusic" method="get">
        <input type="search" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>
</body>