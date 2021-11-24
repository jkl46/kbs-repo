<?php
include "header.php";
$cart = getCart();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="Public/CSS/cart.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class='main-content'> 
<h1 class='cart-title'>Inhoud Winkelwagen</h1>
<table class='cart-table'>
  <tr>
  <th id="col-image"></th>
  <th>Naam</th>
  <th class="add-col"></th>
  <th class='amount-col'>Aantal</th>
  <th class="remove-col"></th>
  <th>Per stuk</th>
  <th>Totaal</th>
</tr>
  <?php
  foreach($cart as $productID => $count ){
    $StockItemImage = getStockItemImage($productID, $databaseConnection);
    $StockItem = getStockItem($productID, $databaseConnection);
    print("<tr>");
    ?><th id="ImageFrame"
    style="background-image: url('Public/StockItemIMG/<?php print $StockItemImage[0]['ImagePath']; ?>'); width: 50px; height: 50px; background-size: 50px; background-repeat: no-repeat; background-position: center;"></th> 
    <?php
    print("<th>".$StockItem["StockItemName"]."</th>");
    print("<th><a href='' class='add-btn' label='$productID'><i class='material-icons add'>add</i></a></th>");
    print("<th><input class='amount-input' type='text' name='productCount' placeholder='...' value='$count'></th>");
    print("<th><a href='#' class='remove-btn'><i class='material-icons remove'>remove</i></a></th>");
    print("<th>".number_format($StockItem['SellPrice'], 2)."</th>");
    print("<th>".number_format($count*$StockItem['SellPrice'], 2)."</th>");
    print("</tr>");
  }
  ?>
</table> 
</div>
<script>
$('.add-btn').click((e) => {
 console.log(e);
}
)

  
</script>
</body>
</html>

