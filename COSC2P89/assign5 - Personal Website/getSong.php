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

mysqli_select_db($con,"Song");  //select a song and display which album it is in and who composed it
$sql="SELECT * FROM Song WHERE Song_ID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Song Title</th>
<th>Album Title</th>
<th>Composer Title</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Song_Title'] . "</td>";
    echo "<td>" . $row['Album_title'] . "</td>";
    echo "<td>" . $row['Composer_Death'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>