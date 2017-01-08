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
    /**
     * Fetch the details of a library provided by its identifier
     *
     * @param integer $id The unique identifier of a library
     * @return JSON object|404 not found response
     */
    public function libraryDetails($id)
    {
        try {
            return Library::where('id', '=', $id)->firstOrFail();
        }  catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Creates a new library
     *
     * @param LibrarySaveRequest $request
     * @return JSON object
     */
    public function librarySave(LibrarySaveRequest $request)
    {
        //only allows saving a new record
        return Library::create($request->all());
    }

    /**
     * Parses a binary tree and returns the smallest value of the leaf
     *
     * @param Request $request
     * @return integer
     */
    public function findSmallestLeaf(Request $request)
    {
        $tree = json_decode($request->input('tree', null));

        if (json_last_error() === JSON_ERROR_NONE && is_object($tree)) {
            return get_smallest_leaf($tree);
        } else {
            abort(400);
        }

    }
}
