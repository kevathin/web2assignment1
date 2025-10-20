<?php
    include_once "sqlfunctions.php";
?>

<?php

    function produceCompanyContent($companyID){
        $companyInfo = requestCompanyInfo($companyID);
        echo "<container class='mainBox twoAndOneFRFrameBox'>";

            echo "<div class='twoWideGrid' id='companyInfo'>";
                produceCompanyInformation($companyInfo);
            echo "</div>";

            echo "<div id='history'>";
                produceCompanyHistory($companyInfo);
            echo "</div>";

            echo "<div id='majorCompanyPoints'>";
                produceCompanyPoints($companyInfo);
            echo "</div>";

        echo "</container>";
    }

    function produceCompanyInformation($companyInfo){
        //chatgpt helped my understand how to get the financial information
        //to put it simply it just json_decode('jsonString', associative array or not);
        $financialInfo = json_decode($companyInfo['financials'], true);
        echo "<h2 class='twoWideGrid'>Company Information</h2>";
        echo "<div id='generalCompanyInfo'>";
            echo "<div id='infoBoxes'>";
                foreach($companyInfo as $attribute=>$value){
                    echo "<div class='infoBox'>";
                        echo "<h4>".$attribute.":</h4>";
                        echo "<p>".$value."</p>";
                    echo "</div>";
                    //this is just so that the foreach knows when to stop
                    if($attribute == "website"){
                        break;
                    }
                }
                

            echo "</div>";
            echo "<div id='descriptionBox'>";
                echo "<h3>Company Description:</h3>";
                echo "<p>".$companyInfo['description']."</p>";
            echo "</div>";
        echo "</div>";
        if($financialInfo != null){
            echo "<div id='companyFinancialInfo'>";
            echo "<h3>General Financial Info</h3>";
            foreach($financialInfo as $subject=>$values){
                if($subject == "years"){
                    echo "<p class='boldText'>".$subject." </p>";
                    echo "<p>".$values[0] ."</p>";
                    echo "<p>".$values[1] ."</p>";
                    echo "<p>".$values[2] ."</p>";
                } else{
                    echo "<p class='boldText'>".$subject." </p>";
                    echo "<p>$".number_format($values[0]) ."</p>";
                    echo "<p>$".number_format($values[1]) ."</p>";
                    echo "<p>$".number_format($values[2]) ."</p>";
                }
            }
            echo "</div>";
        }
    }

    function produceCompanyHistory($companyInfo){
        $companyHistory = $companyInfo['history'];
        echo "<h2>History (3M)</h2>";
        echo "<div id='historyContainer'>";
            echo "<h4>Date</h4>";
            echo "<h4>Volume</h4>";
            echo "<h4>Open</h4>";
            echo "<h4>Close</h4>";
            echo "<h4>High</h4>";
            echo "<h4>Low</h4>";
            foreach($companyHistory as $date=>$values){
                echo "<p>".$date."</p>";
                echo "<p>".number_format($values['volume'])."</p>";
                echo "<p>$".number_format($values['open'],2)."</p>";
                echo "<p>$".number_format($values['close'],2)."</p>";
                echo "<p>$".number_format($values['high'],2)."</p>";
                echo "<p>$".number_format($values['low'],2)."</p>";
            }
        echo "</div>";
    }

    function produceCompanyPoints($companyInfo){
        $companyHistory = $companyInfo['history'];

        $historyHigh = 0;
        $historyLow = -1;
        $totalVolume = 0;
        $averageVolume = 0;

        foreach($companyHistory as $date=>$values){
            if($historyLow == -1 || $historyLow > $values['low']){
                $historyLow = $values['low'];
            }
            if($historyHigh < $values['high']){
                $historyHigh = $values['high'];
            }
            $totalVolume = $totalVolume + $values['volume'];
        }
        $averageVolume = $totalVolume / count($companyHistory);

        echo "<div class='additionBoxNote ABNS'>";
            echo "<h4>History High</h4>";
            echo "<p>$".number_format($historyHigh, 2)."<p>";
        echo "</div>";
        echo "<div class='additionBoxNote ABNS'>";
            echo "<h4>History Low</h4>";
            echo "<p>$".number_format($historyLow, 2)."<p>";
        echo "</div>";
        echo "<div class='additionBoxNote ABNL'>";
            echo "<h4>Total Volume</h4>";
            echo "<p>".number_format($totalVolume)."<p>";
        echo "</div>";
        echo "<div class='additionBoxNote ABNL'>";
            echo "<h4>Average Volume</h4>";
            echo "<p>".number_format($averageVolume)."<p>";
        echo "</div>";
    }

?>