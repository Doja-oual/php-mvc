<?php

namespace App\core;
 class controller{

    public function render($view,$data=[]){
        extract($data);
        include "../views/$view.php";
    }
 }