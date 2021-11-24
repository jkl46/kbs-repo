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
    <div style="text-align:center;width: 600px;margin: 0 auto;"> 
<h1>Inhoud Winkelwagen</h1>
<table>
  <tr>
  <th id="col-image"></th>
  <th>Naam</th>
  <th class="add"></th>
  <th>Aantal</th>
  <th class="remove"></th>
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
    print("<th><a href='#' class='add-btn' label='$productID'><i class='material-icons add'>add</i></a></th>");
    print("<th>".$count."</th>");
    print("<th><a href='#' class='add-btn'><i class='material-icons remove'>remove</i></a></th>");
    print("<th>".number_format($StockItem['SellPrice'], 2)."</th>");
    print("<th>".number_format($amount*$StockItem['SellPrice'], 2)."</th>");
    print("</tr>");
  }
  ?>
</table> 
<p><a href='/'>Terug naar webshop</a></p>
</div>
<script>
$('.add-btn').click((e) => {
  console.log(e.attributs['label']);
  console.log(e);

}
)

  
</script>
</body>
</html>

