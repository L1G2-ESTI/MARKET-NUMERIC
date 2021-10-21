<?php

    require_once("Controllers/controller.php");
    $u = htmlspecialchars(($_GET["u"]));
    $v = htmlspecialchars($_GET["v"]);
    $n = htmlspecialchars($_GET["n"]);
    $s = htmlspecialchars($_GET["s"]);
    $bar = htmlspecialchars($_GET["a"]);
    $num = htmlspecialchars($_GET["num"]);


    if(!empty($u) && $u == "produits"){
        
        if($v == "fournitures"){
            produits("categ_1");
        }
        elseif($v == "appareils"){
            produits("categ_2");
        }
        elseif($n != ""){
            $p = htmlspecialchars($_GET["p"]);
            $cli = htmlspecialchars($_GET["cli"]);
            ajoutAuPanier($cli,$n,$p); 
            
        }
        elseif($bar != ""){
            $cli = htmlspecialchars($_GET["cli"]);
            achat($cli);
            PrixTotal($cli);
        }
        elseif($num != ""){
            annulation($num);
        }
        else{
            produits("categ_3");
        }  

    }
    elseif(!empty($u) && $u == "login"){
        if(isset($_POST)){
          $id = $_POST['idf'];
          login($id); 
        }     
    }
    elseif(!empty($u) && $u == "confirmation"){
        confirmation(); 
    }
    elseif(!empty($u) && $u == "validation"){
        if(isset($_POST)){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $cin = $_POST["cin"];
            $carte = $_POST["carte_bancaire"];
            $num = $_POST["telephone"];
            validation($nom,$prenom,$cin,$carte,$num);
        }
    }
    else{
        acceuil();  
    }
?> 