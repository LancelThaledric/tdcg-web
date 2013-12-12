<?php
/*
    class account : Connexion, déonnexion, connexion auto, modifications e-mail, password, clé de validation et rang.
*/

class AccountRang{
    const ADMIN = 10;
    const MODO = 5;
    const PLAYER = 1;
    const VISITOR = 0;
    const BANNED = -1;
    const UNVALID = -2;
}

class Account{

    private $_idaccount;
    private $_email;
    private $_username;
    private $_password;     //hashé deux fois en sha512 : très grande protection.
    private $_validationkey;
    private $_rang;
    
    //! Créée un compte théorique. Il n'est pas chargé depuis la BDD ni inséré. il initialise juste les valeurs par défaut. (Compte invité)
    public function __construct(){
        $this->logout();
    }
    
    private static function genKey(){
        return md5(uniqid(true));
    }
    
    public static function hashPass($unhashed){
        return hash('sha512', hash('sha512', $unhashed));
    }
    
    //! Réinitialise les valeurs de la classe par celles d'un invité.
    public function logout(){
        $this->_idaccount = null;
        $this->_email = null;
        $this->_username = 'Invité';
        $this->_password = null;
        $this->_validationkey = null;
        $this->_rang = AccountRang::VISITOR;
    }

    // opérations BDD
    
    //insère un compte dans la BDD à partir des infos contenues dans cet objet, puis le met dans l'objet courant.
    public static function insertAccount($email, $username, $unhashed){
        //on vérifie d'abord si un compte existe deja avec cet e-mail ou ce username.
        
        try{
            if(Account::checkAccountExists($username, $email)){
                return false;
            }
            
            //si un compte n'existe aps déjà, on peu ajouter
            $sql = 'INSERT INTO accounts(email, username, password, validationkey,  rang) values (:email, :username, :password, "'.Account::genKey().'", "'.AccountRang::UNVALID.'")';
            $query = pdo()->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':username', $username, PDO::PARAM_STR);
            $query->bindValue(':password', Account::hashPass($unhashed), PDO::PARAM_STR);
            $query->execute();
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de l\'inscription : '.$e->getMessage(), E_USER_ERROR);
        }
        
    }
    
    //! met à jour le compte de la bdd à partir des données envoyée en paramètres. Le paramètre est un array contenant les clés à changer et leur nouvelle valeur.
    public function updateAccount(array $newvals, $id){
        if(!$this->accountIdExists($id)) return false;
    
        //step 1 : on dresse l'array des valeurs à changer
        $args = array(
                        'email' => PDO::PARAM_STR,
                        'username' => PDO::PARAM_STR,
                        'password' => PDO::PARAM_STR,
                        'validationkey' => PDO::PARAM_STR,
                        'rang' => PDO::PARAM_INT
                     );
        foreach($newvals as $key => $value){
            if(!isset($args[$key]))
                unset($newvals[$key]);
        }
        //$newvals ne contient que des valeurs prêtes à remplacer
        $email = (isset($newvals['email'])) ? $newvals['email'] : null;
        $username = (isset($newvals['username'])) ? $newvals['username'] : null;
        if($this->checkAccountExists($username, $email))
            return false;
            
        //Les valeurs sont correctes et n'entraineront pas de double-compte, on peut faire l'update.
        $sql = 'UPDATE accounts SET ';
        $first = true;
        foreach($newvals as $key => $value){
            if(!$first) $sql .= ', '; else $first = false;
            $sql .= $key . '=:'.$key;
        }
        $sql .= ' WHERE idaccount=:idaccount';
        //la requète est générée, on la prépare.
        $query = pdo()->prepare($sql);
        foreach($newvals as $key => $value){
            $query->bindValue(':'.$key, $value, $args[$key]);
        }
        $query->bindValue(':idaccount', $id, PDO::PARAM_INT);
        // puis on extécute  :
        $query->execute();
        
        //enfin, il faut mettre à jour les infos de la classe.
        $this->loadAccount($id);
    }
    
    //! Charge les infos du compte depuis la bdd.
    public function loadAccount($id){
        try{
        
            $sql = 'SELECT * FROM accounts WHERE idaccount=:id';
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                $this->_idaccount = $res['idaccount'];
                $this->_email = $res['email'];
                $this->_username = $res['username'];
                $this->_password = $res['password'];
                $this->_validationkey = $res['validationkey'];
                $this->_rang = $res['rang'];
                return $this;
            }
            return false;
            
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de l\'inscription : '.$e->getMessage(), E_USER_ERROR);
        }
    }
    
    //! vérifie les informations de connexion dans la BDD. Renvoie l'id du compte s'il existe ou false sinon. Stocke l'objet dans la session.
    public function login($usr, $unhashed){
        
        $username = $usr;
        $password = $this->hashPass($unhashed);
        
        try{
        
            $sql = 'SELECT * from accounts WHERE username=:username AND password=:password';
            $query = pdo()->prepare($sql);
            $query->bindValue(':username', $username, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                //utilisateur trouvé, on récupère les infos.
                $this->_idaccount = intval($res['idaccount']);
                $this->_email = $res['email'];
                $this->_username = $res['username'];
                $this->_password = $res['password'];
                $this->_validationkey = $res['validationkey'];
                $this->_rang = intval($res['rang']);
                
                if(!$this->checkRang()){    //si le rang n'est pas correct, on déconnecte
                    $this->logout();
                    return -1;
                }
                return $this->_idaccount;   //sinon, il est correct, on login !
            }
            else{
                //echec du login
                $this->logout();
                return 0;
            }
        
        }
        catch(Exception $e)
        {
            trigger_error('Echec d\'exécution du login', E_USER_ERROR);
        }
    }
    
    //! Renvoie false si le rang du membre n'est pas correct. (<=0)
    public function checkRang(){
        if($this->_rang <= 0){
            return false;
        }
        return true;
    }
    
    public static function checkAccountExists($username, $email){
        try{
            $sql = 'SELECT idaccount FROM accounts WHERE email=:email OR username=:username';
            $query = pdo()->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':username', $username, PDO::PARAM_STR);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                return true;
            }
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de la vérification sir le compte existe : '.$e->getMessage(), E_USER_ERROR);
        }
        return false;
    }
    
    // renvoie ture si un compte a cet Id.
    public function accountIdExists($id){
        try{
            $sql = 'SELECT idaccount FROM accounts WHERE idaccount=:id';
            $query = pdo()->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if($res){
                return true;
            }
        }
        catch(Exception $e)
        {
            trigger_error('Echec lors de la vérification si le compte(ID) existe : '.$e->getMessage(), E_USER_ERROR);
        }
        return false;
    }
        
    //retourne true si l'utilisateur a un compte est s'est connecté.
    public function isConnected(){
        return $this->_rang > AccountRang::VISITOR;
    }
    
    //accesseurs bruts
    public function idaccount(){ return $this->_idaccount; }
    public function email(){ return $this->_email; }
    public function username(){ return $this->_username; }
    public function password(){ return $this->_password; }
    public function validationkey(){ return $this->_validationkey; }
    public function rang(){ return $this->_rang; }

}

?>