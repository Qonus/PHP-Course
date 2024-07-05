<?php
    class Vector {
        public $x, $y;

        public function __construct(int $x, int $y){
            $this->x = $x;
            $this->y = $y;
        }

        public function ToString(){
            return "[x: " . $this->x . ", y: " . $this->y . "]";
        }
    }

    class Rectangle {
        // Points: top-left, bottom-right
        public $point1, $point2;
        
        public function __construct(Vector $point1, Vector $point2) {
            $this->point1 = $point1;
            $this->point2 = $point2;
        }

        // Get sides
        public function getTop(){
            return max($this->point1->y, $this->point2->y);
        }
        public function getBottom(){
            return min($this->point1->y, $this->point2->y);
        }
        public function getRight(){
            return max($this->point1->x, $this->point2->x);
        }
        public function getLeft(){
            return min($this->point1->x, $this->point2->x);
        }

        // Get points
        public function getTopRight(){
            return new Vector($this->getRight(), $this->getTop());
        }

        public function getTopLeft(){
            return new Vector($this->getLeft(), $this->getTop());
        }

        public function getBottomRight(){
            return new Vector($this->getRight(), $this->getBottom());
        }

        public function getBottomLeft(){
            return new Vector($this->getLeft(), $this->getBottom());
        }
        
        // Get measurements
        public function getWidth() {
            return $this->getRight() - $this->getLeft();
        }
        
        public function getHeight() {
            return $this->getTop() - $this->getBottom();
        }

        public function getPerimeter() {
            return ($this->getWidth() + $this->getHeight()) * 2;
        }

        public function getArea() {
            return $this->getWidth() * $this->getHeight();
        }

        // Get if Point is Inside rectangle
        public function isInside($point) {
            $x = $point->x;
            $y = $point->y;
            return (
                ($this->getTop() >= $y && $this->getBottom() <= $y)
                &&
                ($this->getRight() >= $x && $this->getLeft() <= $x)
            );
        }

        public function ToString() {
            return "Top-Left: " . $this->getTopLeft()->ToString() . "<br>Top-Right: " . $this->getTopRight()->ToString() . "<br>Bottom-Left: " . $this->getBottomLeft()->ToString() . "<br>Bottom-Right: " . $this->getBottomRight()->ToString();
        }
    }
?>