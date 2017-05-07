<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','rb11vg','5057591','rb11vg');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"Composer_Song");  //select the song and display composer data
$sql="SELECT * FROM Song_ID WHERE Composer_ID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Composer name</th>
<th>Birthday</th>
<th>Year of death</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Composer_Name'] . "</td>";
    echo "<td>" . $row['Composer_Born'] . "</td>";
    echo "<td>" . $row['Composer_Death'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>