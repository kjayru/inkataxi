<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkentries(){
    
    $númargs = func_num_args();
    
    $arg_list = func_get_args();
    $ii = 0;
    $data = $arg_list[0];
    for ($i = 1; $i < $númargs; $i++) {
        $entrada = $arg_list[$i];
        $ii--;
        
        if ( !isset($data[$entrada]) || $data[$entrada] == '') {
            return (-100 + $ii);
        }
    }
 
    return 1;
}


?>