<?php 

if(!function_exists('notifyMsg')){
    function notifyMsg($type, $msg){
        return [
            'alert-type' => $type,
            'message' => $msg,
        ];
    }
}