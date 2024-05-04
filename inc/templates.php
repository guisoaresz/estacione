<?php
    function headerTemp($page){
        session_start();

        $css = "";
        if($page == "index"){
            $css = '<link rel="stylesheet" href="styles/index-styles.css">';
        }
        if($page == "login"){
            $css = '<link rel="stylesheet" href="styles/all-styles.css">';
        }
        
        echo '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">'.
            $css
            .'
            <script src="https://kit.fontawesome.com/e1aca6f76d.js" crossorigin="anonymous"></script>
            <script src="scripts/scripts.js"></script>
            <title>eStacione</title>
        </head>
        ';
    }
?>