<?php

namespace App;

use App\Stat;



class Personnage
{
    private $name;
    private $life = 0;
    private $atk= 0;
    private $armor= 0;

    public function __construct(Stat $stat)
    {
        $this->name = $stat->getName();
        $this->life = $stat->getLife();
        $this->atk = $stat->getAtk();
        $this->armor = $stat->getArmor();

    }

    public function bonus ()
    {
        $bonus = rand(1, 6) > 4;
        if(!$bonus){
            return false;
        }
        echo $this->name . ' reçoit un bonus de vie ! <br>';
        $this->life += 50;
    }


    /**
         * Get the value of life
         */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */
    public function setLife(int $life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of armor
     */
    public function getArmor()
    {
        if($this->name !== "Hero"){
            return $this->armor;
        }
        $bonus = rand(1, 6) > 4 ? 20 : 0;
        return $this->armor + $bonus;
    }

    /**
     * Set the value of armor
     *
     * @return  self
     */
    public function setArmor(int $armor)
    {
       
        $this->armor = $armor;

        return $this;
    }

    /**
     * Get the value of atk
     */
    public function getAtk()
    {
        return $this->atk;
    }

    /**
     * Set the value of atk
     *
     * @return  self
     */
    public function setAtk(int $atk)
    {
        $this->atk = $atk;

        return $this;
    }

    public function attack(Personnage $target)
    {

        if($target->getLife() == 0 || $this->getLife() == 0) {
            return;
        }

        echo $this->name . ' attaque ' . $target->getName() . '<br>';
        echo 'Vie de la cible avant l\'attaque : '. $target->getLife(). '<br><br>';
        $damages = max($this->atk - $target->getArmor(), 0);
        echo $target->getName(). ' reçoit '. $damages . ' de dégats ' . '<br>';
        $target->setLife(max($target->getLife() - $damages, 0));
        echo 'Vie de la cible après l\'attaque : '. $target->getLife(). '<br><br>';
        if($target->getLife() == 0) {
            echo $target->getName() . ' est mort  x_x';
        }
    }
}