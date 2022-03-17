<?php
function displayTable($array){
    foreach($array as $line){?>
        <tr>
        <?php 
        echo '<td>'.$line['nom'].'</td>
        <td>'.$line['terminus_a'].'</td>
        <td>'.$line['terminus_b'].'</td>
        <td><a href="lineEdit.php?id='.$line['id'].'">Modifier</a></td>
        <td><a href="../lineDelete_post.php?id='.$line['id'].'">Supprimer</a></td>';?>
        </tr>
    <?php }
}
?>