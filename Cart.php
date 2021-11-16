<?php
include "header.php";
$cart = getCart();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
    <div style="text-align:center;width: 600px;margin: 0 auto;"> 
<h1>Inhoud Winkelwagen</h1>
<table>
  <tr>
    <th>Product</th>
    <th>Aantal</th>
  </tr>
  <?php
  foreach($cart as $productID => $amount){
  print("<tr>");
  print("<th>$productID</th>");
  print("<th>$amount</th>");
  print("</tr>");
  }
  ?>
</table> 
<p><a href='/'>Terug naar webshop</a></p>
</div>
</body>
</html>