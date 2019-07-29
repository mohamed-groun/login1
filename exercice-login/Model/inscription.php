<?php
class inscription {
private $id ;
private $nom ;
private $prenom;
private $date;
private $email  ;
private $mdp;
private $session;
private $bd ;

    public function __construct( $id=null,$nom=null,$prenom=null,$date=null,$email=null,$mdp=null,$session=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date= $date;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->session = $session;
        $this->bd = connexionPDO::getInstance();
    }
    public function getId(){
    	return $this->id;
    }
    
    public function setId($id){
    	$this->id = $id;
    }
    
    public function getNom(){
    	return $this->nom;
    }
    
    public function setNom($nom){
    	$this->nom = $nom;
    }
    
    public function getPrenom(){
    	return $this->prenom;
    }
    
    public function setPrenom($prenom){
    	$this->prenom = $prenom;
    }
    
    public function getDate(){
    	return $this->date;
    }
    
    public function setDate($date){
    	$this->date = $date;
    }
    
    public function getEmail(){
    	return $this->email;
    }
    
    public function setEmail($email){
    	$this->email = $email;
    }
    
    public function getMdp(){
    	return $this->mdp;
    }
    
    public function setMdp($mdp){
    	$this->mdp = $mdp;
    }
    public function getSession(){
    	return $this->session;
    }
    
    public function setSession($session){
    	$this->mdp = $session;
    }
    public function getBd(): ?PDO
    {
        return $this->bd;
    }
    
    public function setBd(?PDO $bd): void
    {
        $this->bd = $bd;
    }

      public function select(){
        $query = 'SELECT * FROM `inscription` ';
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function selectByemail($email,$mdp){
    	$query = "SELECT `email` , `mdp` FROM `inscription` WHERE `email`='".$email."'  AND `mdp`='".$mdp."' ";
    	$reponce = $this->bd->prepare($query);
    	$reponce->execute(
    			array(
    			)
    			);
    	return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
    public function addProduit($nom,$prenom,$date,$email,$mdp,$session){
        $query = "INSERT INTO `inscription` ( `nom`, `prenom`, `dateNaissance`, `email` , `mdp` , `session`) 
        VALUES ('".$nom."' , '".$prenom."' , '".$date."' , '".$email."', '".$mdp."', '".$session."');";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'nom' => $nom,
                'prenom' => $prenom,
                'date' => $date,
                'email' => $email, 
            	'mdp' => $mdp,
            	'session' => $session
            
            )
        );
    }

     public function deleteProduit($id) {
        $requete = "DELETE FROM `inscription` WHERE `inscription`.`id` =:id";
        $pdoResult = $this->bd->prepare($requete);
        $pdoResult->execute(array(":id" => $id));
    }
}
?>
