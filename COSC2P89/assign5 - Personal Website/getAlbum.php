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

mysqli_select_db($con,"Album");  //select the album and display the tracklist with album data
$sql="SELECT * FROM Album WHERE Album_Title = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Album Title</th>
<th>Album Year</th>
<th>Album Cover</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Album_Title'] . "</td>";
    echo "<td>" . $row['Album_Year'] . "</td>";
    echo "<td>" . $row['Album_Cover'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>