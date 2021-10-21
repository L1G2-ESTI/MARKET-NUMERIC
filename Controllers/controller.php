<?php

    require_once('Model/model1.php');

    function acceuil(){
		try {
			require("Views/login.php");
		}catch (Exception $e) {
			echo $e->getMessage();
		}
    }

    function login($id){
        $query = new query_data();
        $log = $query->login($id); 
        $user_info = $log->fetch();
        if(!(empty($user_info))){
            categories();
        }else{
            require('Views/login.php');
        }
    }

    function categories(){
       try{
            $query = new query_data();
            $categories = $query->bienvenue(); 
            session_start(); 
            if(isset($_POST['idf'])){
                $_SESSION["id"] = $_POST['idf'];
            }
           require("Views/bienvenue.php");
        }
       catch (Exception $e){
           die($e->getMessage());
       }
    
    }

    function produits($categ){
        try{
            $query = new query_data();
            $produit = $query->produits($categ); 
            session_start(); 
            if(isset($_POST['idf'])){
                $_SESSION["id"] = $_POST['idf'];
            }
            require("Views/produits.php");
        }catch (Exception $e){
            die($e->getMessage());
        }
       
    }

    function ajoutAuPanier($n,$p,$nd){
        try{
            $query = new query_data();
            $ajout = $query->ajoutAuPanier($n,$p,$nd); 
        }catch (Exception $e){
            die($e->getMessage());
        } 
        $categ = htmlspecialchars($_GET["categ"]);
        if($categ == "categ_1"){
            header("Location:index.php?u=produits&&v=fournitures");
        }elseif($categ == "categ_2"){
            header("Location:index.php?u=produits&&v=appareils");
        }else{
            header("Location:index.php?u=produits&&v=cuisines");
        }
        
    }

    function achat($cli){
        try{
            $query = new query_data();
            $achat = $query->achat($cli); 
            session_start(); 
            if(isset($_POST['idf'])){
                $_SESSION["id"] = $_POST['idf'];
            }
            require("Views/listeachat.php");
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    function annulation($id){
        try{
            $query = new query_data();
            $achat = $query->annulation($id);  
            session_start(); 
            if(isset($_POST['idf'])){
                $_SESSION["id"] = $_POST['idf'];
            }
        }catch (Exception $e){
            die($e->getMessage());
        }
        header('location:index.php?u=produits&a=liste&cli='.$_SESSION['id'].'');
    } 
    
    function PrixTotal($cli){
        session_start(); 
        if(isset($_POST['idf'])){
            $_SESSION["id"] = $_POST['idf'];
        }
        
        try{
            $query = new query_data();
            $prix = $query->PrixTotal($cli);
            require("Views/prixtotal.php");
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    function confirmation(){
        session_start(); 
        if(isset($_POST['idf'])){
            $_SESSION["id"] = $_POST['idf'];
        }
        try{
            require("Views/formulaire_cli.php");   
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    function validation($nom,$prenom,$cin,$carte,$num){
        session_start();
        $PrixTotal = $_SESSION["total"]; 
        $code_cli = $_SESSION["id"];
        try{
            $query = new query_data();
            $ajout = $query->validation($code_cli,$nom,$prenom,$cin,$carte,$num,$PrixTotal); 
        }catch (Exception $e){
            die($e->getMessage());
        }
        header("location:Views/remercierement.html");
    }
?>