<?php
    // this just generates the header for all the pages. only difference is the page name
    function produceHeader($pageName){
        echo "<header class='overviewHeader'>";
            echo "<div>";
                echo "<h1 class='overviewTitle'> Portfolio Project ". $pageName . "</h1>";
            echo "</div>";
            echo "<div class='headerButtons'>";
                produceHeaderButtons();
            echo "</div>";
        echo "</header>";
    }

    // uses a foreach on a to simplify the production of the tab buttons
    function produceHeaderButtons(){

        $tabNamesAndPage = ["Home"=>"index.php", "APIs"=>"API.php", "About"=>"about.php"];

        foreach($tabNamesAndPage as $name=>$page){
            echo "<form method='POST' action='".$page ."'>";
                echo "<button type='submit' class='tabButton'>".$name."</button>";
            echo "</form>";
        }
    }
?>