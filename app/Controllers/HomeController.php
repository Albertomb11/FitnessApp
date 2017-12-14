<?php
namespace App\Controllers;

use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\RegisterController;
use App\Models\User;

class HomeController {

    /**
     * Ruta / donde se muestra la página de inicio del proyecto.
     *
     * @return string Render de la página.
     */
    public function getIndex(){
        $categoria = new FitnessController();

        return $categoria->getIndex();
    }

    /**
     * Ruta todavia por implementar
     *
     * @return string Render de la pagina
     */
    public function getContacto(){
        return 'Información de contacto';
    }

    /**
     * Ruta [GET] /login donde se muestra el formulario para hacer login en la aplicacion.
     *
     * @return string Render de la página.
     */
    public function getLogin(){
        $auth = new AuthController();

        return $auth->getLogin();
    }

    /**
     * Ruta [POST] /login que procesa la introducion de los datos para loguear al usuario.
     *
     * @return null|string Render de la página.
     */
    public function postLogin(){
        $auth = new AuthController();

        return $auth->postLogin();
    }

    /**
     * Ruta [GET] /registro donde se muestra el formulario para hacer un registro en la aplicacion.
     *
     * @return string Render de la página.
     */
    public function getRegistro(){
        $register = new RegisterController();

        return $register->getRegister();
    }

    /**
     * Ruta [POST] /registro donde procesa la introducion de los datos para registrar al nuevo usuario.
     *
     * @return string Render de la página.
     */
    public function postRegistro(){
        $register = new RegisterController();

        return $register->postRegister();
    }

    /**
     * Ruta [GET] /logout donde se muestra la pagina de inicio del proyecto despues de cerrar la sesion.
     */
    public function getLogout(){
        $auth = new AuthController();

        return $auth->getLogout();
    }
}