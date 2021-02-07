<?php

interface Fowl {

    public function layEgg(): FowlEgg;
}

 class Goose implements Fowl{
   
     public function layEgg(): \FowlEgg {
        
         $fowlEgg = new FowlEgg(new Goose());
    }

}

class FowlEgg {

    public function __construct(string $fowlType) {
        
    }

    public function hatch(): ?Fowl {
        return null;
    }

    

}

