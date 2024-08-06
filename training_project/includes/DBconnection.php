<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$conn = mysqli_connect("localhost", "root","","training_project");

 if(mysqli_connect_error() != null){
     echo ' Cannot connect to Database';
        exit();
    }
    