<?PHP
include "C://xampp/htdocs/TheGoFever/config.php";
require_once 'C://xampp/htdocs/TheGoFever/model/events.php';

class eventC
{

    public function ajouterevent($event)
    {
        $sql = "INSERT INTO evenment(nomevent,nbrplace,imageevent,descriptionevent) 
			VALUES (:nomevent,:nbrplace,:imageevent,:descriptionevent)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nomevent' => $event->getnomevent(),
                'nbrplace' => $event->getnbrplace(),
                'imageevent' => $event->getimageevent(),
                'descriptionevent' => $event->getdescriptionevent()

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherevent()
    {

        $sql = "SELECT * FROM evenment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function supprimerevent($id)
    {
        $sql = "DELETE FROM evenment WHERE idevent = :idevent";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idevent', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function modifierevent($event, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenment SET 
						nomevent = :nomevent, 
						nbrplace= :nbrplace,
						imageevent = :imageevent,
						descriptionevent = :descriptionevent
					WHERE idevent = :idevent'
            );
            $query->execute([
                'nomevent' => $event->getnomevent(),
                'nbrplace' => $event->getnbrplace(),
                'imageevent' => $event->getimageevent(),
                'descriptionevent' => $event->getdescriptionevent(),         
                'idevent' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererevent($id)
    {
        $sql = "SELECT * from evenment where idevent=$id";
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
            $sql="SELECT * FROM evenment where  idevent like '$search_value' or nomevent like '%$search_value%' ";
    
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

        public function AffichereventPaginer($page, $perPage)
        {
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            $sql = "SELECT * FROM evenment LIMIT {$start},{$perPage}";
            $db = config::getConnexion();
            try {
                $liste = $db->prepare($sql);
                $liste->execute();
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    
    
        public function calcTotalRows($perPage)
        {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM evenment";
            $db = config::getConnexion();
            try {
    
                $liste = $db->query($sql);
                $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
                $pages = ceil($total / $perPage);
                return $pages;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        function triec(){
            $sql = "SELECT *   from evenment  ";
            $db = config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        function sortv()
    {
        $sql = "SELECT * from evenment order by nbrplace desc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

        
                    
}
