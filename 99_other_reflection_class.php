
<?php


class Apple {
    public function firstMethod() { }
    final protected function secondMethod() { }
    private static function thirdMethod() { }
}


//La clase ReflectionClass devuelve información sobre una clase. 
$clase = new ReflectionClass('Apple');
$métodos = $clase->getMethods();
var_dump($métodos);

//for more info visit 
//https://www.php.net/manual/es/class.reflectionclass.php
?>
