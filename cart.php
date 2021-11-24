<?php
include "header.php";
$cart = getCart();
$totalCost = 0;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="Public\CSS\cart.css">
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
  <th>Kosten</th>
  <th class='remove-col'></th>
</tr>
  <?php
  foreach($cart as $productID => $count ){
    $StockItemImage = getStockItemImage($productID, $databaseConnection);
    $StockItem = getStockItem($productID, $databaseConnection);
    $totalCost += $count*$StockItem['SellPrice'];
    print("<tr class='table-row' product-id='$productID'>");
    ?><th id="ImageFrame"
    style="background-image: url('Public/StockItemIMG/<?php print $StockItemImage[0]['ImagePath']; ?>'); width: 60px; height: 60px; background-size: 60px; background-repeat: no-repeat; background-position: center;"></th> 
    <?php
    print("<th>".$StockItem["StockItemName"]."</th>");
    print("<th><a update-method='increase' href='#' class='table-btn'><i class='material-icons add'>add</i></a></th>");
    print("<th><input id='amount-input' update-method='set' class='amount-input' type='text' placeholder='...' value='$count'></th>");
    print("<th><a update-method='decrease' href='#' class='table-btn'><i class='material-icons remove'>remove</i></a></th>");
    print("<th>".number_format($StockItem['SellPrice'], 2)."</th>");
    print("<th>".number_format($count*$StockItem['SellPrice'], 2)."</th>");
    print("<th><a update-method='remove' href='#' class='table-btn'><i class='material-icons clear'>clear</i></a></th>");
    print("</tr>");
  }
  ?>
  <tr class='close-col'>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th>Totaal: </th>
    <th><?php print(number_format($totalCost, 2)); ?></th>
    <th></th>
  </tr>
</table> 
</div>
<script>
  function update_cart(stockItemID, method, setAmount=0){
    console.log('asokajdsokams');
    $.get('updatecart.php',
  {
    'stockItemID': stockItemID, 
    'method': method,
    'setAmount': '0',
  },
   () => {
     location.reload();
  })
  }

$('.table-btn').click((e) => {
  e.preventDefault();
  let stockItemID, method;
  stockItemID = e.delegateTarget.parentNode.parentNode.attributes['product-id'].value;
  method = e.delegateTarget.attributes['update-method'].value;
  update_cart(stockItemID, method);
})

// TOO BE MADE
// Update cart on input field event
// $('.amount-input').blur((e) => {

// })

  
</script>
</body>
</html>

