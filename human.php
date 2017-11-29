<?php

abstract class Human {
     // Fields
     protected $gender;
     protected $name;
     protected $age;
 
     protected function __construct($gender, $name, $age){
         $this->gender   = $gender;
         $this->name     = $name;
         $this->age      = $age;
     }
 
     public function getGender(){
         return $this->gender;
     }   
 
     public function getName(){
         return $this->name;
     }
 
     public function getAge(){
         return $this->age;
     }

     protected function show() {
        echo "HUMAN --> ".$this->getName(). " (". $this->getGender(). ") age: ".$this->getAge(). " ";
     }
}

class Male extends Human {
    // Fields
    private $beardStyle;

    public function __construct($name, $age, $beardStyle) {
        parent::__construct("male", $name, $age);
        $this->beardStyle = $beardStyle;
    }
    
    public function getBeardStyle() {
        return $this->beardStyle;
    }

    public function show() {
        parent::show();
        echo "[Beard type: ".$this->getBeardStyle()."]<br>";
    }

}

class Female extends Human {
    // Fields
    private $pregnancyStatus;

    public function __construct($name, $age, $pregnancyStatus) {
        parent::__construct("male", $name, $age);
        $this->pregnancyStatus = $pregnancyStatus;
    }

    public function show() {
        parent::show();
        echo "[Pregnancy status: ";
        echo $this->pregnancyStatus ? 'pregnant' : 'not pregnant';
        echo "]<br>";
    }
}

class HumanFactory {

    public function create($gender, $name, $age, $field1) {
        if($gender == "male") {
            return new Male($name, $age, $field1);
        } else if($gender == "female") {
            return new Female($name, $age, $field1);
        }
    }

}


// 
// MAIN
//

$humanFactory = new HumanFactory();

$male1 = $humanFactory->create("male", "Milos Miljkovic", 26, "short");
$male1->show();

$female1 = $humanFactory->create("female", "Jane Doe", 25, false);
$female1->show();

$male2 = $humanFactory->create("male", "Marko Markovic", 40, "long and curly");
$male2->show();
