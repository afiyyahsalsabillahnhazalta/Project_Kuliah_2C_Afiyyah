<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 4</title>
</head>
<body>
    <form method="post" action="proses.php">
        <label>Nilai 1</label>
        <input type="text" name="Nilai1"><br>

        <label>Nilai 2</label>
        <input type="text" name="Nilai2"><br>
        <input type="submit" name="submit" value="Proses">
    </form>
</body>
</html>

<?php
echo $_REQUEST['Nilai1']."<br>";
echo $_POST['Nilai2']. "<br>";
?>