<?php

abstract class Character
{
    protected $healthPoints = 100;
    protected $magicPoints = 20;
    public $damage = 15;
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function isAlive() {
        if ($this->healthPoints <= 0) {
            $this->healthPoints = 0;
            return false;
        } else {
            return true;
        }
    }

    public function getHealthPoints() {
        return $this->healthPoints;
    }

    public function setHealthPoints($damage) {
        $this->healthPoints -= round($damage);
        $this->isAlive();
        return;
    }
}
