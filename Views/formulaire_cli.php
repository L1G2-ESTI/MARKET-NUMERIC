<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de registre</title>
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
        <center style ="margin-top:100px;" >
        <form class="principal"  action="index.php?u=validation" method="POST" >
            <h6 class="display-6 titre">Veuillez remplir ce formulaire</h6>
            <div class="container d-flex">
                <div class="mb-3 row content_one">
                    <label for="nom" class="form-label">Nom : </label>
                    <label for="prenom" class="form-label">Prenom : </label>
                    <label for="cin" class="form-label">CIN : </label>
                    <label for="carte_bancaire" class="form-label">Carte bancaire : </label>
                    <label for="telephone" class="form-label">Téléphone : </label>
                </div>

                <div class="mb-3 row w-100 content_two">
                    <input type="text" class="form-control-lg" name="nom" aria-describedby="nom" required>
                    <input type="text" class="form-control-lg" name="prenom" aria-describedby="prenom" required>
                    <input type="text" class="form-control-lg" name="cin" aria-describedby="cin" required>
                    <input type="text" class="form-control-lg" name="carte_bancaire" aria-describedby="carte bancaire" required>
                    <input type="text" class="form-control-lg" name="telephone" aria-describedby="telephone" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary boutton-enregistre">Enregistrer</button>
        </form>
        </center>
</body>
</html>