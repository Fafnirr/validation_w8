<?php 

class Archer extends Character {

    public $quiver = 7;
    public $ArrowDamage = 18;

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 5;
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->quiver == 0) {
            $status = $this->attack($target);
        } else if ($rand > 2) {
            $status = $this->Arrow($target);
        } else if ($rand <= 2) {
            $status = $this->doubleArrow($target);
        }
        return $status;
    }

    public function Arrow($target) {
        $arrowUsed = 1;
        if ($arrowUsed > $this->quiver) {
            $this->quiver == 0;
        } 
        else {
            $this->quiver -= $arrowUsed;
        }
        $target->setHealthPoints($this->ArrowDamage);
        $status = "$this->name tire une flèches sur $target->name ! Il reste $target->healthPoints points de vie à $target->name ! $this->name à $this->quiver flèches restante !";
        return $status;
    }

    public function doubleArrow($target) {
            $arrowUsed = 2;
        if ($arrowUsed > $this->quiver){
            $this->quiver == 0;
        }else if($arrowUsed <= $this->quiver){
            $doubleDamage = 36;
            $this->quiver -= $arrowUsed;
        }
        $target->setHealthPoints($doubleDamage);
        $target->isAlive();
        $status = "$this->name garde une flèche pour en tiré deux au tour suivant ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}