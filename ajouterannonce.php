<?PHP
include "C://wamp/www/TheGoFever/config.php";
require_once 'C://wamp/www/TheGoFever/model/annonces.php';

class annonceC
{

    public function ajouterannonce($annonce)
    {
        $sql = "INSERT INTO annonce(titre,description,image,commentaire) 
			VALUES (:titre,:description,:image,:commentaire)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'titre' => $annonce->gettitre(),
                'description' => $annonce->getdescription(),
                'image' => $annonce->getimage(),
                'commentaire' => $annonce->getcommentaire()

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherannonce()
    {

        $sql = "SELECT * FROM annonce";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function supprimerannonce($id)
    {
        $sql = "DELETE FROM annonce WHERE idannonce = :idannonce";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idannonce', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function modifierannonce($annonce, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE annonce SET 
						titre = :titre, 
						description= :description,
						image = :image,
						commentaire = :commentaire
					WHERE idannonce = :idannonce'
            );
            $query->execute([
                'titre' => $annonce->gettitre(),
                'description' => $annonce->getdescription(),
                'image' => $annonce->getimage(),
                'idannonce' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    

    function recupererannonce($id)
    {
        $sql = "SELECT * from annonce where idannonce=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recherche($search_value)
        {
            $sql="SELECT * FROM annonce where  idannonce like '$search_value' or titre like '%$search_value%' ";
    
            //global $db;
            $db =Config::getConnexion();
    
            try{
                $result=$db->query($sql);
    
                return $result;
    
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        function sortv()
        {
            $sql = "SELECT * from annonce order by idannonce ASC";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }




}