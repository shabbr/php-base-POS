<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .a{
        text-decoration:none;
        color:black;
    }
    </style>
</head>
<body>
    
</body>
</html><?php

include('config.php');
$sql="SELECT
report_id,
customer_name,
SUM(total_price) AS purchase_amount,
SUM(cquantity) AS total_quantity,
COUNT(*) AS product_name,
MAX(date) AS purchase_date
FROM
customer_detail
GROUP BY
report_id, customer_name";
 
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    echo "<table border=1 ><thead> <tr>
    <th>Customer Name </th>
    <th>Products </th>
    <th>Quantity </th>
    <th>Date</th>
    <th>Details</th>

   </tr></thead> <tbody> ";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
    echo "<td>" . $row['customer_name'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['total_quantity'] . "</td>";
    echo "<td>" . $row['purchase_date'] . "</td>";
    echo "<td> <a  class='a' href='reports_details.php?report_id=". $row['report_id']."' >Details</a></td>";
    echo "</tr>";
    } 
    echo "</tbody></table>";
}
?>