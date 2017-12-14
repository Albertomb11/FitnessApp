<?php
namespace App\Controllers;

use App\Models\Fitness;

class ApiController {

    public function getFitness($id  = null)
    {
        if (is_null($id)) {
            $fitness = Fitness::all();

            header('Content-Type: application/json');
            return json_encode($fitness);
        } else {
            $fitness = Fitness::find($id);

            header('Content-Type: application/json');
            return json_encode($fitness);
        }
    }
}