<?php
    abstract class Creature {
        public $name;
        public $age;
        public $health;

        public function __construct(String $name, int $age, int $health) {
            $this->setCreatureValues($name, $age, $health);
        }

        final public function setCreatureValues(String $name, int $age, int $health){
            $this->name = $name;
            $this->age = $age;
            $this->health = $health;
        }

        public function ToString() : String{
            return
            "
                <p>
                    Creature $this->name's stats {<br>
                    Age: $this->age;<br>
                    Health: $this->health;<br>
                    }
                </p>
            ";
        }

        abstract public function attack(Creature $target) : String;
    }

    class Hero extends Creature {
        public $strength;
        public $intelligence;
        
        public function __construct(
            String $name, int $age, int $health,
            int $strength, int $intelligence)
        {
            $this->setCreatureValues($name, $age, $health);
            $this->strength = $strength;
            $this->intelligence = $intelligence;
        }

        public function attack(Creature $target) : String {
            return "Hero $this->name attacks $target->name with $this->strength power";
        }

        public function castSpell(Creature $caster, Creature $target) : String {
            return "Hero $this->name casts a spell on $target with $this->intelligence intelligence";
        }

        public function ToString() : String{
            return
            "
                <p>
                    Hero $this->name's stats {<br>
                        Age: $this->age;<br>
                        Health: $this->health;<br>
                        Strength: $this->strength;<br>
                        Intelligence: $this->intelligence;<br>
                    }
                </p>
            ";
        }
    }

    class Monster extends Creature {
        public $ferocity;

        public function __construct(
            String $name, int $age, int $health,
            int $ferocity)
        {
            $this->setCreatureValues($name, $age, $health);
            $this->ferocity = $ferocity;
        }

        public function attack(Creature $target) : String {
            return "Monster $this->name attacks $target->name with $this->ferocity ferocity";
        }

        public function ToString() : String{
            return
            "
                <p>
                    Monster $this->name's stats {<br>
                        Age: $this->age;<br>
                        Health: $this->health;<br>
                        Ferocity: $this->ferocity;<br>
                    }
                </p>
            ";
        }
    }

    interface MagicAbility {
        public function castSpell(Creature $caster, Creature $target) : String;
        public function teleport(Creature $creature, String $location) : String;
    }

    trait Magic {
        public function castSpell(Creature $caster, Creature $target) : String {
            return "$caster->name is casting a spell on $target->name!";
        }

        public function teleport(Creature $creature, String $location) : String {
            return "$creature->name is teleporting to $location";
        }
    }

    class Elf extends Hero implements MagicAbility {
        use Magic;

        public function attack(Creature $target) : String {
            return "Hero $this->name is shooting arrows at $target->name with $this->strength power";
        }
    }
?>