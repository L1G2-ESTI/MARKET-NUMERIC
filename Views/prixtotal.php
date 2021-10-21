<?php
    $t = $prix->fetch();
    $_SESSION["total"]=$t['total'];
    echo '<center>
        <table>
           <th><u>Prix Total:</u></th>
           <th>'.$_SESSION["total"].'Ar</th>
        </table>
        <button><a style="text-decoration:none;" href="index.php?u=confirmation">Confirmé vos achats</a></button>
    </center>';
?>