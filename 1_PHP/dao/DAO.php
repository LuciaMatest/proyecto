<?php
// Las interfaces de objetos permiten crear código con el cual especificar qué métodos deben ser implementados por una clase, sin tener que definir cómo estos métodos son manipulados
    interface DAO{
        public static function findAll();
        public static function findById($id);
        public static function update($objeto);
        public static function insert($objeto);
        public static function delete($id);
    }
?>