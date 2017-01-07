<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LibrarySaveRequest;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function libraryDetails($id)
    {
        try {
            return Library::where('id', '=', $id)->firstOrFail();
        }  catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function librarySave(LibrarySaveRequest $request)
    {
        //only allows saving a new record
        return Library::create($request->all());
    }

    public function findSmallestLeaf(Request $request)
    {
        $tree = json_decode($request->input('tree', null));

        if (json_last_error() === JSON_ERROR_NONE) {
            return get_smallest_leaf($tree);
        } else {
            abort(400);
        }

    }
}
