<?php
    class connect_bdd {
        protected function dbconnect() {
            try{
                $connexion = new PDO('mysql:host=127.0.0.1;dbname=VENTES','sergio', 'sergio22');
                return $connexion;
            }catch(PDOException $erreurs){
                die($erreurs->getMessage());
            };
        }
    }

    class query_data extends connect_bdd {
        public function login($id){
            try{
                $bdd = $this->dbconnect();

                $req ='SELECT 1 FROM identifiant_cli 
                WHERE num_idf = "'.$id.'"';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function bienvenue(){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT * FROM categories ';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }

        }

        public function produits($categ){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT * FROM produits WHERE code_categ = "'.$categ.'" ';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function ajoutAuPanier($cli,$n,$p){
            try{
                $bdd = $this->dbconnect();

                $req =' INSERT INTO panier (id_cli, date_ajout, nom_prod, prix) 
                        VALUES  ("'.$cli.'", NOW(),"'.$n.'","'.$p.'" )
                    ';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function achat($cli){
            try{
                $bdd = $this->dbconnect();

                $req =' SELECT id, nom_prod, COUNT(nom_prod) AS nb_ajout, 
                        prix*(COUNT(nom_prod))AS prix
                        FROM panier
                        WHERE id_cli = "'.$cli.'"
                        GROUP BY nom_prod 
                    ';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function annulation($id){
            try{
                $bdd = $this->dbconnect();

                $req =' DELETE  FROM panier  WHERE id = "'.$id.'"';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function PrixTotal($cli){
            try{
                $bdd = $this->dbconnect();

                $req ='SELECT SUM(prix) AS total FROM panier
                        WHERE Id_cli = "'.$cli.'"';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function validation($code_cli,$nom,$prenom,$cin,$carte,$num,$PrixTotal){
            try{
                $bdd = $this->dbconnect();

                $req =' INSERT INTO clients (code_cli, date_confirm, nom_cli, pre_cli, cin, carte_bc,num_tel, Achat) 
                        VALUES  ("'.$code_cli.'",NOW(),"'.$nom.'","'.$prenom.'","'.$cin.'", "'.$carte.'","'.$num.'","'.$PrixTotal.'")';
                $result = $bdd->prepare($req);
                $result->execute();
                return $result;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }

?>