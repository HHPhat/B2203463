<!DOCTYPE HTML>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name_major FROM major";
$result = $conn->query($sql);
?>
<body>
<form action="luu.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Birthday: <input type="date" name="birth"><br>
Ngành học: <select name="major" id="major">
            <option value="">-- Chọn ngành học --</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_major'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>
<input type="submit">
</form>
</body>
</html>
