<?php
    function connectDB($hm,$user,$psw,$dbname){
            return new mysqli($hm,$user,$psw,$dbname);
    }
?>