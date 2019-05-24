<?php

class sessie{
    public $ingelogd = FALSE;
    public $sessieTijd = 300; // sessieTijd std = 5 min

    public function __construct($naam, $email){
        $this->name = $naam;
        $this->email = $email;
        $this->sessieId = session_create_id();
    }

    public function inloggen(){
        if ( !session_start() ){
            return false;
        }else {
            $this->ingelogd = TRUE;
            $_SESSION['ingelogd'] = $this->ingelogd;
            $_SESSION['naam'] = $this->name;
            $_SESSION['email'] = $this->email;
            $_SESSION['ID'] = $this->sessieId;
            $_SESSION['startTijd'] = time();
            $_SESSION['eindTijd'] =  time() + $this->sessieTijd; //lifetime 5 mins
            $_SESSION['sessieTijd'] = $this->sessieTijd;
            return true;
        }
    }

    public function uitloggen(){
        $_SESSION = array();                          // legen van $_SESSION
        $this->ingelogd = false;
        session_destroy();                            // vernietig de sessie op server
        setcookie('PHPSESSID', '', time()-1800,'/', '', 0, 0);
        return TRUE;
    }

    public function vernieuwSessie(){
        session_reset();
        $_SESSION['eindTijd'] = time() + $this->sessieTijd;
        return TRUE;
    }
}

