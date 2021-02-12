<?php

class Magician extends Character
{
    private $shield = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 5;
        $this->magicPoints *= 2;
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->magicPoints == 0) {
            $status = $this->attack($target);
        } else if ($rand > 3 || $this->shield) {
            $status = $this->magicBolt($target);
        } else if ($rand <= 3) {
            $status = $this->shield();
        }
        return $status;
    }

    public function magicBolt($target) {
        $magicCost = rand(1, 20);
        if ($magicCost > $this->magicPoints) {
            $magicBoltDamage = $this->magicPoints * rand(1, 3);
            $this->magicPoints = 0;
        } 
        else {
            $magicBoltDamage = $magicCost * rand(1, 3);
            $this->magicPoints -= $magicCost;
        }
        $target->setHealthPoints($magicBoltDamage);
        $status = "$this->name lance un éclair magique sur $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->magicPoints points de magie à $this->name !";
        return $status;
    }

    public function shield() {
        $this->shield = true;
        $status = "$this->name lancer un bouclier magique pour se protéger !";
        return $status;
    }

    public function setHealthPoints($damage) {
        if (!$this->shield) {
            $this->healthPoints -= round($damage);
        }
        $this->shield = false;
        $this->isAlive();
        return;
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup de bâton à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}
