<?php

class QBOtoWoo{
    $settings = parse_ini_file("file.ini");
    
    
    function debug(){
        var_dump($settings);
        echo '<br>' . $ini_array['url'];
    }
    
    
}



?>