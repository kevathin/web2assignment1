<?php
    function produceAboutContent(){
        echo "<container class='mainBox twoAndOneFRFrameBox'>";
            echo "<div>";
                echo "<h2>Assignment Description</h2>";
                echo "<p>This is the first assignment for COMP 3512 at mount royal university. it requires me to primarily create 4 total pages which are the following: about(this page), API(contains links that return json when clicked on), company(displays a specific company information), and lastly index(contains clients and client portfolios)</p>";
                echo "<h3>Technologies Used:</h3>";
                echo "<p>I used a php function manager so that i can have as little variance as possible to the core page files. Note: now that i am realizing it, i literally could have had just 1 page where it just turned into whatever I liked.</p>";
                echo "<ul>";
                    echo "<li><p>Forms</p></li>";
                    echo "<li><p>Grids</p></li>";
                    echo "<li><p>PDO</p></li>";
                    echo "<li><p>SQLite</p></li>";
                    echo "<li><p>Includes</p></li>";
                    echo "<li><p>POST</p></li>";
                    echo "<li><p>Nested Lists</p></li>";
                echo "</ul>";
                echo "<h2>Group Information</h2>";
                echo "<p>This was a one man Group consisting of only Kevin Bertasius who is a third year Computer Information Systems student. the github repository that contains all my files is <a href='https://github.com/kevathin/web2assignment1'>this link</a></p>";
            echo "</div>";
        echo "</container>";
    }
?>