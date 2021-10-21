<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
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
                            <p class="nav-link active fs-5 px-3" style="color:whitesmoke;"><?= "BIENVENUE  ".$_SESSION["id"]?></p>
                    </li>  
                </ul>
                <?php 
                    echo 
                        '
                            <form class="d-flex me-3 btn btn-outline-light">
                            <p><a style="text-decoration:none;" href="index.php?u=produits&a=liste&cli='.$_SESSION["id"].'" >Votre liste achat</a></p>
                            </form>
                        ';
                ?>
			</div>
		</div>
	</nav>

    <section class="categorie container d-flex d-inline">
        <div class="produit">
            <div class="row">

                <?php 
                    while($liste=$produit->fetch()) 
                    {
                        echo 
                            '<div class="card mx-3" style="width: 270px;">
                                <img src="'.$liste['photo_couv_prod'].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title">'.$liste['nom_prod'].'</h5>
                                        <span class="prix fs-3">'.$liste['prix'].'Ar </span>
                                        <p><b><u>nombre dispo:</u>'.$liste['nb_dispo'].'</b></p>
                                    </div>
                                    <p class="card-text">'.$liste['descript_prod'].'</p>
                                    <a href="index.php?u=produits&n='.$liste['nom_prod'].'&p='.$liste['prix'].'&categ='.$liste["code_categ"].'&cli='.$_SESSION["id"].'" class="btn btn-primary essai">Ajouter au panier</a>
                                </div>
                            </div>';
                    };
                ?>

            </div>
        </div>
    </section>
</body>
</html>