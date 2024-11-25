<?php

namespace App\Controllers;

/**
 * Esta clase la creamos con la finalidad de centralizar todas nuestras vistas.
 * Para poder verlas en el navegador por localhost, se necesitar definir el 
 * metodo para cada una de ellas y luego llamar al metodo view, pasando como 
 * parametro el nombre de la vista.
 * 
 * Posteriormente, para poder ver la vista enchufada a la web, será necesario 
 * que configuremos el archivo routes para indicar donde se ejecuta.
 * 
 * El routes tiene que saber donde se ejecuta, es el tio de la entrada que 
 * señala cosas, y el Pages sería el interior del habitaculo, es decir, aqui ya 
 * podemos desde mostrar vistas hasta limitarlas, crear metodoos, registros etc,
 * que posteriormente se hará.
 */
class PagesController extends BaseController {

    public function home() {
        return view('home');
    }

    public function acceso() {
        return view('acceso');
    }

    public function menu() {
        return view('menu');
    }

    public function perfil() {
        return view('perfil');
    }

    public function quienesSomos() {
        return view('quienesSomos');
    }

    public function realizarPedido() {
        return view('realizarPedido');
    }
}
