<?php
class persona {
    private $name;
    private $edad;
    static $num_persona=0;
    
    const prueba=10;
    
    function __construct($nombre,$edad){
        $this->name=$nombre;
        $this->edad=$edad;
        self::$num_persona++;
    }/*
    function __construct($nombre){
        
    }
   
    function __construct($param){
        if (is_string($param)){
            $this->name=$param;
        }elseif (is_array($param)){
            $this->name=$param[0];
            $this->edad=$param[1];
        }elseif (is_int($param)){
            
        }
        
        
    }*/
    function __destruct(){
        self::$num_persona--;
    }
    function set_name($new_name) {
        $this->name = $new_name;
    }
    
    function get_name() {
        return $this->name;
    }
    
    function __get($edad){
        return $this->edad;
    }
    
    function __set($edad,$num){
        $this->edad=$num;
    }
    
    
    public static function numero_persona(){
        self::$num_persona++;
    }
    
    function get_numpersona(){
        return self::$num_persona;
    }
}
?>