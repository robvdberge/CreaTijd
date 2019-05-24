<?php
// database handeler

// tablenaam=inlog   naam=varchar   email=varchar    pwd=varchar(hashed)     tempPass=varchar(hashed)

class database{
    private $DBHOST = 'localhost';
    private $DBNAME = 'CreaTijd';
    private $DBUSER = 'root';
    private $DBPWD = '';

    public function __construct(){
        $this->verbonden = false;
        $this->error = '';
    }

    public function verbinden(){
        if ( !$this->verbonden ){
            $this->stopVerbinding();
            $conn = 'mysql:host='. $this->DBHOST . ';DB_NAME=' . $this->DBNAME;
            
            try {
                $this->verbinding = new PDO( $conn, $this->DBUSER, $this->DBPWD );
                $this->verbonden = true;
                $this->verbinding->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                return true;
            } catch ( PDOException $e ) {
                $this->verbonden = false;
                $this->verbinding = NULL;
                $this->error = 'SQL verbindingfout: ' . $e->getMessage();
                echo $this->error;
                return false;
            }
        }else { return true;}
    }

    public function stopVerbinding(){
        if ( $this->verbonden ){
            $this->verbinding = NULL;
            $this->verbonden= false;
            return true;
        } else { 
            $this->verbinding=NULL;
            return true;
        }
    }
    
    public function checkNaam($naam){
        $this->verbinden();
        $sql = "SELECT
            inlog.naam
        FROM 
            CreaTijd.inlog
        WHERE 
            inlog.naam = :zoeknaam
        ";
        
        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue(':zoeknaam', $naam, PDO::PARAM_STR );
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_OBJ );

    }

    public function checkMail($email){
        $this->verbinden();
        $sql = "SELECT
            inlog.email
        FROM 
            CreaTijd.inlog
        WHERE 
            inlog.email = :zoekmail
        ";
        // print_r($this->verbinding);
        
        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue(':zoekmail', $email, PDO::PARAM_STR );
        $stmt->execute();
        return $stmt->fetch( PDO::FETCH_OBJ );

    }

    public function checkPwd($naam){
        $sql = "SELECT
            inlog.naam, 
            inlog.email,
            inlog.pwd
        FROM 
            CreaTijd.inlog
        WHERE 
            inlog.naam = :inlognaam
        ";
        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue( ':inlognaam', $naam, PDO::PARAM_STR );
        $stmt->execute();
        return $stmt->fetch( PDO::FETCH_OBJ );

    }
    
    public function nieuweAccount($naam, $email, $pwd){
        
        $sql = "INSERT INTO
            CreaTijd.inlog( 
                naam,
                email,
                pwd
            )
        VALUES
            ( :naam, :email, :pwd )
        ";

        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue( ':naam', $naam, PDO::PARAM_STR );
        $stmt->bindValue( ':email', $email, PDO::PARAM_STR );
        $stmt->bindValue( ':pwd', $pwd, PDO::PARAM_STR );
        $stmt->execute();

        return true;
    }
    
    public function haalGebruiker($naam){
        $this->verbinden();
        $sql = "SELECT
            naam,
            email,
            pwd
        FROM 
            CreaTijd.inlog
        WHERE 
            naam = :zoeknaam
        ";
        
        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue(':zoeknaam', $naam, PDO::PARAM_STR );
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_OBJ );
    }

    public function slaGebruikerOp($naam, $email){
          
        $sql = "UPDATE 
            CreaTijd.inlog
        
        SET
            email = :email
            
        WHERE
            naam = :naam
        ";

        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue( ':email', $email, PDO::PARAM_STR );
        $stmt->bindValue( ':naam', $naam, PDO::PARAM_STR );
        $stmt->execute();
        return true;
    }

    public function veranderPwd($email, $wachtwoord){
        $sql = "UPDATE 
            CreaTijd.inlog
        
        SET
            pwd = :pwd
            
        WHERE
            email = :email
        ";

        $stmt = $this->verbinding->prepare( $sql );
        $stmt->bindValue( ':pwd', $wachtwoord, PDO::PARAM_STR );
        $stmt->bindValue( ':email', $email, PDO::PARAM_STR );
        $stmt->execute();
        return true;
    }// todo : delete account + controls



}
