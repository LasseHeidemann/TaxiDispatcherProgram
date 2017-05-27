<?php

/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 23.05.2017
 * Time: 20:40
 */

Class Page {

    public $content;
    public $title;

    public function Display(){

        echo "<html>\n<head><\n";
        $this->DisplayStyles();
        echo "</head>\n<body>\n";

    }



    public function DisplayStyles(){
    ?>
        <link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"
    <?php
    }




    public function DisplayFooter(){
    ?>
        <!-- page footer -->
        <footer>
        <p> All rights reserved </p>
        </footer>
    <?php
    }


}