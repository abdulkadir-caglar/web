<?php
    include("header.php");
?>

        <div class="container">
            <?php
                $query ="SELECT * FROM posts ORDER BY id DESC";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<h3 style="text-align:center">'.$row["heading"].'</h3>
                        <p style="text-align:center;">'.$row["text"].'</p>
                        ';
                    }
                }
            ?>            
        </div>
    </body>
</html>