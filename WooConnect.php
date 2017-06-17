<?php


$settings = parse_ini_file("file.ini");

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    $settings['woo-url'], 
    $settings['ck'], 
    $settings['cs'],
    [
        'wp_api' => true,
        'version' => 'wc/v1',
    ]
);

use Automattic\WooCommerce\HttpClient\HttpClientException;

try {
    // Array of response results.
    $results = $woocommerce->get('products');
    // Example: ['customers' => [[ 'id' => 8, 'created_at' => '2015-05-06T17:43:51Z', 'email' => ...

    // Last request data.
    $lastRequest = $woocommerce->http->getRequest();
    $lastRequest->getUrl(); // Requested URL (string).
    $lastRequest->getMethod(); // Request method (string).
    $lastRequest->getParameters(); // Request parameters (array).
    $lastRequest->getHeaders(); // Request headers (array).
    $lastRequest->getBody(); // Request body (JSON).

    // Last response data.
    $lastResponse = $woocommerce->http->getResponse();
    $lastResponse->getCode(); // Response code (int).
    $lastResponse->getHeaders(); // Response headers (array).
    $productArray = $lastResponse->getBody(); // Response body (JSON).
    echo 'Product Array as JSON';
    echo $productArray;
    echo 'product array as php ';
    $obj = json_decode($productArray);
    var_dump($obj);
    echo '<br>';
    
    
    echo $obj[0]->id;
    echo $obj[0]->sku;
    echo $obj[0]->name;
    echo $obj[0]->price;
    foreach($obj as $product){
        echo $product->id;
    }
    for($i = 0; $i < sizeof($obj); $i++){
        echo $obj[$i]->id;
    }
    
} catch (HttpClientException $e) {
    $e->getMessage(); // Error message.
    $e->getRequest(); // Last request data.
    $e->getResponse(); // Last response data.
    $err_msg = 'Nothing yet.  Lets debug WooCommerce.';
    echo $err_msg;
}






?>