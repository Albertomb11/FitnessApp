<?php
namespace App\Controllers;

use App\Models\Categoria;
use App\Models\Fitness;

class CategoriaController extends BaseController {

    /**
     * Ruta raiz [GET] /fitness para la direccion home de la aplicacion. En este caso se muestra la lista de ejercicios
     *
     * Ruta [GET] /fitness/{id} que muestra la pagina de detella del ejercicio.
     *
     * @param $id Código de la distribucion
     *
     * @return string Render del ejercicio con toda la informacion.
     */
    public function getIndex($id = null){

        if (is_null($id)) {
            $webInfo = [
                'title' => 'Página de Inicio - FitnessAPP'
            ];

            $categorias = Categoria::query()->get();

            return $this->render('home.twig', [
                'categorias' => $categorias,
                'webInfo' => $webInfo
            ]);

        } else {
            //Recuperar datos

            $webInfo = [
                'title' => 'Página de Fitness - FitnessAPP'
            ];

            $categoria = Categoria::find($id);
            $fitness = Fitness::where('categoria', $categoria['Grupo_muscular'])->get();

            if (!$categoria) {
                return $this->render('404.twitg', ['webInfo' => $webInfo]);
            }

            return $this->render('fitness.twig', [
                'categoria' => $categoria,
                'fitness' => $fitness,
                'webInfo' => $webInfo
            ]);
        }
    }
}
