<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function details($id)
    {
        try {
            return Library::where('id', '=', $id)->firstOrFail();
        }  catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function update()
    {
        //@todo
    }
}
