<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Fitness;
use App\Models\Categoria;
use Sirius\Validation\Validator;

class FitnessController extends BaseController{

    /**
     * Ruta raiz [GET] /fitness para la direccion home de la aplicacion. En este caso se muestra la lista de grupos musculares.
     *
     * @return string Render del ejercicio con toda la informacion.
     *
     * Ruta [GET] /fitness/{id} que muestra la pagina de detella de los ejercicios del grupo muscular seleccionado.
     *
     * @param $id Código del ejercicio.
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
            $comments = Comment::where('fitness_id', $id)->orderBy('created_at','DESC')->get();

            if (!$categoria) {
                return $this->render('404.twig', ['webInfo' => $webInfo]);
            }

            return $this->render('fitness.twig', [
                'categoria' => $categoria,
                'fitness' => $fitness,
                'webInfo' => $webInfo,
                'comments' => $comments
            ]);
        }
    }

    /**
     * Ruta [GET] /fitness/new que muestra el formulario de añadir un nuevo ejercicio.
     *
     * @return string Render del ejercicio con toda la informacion.
     */
    public function getAdd(){
            global $categoriaValues;

        $errors = array();  // Array donde se guardan los errores de validacion.
        $error = false;     // Sera true si hay errores de validacion.

        $webInfo = [
            'h1'        => 'Añadir Ejercicio',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        // Se construye un array asociativo $fitness con todas sus claves vacias
        $fitness = array_fill_keys(["nombre", "posicion", "ejecucion", "imagen", "categoria"], "");

        return $this->render('formFitness.twig', [
            'fitness' => $fitness,
            'errors' => $errors,
            'webInfo' => $webInfo,
            'categoriaValues' => $categoriaValues
        ]);
    }

    /**
     * Ruta [POST] /fitness/new que procesa la introducion de un nuevo ejercicio.
     *
     * @return string Render del ejercicio con toda la informacion
     */
    public function postAdd(){
        global $categoriaValues;

        $webInfo = [
            'h1'        => 'Añadir Ejercicio',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        if ( !empty($_POST)) {
            $validator = new Validator();

            //Mensaje que se muestran si hay algun arror con los datos introducidos
            $requiredFieldMessageError = "El {label} es requerido";

            //Se comprueba si los datos introducidos son correctos
            $validator->add('nombre:Nombre', 'required', [], $requiredFieldMessageError);
            $validator->add('posicion:Posicion', 'required', [], $requiredFieldMessageError);
            $validator->add('ejecucion:Ejecucuion', 'required', [], $requiredFieldMessageError);
            $validator->add('categoria:Categoria', 'required', [], $requiredFieldMessageError);

            //Extraemos los datos enviados por POST
            $fitness['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $fitness['posicion'] = htmlspecialchars(trim($_POST['posicion']));
            $fitness['ejecucion'] = htmlspecialchars(trim($_POST['ejecucion']));
            $fitness['imagen'] = htmlspecialchars(trim($_POST['imagen']));
            $fitness['categoria'] = htmlspecialchars(trim($_POST['categoria']));

            if ($validator->validate($_POST)){

                $fitness = new Fitness([
                    'nombre'     => $fitness['nombre'],
                    'posicion'   => $fitness['posicion'],
                    'ejecucion'  => $fitness['ejecucion'],
                    'imagen'    => $fitness['imagen'],
                    'categoria' => $fitness['categoria']
                ]);
                $fitness->save();

                //Si se guarda sin problemas se redireccion la aplicacion a la pagina de inicio.
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formFitness.twig', [
            'fitness' => $fitness,
            'errors' => $errors,
            'webInfo' => $webInfo,
            'categoriaValues' => $categoriaValues
        ]);
    }

    /**
     * Ruta [GET] /fitness/edit{id} que muestra el formulario de actualizacion de un ejercicio
     *
     * @param $id Código del ejercicio
     *
     * @return string Render del ejercicio con toda la informacion
     */
    public function getEdit($id){
        global $categoriaValues;

        $errors = array();  // Array donde se guardan los errores de validacion.

        $webInfo = [
            'h1'        => 'Actualizar Ejercicio',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        // Recuperar datos
        $fitness = Fitness::find($id);

        if ( !$fitness){
            header("Location: fitness/$id.twig");
        }

        return $this->render('formFitness.twig', [
            'fitness' => $fitness,
            'errors' => $errors,
            'webInfo' => $webInfo,
            'categoriaValues' => $categoriaValues
        ]);
    }

    /**
     * Ruta [PUT] /fitness/edit{id} que actualiza toda la informacion de un ejercicio. Se usa el verbo
     * put porque la actualizacion se realiza en todos los campos de la base de datos.
     *
     * @param $id Código de la distribucion
     *
     * @return string Render del ejercicio con toda la informacion
     */
    public function putEdit($id){
        global $categoriaValues;

        $errors = array(); // Array donde se guardan los errores de validacion

        $webInfo = [
            'h1'        => 'Actualizar Ejercicio',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        if ( !empty($_POST)) {
            $validator = new Validator();

            //Mensaje que se muestra si hay algun error con los datos introducidos
            $requiredFieldMessageError = "El {label} es requerido";

            //Se comprueba si los datos introducidos son correctos
            $validator->add('nombre:Nombre', 'required', [], $requiredFieldMessageError);
            $validator->add('posicion:Posicion', 'required', [], $requiredFieldMessageError);
            $validator->add('ejecucion:Ejecucuion', 'required', [], $requiredFieldMessageError);
            $validator->add('categoria:Categoria', 'required', [], $requiredFieldMessageError);

            //Extraemos los datos enviados por POST
            $fitness['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $fitness['posicion'] = htmlspecialchars(trim($_POST['posicion']));
            $fitness['ejecucion'] = htmlspecialchars(trim($_POST['ejecucion']));
            $fitness['imagen'] = htmlspecialchars(trim($_POST['imagen']));
            $fitness['categoria'] = htmlspecialchars(trim($_POST['categoria']));

            if ($validator->validate($_POST)){

                $fitness = Fitness::where('id', $id)->update([
                    'nombre'     => $fitness['nombre'],
                    'posicion'   => $fitness['posicion'],
                    'ejecucion'  => $fitness['ejecucion'],
                    'imagen'    => $fitness['imagen'],
                    'categoria' => $fitness['categoria']
                ]);

                //Si se guarda sin problemas se redireccion la aplicacion a la pagina de inicio.
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formFitness.twig', [
            'fitness' => $fitness,
            'errors' => $errors,
            'webInfo' => $webInfo,
            'categoriaValues' => $categoriaValues
        ]);
    }


    public function postIndex($id){
        $errors = [];
        $validator = new Validator();

        $validator->add('name:Nombre','required', [], 'El {label} es necesario para comentar');
        $validator->add('name:Nombre','minlength', ['min' => 5], 'El {label} debe tener al menos 5 caracteres');
        $validator->add('email:Email','required', [], 'El {label} no es válido');
        $validator->add('email:Email','required', [], 'El {label} es necesario para comentar');
        $validator->add('comment:Comentario', 'required', [], 'Aunque los silencios a veces dicen mucho no se permiten comentarios vacíos');

        if($validator->validate($_POST)){
            $comment = new Comment();

            $comment->fitness_id = $id;
            $comment->user = $_POST['name'];
            $comment->email = $_POST['email'];
            $comment->ip = getRealIP();
            $comment->text = $_POST['comment'];
            $comment->approved = true;

            $comment->save();

            header("Refresh: 0 " );
        }else{
            $errors = $validator->getMessages();
        }

        $webInfo = [
            'title' => 'Página de Fitness - FitnessAPP'
        ];

        $fitness = Fitness::find($id);
        $comments = Comment::all();
        $webInfo = [
            'title' => 'Página de Fitness - FitnessAPP'
        ];

        if( !$fitness ){
            return $this->render('404.twig', ['webInfo' => $webInfo]);
        }

        return $this->render('fitness.twig', [
            'errors'    => $errors,
            'webInfo'   => $webInfo,
            'fitness'    => $fitness,
            'comments'  => $comments
        ]);
    }

    /**
     * Ruta [DELETE] /fitness/delete para eliminar el ejercicio con el codigo pasado.
     */
    public function deleteIndex(){
        $id = $_REQUEST['id'];

        $fitness = Fitness::destroy($id);

        header('Location: '. BASE_URL);
    }
}
