<?php
/*
    class forum_category : Liste des catégories et lisaisons avec les niveaux. Renvoi des infos.
*/


//! Classe d'une catégorie hors-connexion.s
class ForumCategory{
    
    //stocké dans la BDD
    private $_idcategory;
    private $_title;
    private $_link;
    private $_level;
    //calculé au chargement
    private $_levelprivate;  //true = liée à un niveau       false = forum public
    private $_nbposts;
    private $_lastpostdate;
    
    //accesseurs
    public idcategory(){ return $this->_idcategory; }
    public title(){ return $this->_title; }
    public link(){ return $this->_link; }
    public level(){ return $this->_level; }
    public levelprivate(){ return $this->_levelprivate; }
    public nbposts(){ return $this->_nbposts; }
    public lastpostdate(){ return $this->_lastpostdate; }
    
    //cteur
    public __construct(){
        loadDefault();
    }
    
    //loaders
    
    public loadDefault(){
        $_idcategory = null;
        $_title = null;
        $_link = null;
        $_level = null;
        $_levelprivate = null;
        $_nbposts = null;
        $_lastpostdate = null;
    }
    
    //! Charge la catégorie dans l'objet à partir de son id
    public loadFromId($id){
        try{
            $sql = 'SELECT *, COUNT(`idpost`) AS nbposts, MAX(`datetime`) AS lastpostdate 
                    FROM forum_posts p
                        LEFT JOIN forum_categories c
                        ON p.idcategory = c.idcategory
                    WHERE c.idcategory = :id
                    GROUP BY c.idcategory';
                    
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                $this->_idcategory = $res['idcategory'];
                $this->_title = $res['title'];
                $this->_link = $res['link'];
                $this->_level = $res['level'];
                
                $this->_levelprivate = ($this->_level == null);
                $this->_nbposts = $res['nbposts'];
                $this->_lastpostdate = $res['lastpostdate'];
                return true;
            }
            $this->loadDefault();
            return false;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement de la catégorie par id : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //! Charge la catégorie dans l'objet à partir de son code lien
    public loadFromLink($link){
        try{
            $sql = 'SELECT *, COUNT(`idpost`) AS nbposts, MAX(`datetime`) AS lastpostdate 
                    FROM forum_posts p
                        LEFT JOIN forum_categories c
                        ON p.idcategory = c.idcategory
                    WHERE c.link = :link
                    GROUP BY c.idcategory';
                    
            $query = pdo()->prepare($sql);
            $query->bindValue(':link', $link, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                $this->_idcategory = $res['idcategory'];
                $this->_title = $res['title'];
                $this->_link = $res['link'];
                $this->_level = $res['level'];
                
                $this->_levelprivate = ($this->_level == null);
                $this->_nbposts = $res['nbposts'];
                $this->_lastpostdate = $res['lastpostdate'];
                return true;
            }
            $this->loadDefault();
            return false;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement de la catégorie par link : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //! Renvoie un tableau de toutes les catégories. Les forum publics sont listés en premier.
    public static getAll(){
        try{
            $sql = 'SELECT *, COUNT(`idpost`) AS nbposts, MAX(`datetime`) AS lastpostdate 
                    FROM forum_posts p
                        LEFT JOIN forum_categories c
                        ON p.idcategory = c.idcategory
                    GROUP BY c.idcategory
                    ORDER BY c.level';
                    
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            foreach($res as $cat){
                $cat['levelprivate'] = ($cat['level'] == null);
            }
            return $res;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement de la catégorie par id : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //! Renvoie un tableau de posts sans parent
    public getPosts($offset, $nb){
        try{
            $sql = 'SELECT *
                    FROM forum_posts
                    WHERE idcategory = '. $this->_idcategory.'
                    AND parent IS NULL
                    ORDER BY datetime';
            $query = pdo()->prepare($sql);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $res;
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors du chargement de la liste de posts de la catégorie : '.$e->getMessage(), E_USER_ERROR);
        }
    }
}

class UserForumCategory extends ForumCategory{
    private $_idaccount;
    private $_hasNewPosts;
    
    //cteur
    public __construct(){
        $_idcategory = null;
        $_title = null;
        $_link = null;
        $_level = null;
        $_levelprivate = null;
        $_nbposts = null;
        $_lastpostdate = null;
        $_idaccount = null;
        $_hasNewPosts = null;
    }
    
    //! Charge la catégorie dans l'objet à partir de son code lien
    public loadFromLink($link){
    
    }
    
    //! Renvoie un tableau de toutes les catégories. Les forum publics sont listés en premier.
    public static getAll(){
    
    }
    
    //! Renvoie un tableau de posts
    public getPosts($offset, $nb){
        
    }
}

?>