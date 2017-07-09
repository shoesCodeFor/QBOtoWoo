<?php
/**
 * WooProdTable.php -
 * I need to see the data I am modeling in order to know how I am
 * @author: Shoe
 *
 */
    include 'WooProducts.php';
    include 'WooConnect.php';

            $woo_connection = new WooConnect();


            $woo_connection->loadSettings();
            $woo_connection->storeConnect();

            // We will pass the full data object into JS and parse it down
            $JSONres = $woo_connection->getFromWoo('products');

            var_dump($JSONres);
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
<div id="QBOtoWoo_Products"></div>
<div class="container">
    <div class="row">
        <div id="test" class="col-8"></div>
        <div id="test2" class="col-4"></div>

    </div>



</div>

<script type="application/ecmascript">
    // bs4Table is a simple JS function to create tables from object arrays

    function bs4Table(an_object_array, targetDiv, visibilityToggle){

        const optionsDiv = document.querySelector(visibilityToggle);
        const mainDiv = document.querySelector(targetDiv);
        // Create a table
        const Table = document.createElement('table');
        Table.setAttribute('class', 'table');
        // The header
        const header = Table.createTHead();
        header.setAttribute('class', 'thead-inverse');
        var attrList = [];
        th = header.insertRow(0);
        th.setAttribute('id', 'productHeading');
        var id_th = th.insertCell(0);
        id_th.innerHTML = 'ID';
        var name_th = th.insertCell(1);
        name_th.innerHTML = 'Name';
        var sku_th = th.insertCell(2);
        sku_th.innerHTML = 'SKU';
        var sku_th = th.insertCell(3);
        sku_th.innerHTML = 'Manage Inventory?';
        var sku_th = th.insertCell(4);
        sku_th.innerHTML = 'Quantity';
        var sku_th = th.insertCell(5);
        sku_th.innerHTML = 'Price';
        var sku_th = th.insertCell(6);
        sku_th.innerHTML = 'Price';
        Table.appendChild(th);

        // Check if an products are created
        for (var [key, value] of Object.entries(an_object_array[0])) {
            console.log(key + ' ' + value); // Will Return our list of attributes and table headings
            attrList.push(key);
        }
        if(visibilityToggle.length > 1){
            try{
                // Build the options pane for selecting which cols are visible
                const visToggler = document.createElement('table');
                visToggler.setAttribute('class', 'table');
                const visHeader = visToggler.createTHead();
                visHeader.setAttribute('class', 'thead-inverse');
                vTH = visHeader.insertRow(0);
                attrCol = vTH.insertCell(0);
                attrCol.innerHTML = 'Attribute';
                visSelCol = vTH.insertCell(1);
                visSelCol.innerHTML = 'Visible?';

                // Options pane - we should limit this selection size to 8 or bad things will happen
                // Fill the pane....heh
                attrList.forEach(function (element) {
                    _attrRow = document.createElement('tr');
                    _attrName = _attrRow.insertCell(0);
                    _attrName.innerHTML = element;
                    _attrVis = _attrRow.insertCell(1);
                    if(element == 'id' || element == 'name')
                    {_attrVis.innerHTML = '<b>Required</b>';}
                    else {_attrVis.innerHTML =
                        '<input type="checkbox" id="' + element + 'Visibility" />';}
                    visToggler.appendChild(_attrRow);
                });
                optionsDiv.appendChild(visToggler);
            }
            catch (e){
                alert(e.message);
            }
        }
        console.log(attrList);

        an_object_array.forEach(function (element) {
            tr = document.createElement('tr');
            _id = tr.insertCell(0);
            _id.innerHTML = element.id;
            _name = tr.insertCell(1);
            _name.innerHTML = element.name;
            aTable.appendChild(tr);
        });




        mainDiv.appendChild(aTable);
    }
</script>




<script type="application/ecmascript">
    // Attempt 1

    var prod = new Object();
    prod = 
        <?php echo $JSONres?>;
    bs4Table(prod, '#test', '#test2');
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
        short_desc.innerHTML = obj.manage_stock;});
    

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

