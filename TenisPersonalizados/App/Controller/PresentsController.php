<?php
    class PresentsController{
        private $vista;

        public function index(){
            $vista="app/View/IndexPresentsView.php";
            include_once("app/View/PlantillaAdminView.php");
        }
    }
?>