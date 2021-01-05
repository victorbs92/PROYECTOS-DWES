
<!--Confeccionar una clase CabeceraPagina que permita mostrar un título, 
indicarle si queremos que aparezca centrado, a derecha o izquierda,
además permitir definir el color de fondo y de la fuente. 
Añádele un constructor que permita inicializar los parámetros.-->


<?php

class CabeceraPagina {

    private $titulo, $text_align, $background_color, $color;

    function __construct($titulo, $text_align = null, $background_color = null, $color = null) {
        $this->titulo = $titulo;
        $this->text_align = $text_align;
        $this->background_color = $background_color;
        $this->color = $color;
    }

    //Costructor Ejercicio 4
    public function mostrar() {
        $tex = is_null($this->text_align) ? "" : "text-align:{$this->text_align};";
        $col = is_null($this->color) ? "" : "color:{$this->color};";
        $bac = is_null($this->background_color) ? "" : "background-color:{$this->background_color};";
        echo "<h1 style='{$tex} {$col} {$bac}' >{$this->titulo}</h1>";
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setText_align($text_align) {
        $this->text_align = $text_align;
    }

    function setBackground_color($background_color) {
        $this->background_color = $background_color;
    }

    function setColor($color) {
        $this->color = $color;
    }

}
?>

