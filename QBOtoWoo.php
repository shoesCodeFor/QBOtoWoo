<?php

/**
 * @author Schuyler Ankele
 * @author Schuyler Ankele <schuyler.ankele@gmail.com>
 *
 * Class QBOtoWoo - this is a collection of functions for QBOtoWoo
 *
 * future improvements could be variables to store products changed and a log to rollback mistakes.
 *
 */




class QBOtoWoo{
    /**
     *  Check if install has been completed
     *  if the file has not been created then we cannot run
     *  This will be replaced by DB vals
     */
    private $installed = false;

    function checkInit(){
        $installed = file_exists("file.ini");
        return $installed;
    }

    /**
     * @param $product - is a single product object from WooCommerce
     * @param bool $keys_only - Optional: Will return an array of Product Keys with no values
     * This function is built for WooCommerce REST API V2 Objects
     *
     */
    function getProdAttributes($product, $keys_only = false){
        foreach ($product as $key => $value) {
            // Check for multidimensions
            if(is_object($value) || is_array($value)){
                // To break down an object
                if(is_object($value)){
                    echo 'Object Name:' . $key . ' =  <br>';
                    array_push($productKeys, $key);
                    echo 'Pushed to Array';
                    foreach($value as $objKey => $attr){
                        echo 'Object Attribute: ' . $objKey . '<br>' . $attr;
                    }
                    var_dump($value);
                }
                // If its an array
                else{
                    echo '<p>Array Name:' . $key;
                    array_push($productKeys, $key);
                    echo '<b>Pushed to Array</b></p>';
                    print_r($value);

                    // to break down the Array
                    foreach($value as $subkey => $subval){
                        if(is_object($subval)){
                            echo 'This subvalue is an Object';
                            echo $subkey;
                        }
                        /*
                        echo '<p>Subkey</p>';
                        print_r($subkey);
                        echo '<p>SubVal</p>';
                        print_r($subval);
                        */

                    }

                }


            }
        // array_push($quickArray, $value);

        // var_dump($quickArray);


            else {
                echo '<p>' . $key . ' = ' . $value;
                array_push($productKeys, $key);
                echo ' <b>*Pushed to Array</b></p>';
            }

        }
        // var_dump($rescueArr);
        echo '<h1>Product Attributes</h1>';
        print_r($productKeys);
    }
    
    
}



?>