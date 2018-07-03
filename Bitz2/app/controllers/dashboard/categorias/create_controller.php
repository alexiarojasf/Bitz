<?php
require_once("../../app/models/categoria.class.php");
try{
    $categoria = new Categoria;
    if(isset($_POST['crear'])){
        $_POST = $categoria->validateForm($_POST);
        if($categoria->setNombre($_POST['nombre'])){
                        if($categoria->createCategoria()){
                            Page::showMessage(1, "Categoría creada", "index.php");
                        }else{     
                            throw new Exception("No se creo la categoria");
                        }                       
        }else{
            throw new Exception("Nombre incorrecto");
        }        
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once "../../app/views/dashboard/categorias/create_view.php";
?>