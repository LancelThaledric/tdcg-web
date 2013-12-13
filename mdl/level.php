<?php
/*
    class level : Id level et chemin d'accès.
*/

//énumération sur l'était d'un niveau par rapport à l'utilisateur
class LevelUserState{
    const UNAVAILABLE = 0;  //Le niveau n'est pas jouable par l'utilisateur. Dans cet état il n'est pas stocké dans la table 'resolve'.
    const AVAILABLE = 1;    //Le niveau est disponible pour commencer à y jouer.
    const TRIED = 2;        //Le niveau a été lancé par l'utilisateur au moins une fois.
    const VALIDATED = 3;    //Le niveau a été résolu par l'utilisateur.
}

class Level{

    private $_idlevel;
    private $_filename;
    private $_title;
    private $_loaded;
    //user variables
    private $_key;
    private $_solution;
    private $_state;
    private $_idaccount;
    
    
    //! Initialise les valeurs àniveau inconnu.
    public function __construct(){
        $this->loadDefault();
    }

    // opérations BDD
    
    //! Charge les infos du compte depuis la bdd depuis l'id du level.
    public function loadLevelFromKey($key){
        try{
        
            $sql = 'SELECT * FROM resolve NATURAL JOIN levels WHERE link=:key';
            $query = pdo()->prepare($sql);
            $query->bindValue(':key', $key, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                $this->_idlevel = $res['idlevel'];
                $this->_filename = $res['filename'];
                $this->_title = $res['title'];
                $this->_loaded = true;
                
                $this->_key = $res['link'];
                $this->_solution = $res['solution'];
                $this->_state = $res['state'];
                $this->_idaccount = $res['idaccount'];
                return true;
            }
            $this->loadDefault();
            return false;
            
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //! Charge les infos du compte depuis la bdd depuis l'id du level.
    public function loadLevel($id){
        try{
        
            $sql = 'SELECT * FROM levels WHERE idlevel=:id';
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                $this->_idlevel = $res['idlevel'];
                $this->_filename = $res['filename'];
                $this->_title = $res['title'];
                $this->_loaded = true;
                
                $this->_key = null;
                $this->_solution = null;
                $this->_state = null;
                $this->_idaccount = null;
                return true;
            }
            $this->loadDefault();
            return false;
            
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //!Charge un niveau indisponible.
    public function loadDefault(){
        $this->_idlevel = -1;
        $this->_filename = '';
        $this->_title = '';
        $this->_loaded = false;
        
        $this->_key = null;
        $this->_solution = null;
        $this->_state = null;
        $this->_idaccount = null;
    }
    
    //renvoie un array contenant les niveaux du joueur concerné.
    public static function getLevelList($idaccount){
        try{
            $return = array();
            $sql = "SELECT *
                    FROM resolve
                    NATURAL JOIN levels
                    WHERE idaccount=:id
                    ORDER BY idlevel";
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $idaccount, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $res;
            
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //valide le level sélectionné de l'utilisateur sélectioné
    public function validLevel(){
        try{
            $return = 0;
            $sql = 'UPDATE resolve
                    SET state='.LevelUserState::VALIDATED.'
                    WHERE idlevel=:idlevel
                    AND idaccount=:idaccount';
            $query = pdo()->prepare($sql);
            $query->bindValue(':idlevel', $this->_idlevel, PDO::PARAM_INT);
            $query->bindValue(':idaccount', $this->_idaccount, PDO::PARAM_INT);
            $query->execute();
            $return = $query->rowCount();
            $query->closeCursor();
            return $return;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de la validation du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //commence le niveau sélectionné
    public function startLevel(){
        try{
            $return = 0;
            $sql = 'UPDATE resolve
                    SET state='.LevelUserState::TRIED.'
                    WHERE idlevel=:idlevel
                    AND idaccount=:idaccount';
            $query = pdo()->prepare($sql);
            $query->bindValue(':idlevel', $this->_idlevel, PDO::PARAM_INT);
            $query->bindValue(':idaccount', $this->_idaccount, PDO::PARAM_INT);
            $query->execute();
            $return = $query->rowCount();
            $query->closeCursor();
            return $return;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de la validation du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //débloques les niveaux disponibles
    public static function unlockLevels($idaccount){
        $nb_to_unlock = 3;
    
        try{
            //Etape 1 : on compte combien de niveaux sont disponibles pour le joueur.
            //Etape 1 et demi : il faut débloquer 3 - n nivaux, n étant le nb de niveaux disponibles trouvé juste avant.
            //Etape 2 : on rend les n prochains niveaux indisponibles, disponibles.
            
            // ===== Etape 1 : On compte combien de niveaux on doit débloquer.
            $nb_available = 0;      //nb de niveaux déjà disponibles pour le joueur (non-terminés).
            $sql = 'SELECT COUNT(idlevel)
                        AS nblvl
                    FROM resolve
                    WHERE idaccount=:idaccount
                    AND ( state='.LevelUserState::TRIED.' OR  state='.LevelUserState::AVAILABLE.')';
            $query = pdo()->prepare($sql);
            $query->bindValue(':idaccount', $idaccount, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $nb_available = $res['nblvl'];
            
            /* */  debug($nb_available, 'level');
            
            $nb_to_unlock -= $nb_available;
            
            /* */  debug($nb_to_unlock, 'level');
            
            // ===== Etape 2 : On débloque les $nb_to_unlock prochains niveaux
            
            $sql_select = 'SELECT *
                           FROM levels l
						   WHERE NOT EXISTS (
							   SELECT *
							   FROM resolve r, accounts a
							   WHERE l.idlevel = r.idlevel
							   AND r.idaccount = a.idaccount
						   )
						   ORDER BY l.orderlevel
						   LIMIT 0, '.$nb_to_unlock;
                    
            /* */  debug($sql_select, 'level');
                    
            $sql_insert = 'INSERT INTO resolve
                                (idaccount, idlevel, state, solution, link)
                           VALUES
                                (:idaccount, :idlevel, :state, :solution, :link)';
            
            $query = pdo()->prepare($sql_select);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            
            /* */ debug($res, 'level');
            
            $query = pdo()->prepare($sql_insert);
            
            $nb_unlocked =0;
            foreach($res as $lev){
                //bindvalues et exécution
                $solution = '';
                for($i=0 ; $i<10 ; ++$i) $solution.= (string) mt_rand(0, 9);
                $link = md5(mt_rand());
                debug($solution, 'level');
                debug($link, 'level');
                debug($lev, 'level');
                $query->bindValue(':idaccount', $idaccount, PDO::PARAM_INT);
                $query->bindValue(':idlevel', $lev['idlevel'], PDO::PARAM_INT);
                $query->bindValue(':state', LevelUserState::AVAILABLE, PDO::PARAM_INT);
                $query->bindValue(':solution', $solution, PDO::PARAM_INT);
                $query->bindValue(':link', $link, PDO::PARAM_INT);
                
                $query->execute();
                
                $error = $query->errorInfo();
                if(!empty($error[2]))
                    trigger_error(utf8_decode('REQUEST EXECUTION FAILED : '.$error[2]), E_USER_WARNING);

                $nb_unlocked++;
            }
            
            /* */  debug($nb_unlocked, 'level');
            
            return $nb_unlocked;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de la validation du level : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //retourne le rendu du level.
    public function getIncludeLevel(){
        return getrender('ctrl/levels/'.$this->_filename.'/index.php');
    }
    
    //retourne le solved du level.
    public function getIncludeSolvedLevel(){
        return getrender('ctrl/levels/'.$this->_filename.'/solved.php');
    }
    
    //retourne le directory du level.
    public function getLevelCtrlDir(){
        return 'ctrl/levels/'.$this->_filename.'/';
    }
    
    //accesseurs bruts
    public function idlevel(){ return $this->_idlevel; }
    public function filename(){ return $this->_filename; }
    public function title(){ return $this->_title; }
    
    public function isLoaded(){ return $this->_loaded; }
    
    public function idaccount(){ return $this->_idaccount; }
    public function key(){ return $this->_key; }
    public function solution(){ return $this->_solution; }
    public function state(){ return $this->_state; }

    
}

?>
