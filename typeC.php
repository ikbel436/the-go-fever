<?PHP
require_once "config.php";


class typeC
{
    function ajouterb($type)
    {
        $sql = "insert into type (id,nom,description) values (:id,:nom,:description)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':id', $type->getid());
            $req->bindValue(':nom', $type->getnom());

            $req->bindValue(':description', $type->getdescription());


            $req->execute();

        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherb()
    {
        $sql = "SELECT * from type";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' .$e->getMessage());
        }
    }
    function afficherc()
    {
        $sql = "SELECT id,nom from type";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' .$e->getMessage());
        }
    }

    function supprimerb($id)
    {
        $sql = "DELETE FROM type WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' .$e->getMessage());
        }
    }
    function recupererb($id){
        $sql="SELECT * from type where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




    function modifierb($type, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE type SET 
                       
						nom = :nom, 
						description = :description,
						
					
					WHERE id = :id'
            );

            $query->execute([
                'nom'=>$type->getnom(),
                'description'=>$type->getdescription(),
                // 'idtype'=>$association->getidbesoin(),
                'id'=>$id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
?>







