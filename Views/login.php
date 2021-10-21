<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste achat</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <center ">
        <div style="margin-top:200px;">
            <form action="index.php?u=login" method="post">
                <table>
                    <tr>
                        <td>Votre Identifiant: </td>
                        <td><input type="text" name="idf" ></td> 
                    </tr>
                    <tr>
                        <td><input type="submit" value="Valider"></td>
                    </tr>
                </table>
            </form>
        </div>
</center>
</body>
</html>