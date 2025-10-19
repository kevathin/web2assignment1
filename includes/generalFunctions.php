<?php
    // this just generates the header for all the pages. only difference is the page name
    function produceHeader($pageName){
        echo "<header class='overviewHeader'>";
            echo "<div>";
                echo "<h1 class'overviewTitle'> Portfolio Project ". $pageName . "</h1>";
            echo "</div>";
            echo "<div>";
                echo "<p> buttons </p>";
            echo "</div>";
        echo "</header>";
    }
?>