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

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="..." alt="" width="30" height="24" class="d-inline-block align-text-top">
                    MarketNumerique
				</a>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active fs-5 px-3" aria-current="page" href="http://localhost/MARKETNUMERIQUE/index.php?u=produits&&v=fournitures">Fournitures</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active fs-5 px-3" aria-current="page" href="http://localhost/MARKETNUMERIQUE/index.php?u=produits&&v=appareils">Appareils</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link active fs-5 px-3" aria-current="page" href="http://localhost/MARKETNUMERIQUE/index.php?u=produits&&v=cuisines">Cuisines</a>
					</li>
					<li class="nav-item">
                            <p class="nav-link active fs-5 px-3 style="color:whitesmoke;"><?= "BIENVENUE  ".$_SESSION["id"]?></p>
                    </li> 
				</ul>
			</div>
		</div>
	</nav>

    <center>

        <div style="margin-top: 100px;">
            <?php 
                echo "<h3>Vos listes d'achat</h3>";
                echo "<table border=1>
                <tr>
                    <th><u>Nom du produit</u></th>
                    <th><u>Quantité</u></th>
                    <th style='text-align:center'><u>prix total</u></th>
                    <th><u>Annulation</u></th>
                </tr>" ;

                        while ($a=$achat->fetch()){
                            echo '<tr>
                            <td style="text-align:center">'.$a["nom_prod"].'</td>
                            <td style="text-align:center">'.$a["nb_ajout"].'</td>
                            <td style="text-align:center">'.$a["prix"].'Ar</td>
                            <td style="text-align:center"><a style="text-decoration:none;" href="index.php?u=produits&num='.$a["id"].'">Annuler</a></td>
                            </tr>';
                        }
                    echo'</table>';
            ?> 
        </div> 

    </center>
</body>
</html>