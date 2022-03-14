<?php 

if(!function_exists('notifyMsg')){
    function notifyMsg($type, $msg){
        return [
            'type' => $type,
            'message' => $msg,
        ];
    }
}