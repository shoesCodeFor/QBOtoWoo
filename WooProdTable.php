<?php
/**
 * WooProdTable.php -
 * I need to see the data I am modeling in order to know how I am
 * User: Shoe
 * Date: 6/23/2017
 * Time: 10:30 PM
 */
    include 'WooProducts.php';
    include 'WooConnect.php';

            $woo_connection = new WooConnect();


            $woo_connection->loadSettings();
            $woo_connection->storeConnect();
            // print_r($connection->getFromWoo('products/attributes'));
            $JSONres = $woo_connection->getFromWoo('products');
            $productKeys = array();
            // var_dump($JSONres);
            $rescueArr = json_decode($JSONres);
            $quickArray = array();





?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Woo Commerce Product</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
</head>
<body>
<div id="QBOtoWoo_Products">
    <?php echo $JSONres; ?>
</div>

<script type="application/ecmascript">
    var prod = new Object();
    prod = 
        <?php echo $JSONres?>;
    const content = document.getElementById('QBOtoWoo_Products');
    const table = document.createElement('table');
    const header = document.createElement('th');
    const row = document.createElement('tr');
    function dataBlock(someStr){
        const dBlock = document.createElement('td');
        dBlock.innerHTML = someStr;
        return dBlock;
    }
    console.table(prod);


    content.innerHTML = 'Test';
    content.appendChild(table);
    var tableTop = table.appendChild(row);
    var tableHeader = tableTop.appendChild(header);
    var idLabel = tableHeader.innerHTML = 'ID';
    var nameLabel = tableHeader.innerHTML = 'Name';
    var skuLabel = tableHeader.innerHTML = 'SKU';
    var descLabel = tableHeader.innerHTML = 'Description';
    var shortLabel = tableHeader.innerHTML = 'Short Desc.';
    var price  = tableHeader.innerHTML = 'Price';
    var mngQtyLabel = tableHeader.innerHTML = 'Manage Qty';
    var inStock = tableHeader.innerHTML = 'In Stock?';
    var qtyOnHand = tableHeader.innerHTML = 'Quantity On Hand';    
    prod.forEach(function(obj){
        var singleProd = table.insertRow();
        var id = singleProd.insertCell(0);
        id.innerHTML = obj.id;
        var name = singleProd.insertCell(1);
        name.innerHTML = obj.name;
        var sku = singleProd.insertCell(2);
        sku.innerHTML = obj.sku;
        var desc = singleProd.insertCell(3);
        desc.innerHTML = obj.description;
        var short_desc = singleProd.insertCell(4);
        short_desc.innerHTML = obj.short_desc;
        var price = singleProd.insertCell(5);
        price.innerHTML = obj.price;
        var mng_qty = singleProd.insertCell(6);
        short_desc.innerHTML = obj.manage_stock;
        
        
    })
    
    class WooTables{
        
    }


</script>
<script type="application/javascript">
    function buildTable(obj){
        console.log(obj.name);
        console.log(obj.sku);
    }
    prod.forEach(buildTable);
</script>    
</body>
</html>

