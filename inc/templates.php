<?php
    function headerTemp($page){
        session_start();

        $css = "";
        if($page == "index" || $page == "login"){
            $css = '<link rel="stylesheet" href="assets/styles.css">';
        }
        
        echo '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">'.
            $css
            .'<script src="assets/scripts.js"></script>
            <title>eStacione</title>
        </head>
        <body>';
    }
?>