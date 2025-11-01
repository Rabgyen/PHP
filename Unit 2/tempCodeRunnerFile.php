<?php
    $i = 1;
    for( ; $i <= 20; $i++){
        if($i % 2== 0){
            continue;
        }
        echo $i . "br";
    }

?>