<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
           return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)===0;
    }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
    }
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                   $this->is_number($nombre,$key);
                   if($this->is_valid()){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
                    }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){
    $this->is_positif($nbre1,$key1);
    $this->is_positif($nbre2,$key2);
   if($this->is_valid()){
           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   }

}

public function  is_empty($nbre,$key,$sms=null){
    if(empty($nbre)){
        if($sms==null){
            $sms="Le Nombre  est Obligatoire";
        }
        $this->errors[$key]= $sms;

        }
    }
//Expressions Régulières
    public function  is_email($valeur,$key,$sms=null){
        $valeur = filter_var($valeur, FILTER_SANITIZE_EMAIL);

        if (!filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
            echo("$valeur  email address valide");
          } else {
            echo("$valeur email address invalide");
          }
    }

    //9chiffres , commence par 77,78,75,76,70
    public function  is_telephone($valeur,$key,$sms=null){
        if( preg_match"(#[7][5-0][-\.?]?[0-9][0-9][0-9][-\.?]?([0-9][0-9][-\.?]?){2}$#",$valeur)){
            if($sms==null){
                $sms="le numero est invalide";
            }
            $this-> error[$key]=$sms;
        }

           
    }





}



?>