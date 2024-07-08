<?php
require '/Control/db.php';

$query = "SELECT * FROM students_db";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='table_content'>";
    echo "<td>". $row['ID']. "</td>";
    echo "<td>". $row['NAME']. "</td>";
    echo "<td>". $row['FAMILYNAME']. "</td>";
    echo "<td>". $row['LEVEL']. "</td>";
    echo "<td>". $row['BIRTH_DATE']. "</td>";
    echo "<td>". $row['PLACE_OF_BIRTH']. "</td>";
    echo "<td>". $row['FIELD']. "</td>";
    echo "<td>". $row['BRANCH']. "</td>";
    echo "</tr>";
}
?>
