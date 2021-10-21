
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <p class="nav-link active fs-5 px-3" style="color:whitesmoke;"><?= "BIENVENUE  ".$_SESSION["id"]?></p>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

    <div class="accueil container">
        <div class="row">
            <div class="description w-50">
                <h1 class="display-5 fw-bold">Hey! Bienvenue</h1>
                <p class="fs-3">
                    Sur TsenaOnLine, vous trouverez tout ce dont vous besoin dans la vie quotidienne, alors n'attendez plus ...
                </p>
            </div>

            <div class="banniere">

            </div>
        </div>
    </div>

    <section class="article container">
        <div class="content-top">
            <h3 class="fw-bold">Catégories</h3>
            <div class="row">
                <?php  
                    while($liste=$categories->fetch())
                    {

                        echo  
                            '<div class="card mx-3" style="width: 18rem;">
                                <img src="'.$liste['photo_couv_categ'].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$liste['nom_categ'].'</h5>
                                        <p class="card-text">'.$liste['descrpt_categ'].'</p>
                                        <a href="index.php?u=produits&&v='.$liste['nom_categ'].'" class="btn btn-success">Voir plus...</a>
                                </div>
                            </div>';
                    };
                ?>
            </div>
        </div>            
    </section>
</body>
