<?php

function logincheck(){
            if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
                echo "Login Error";
                exit();
                }else{
                session_regenerate_id(true);
                $_SESSION["chk_ssid"] = session_id();
        }
    
}