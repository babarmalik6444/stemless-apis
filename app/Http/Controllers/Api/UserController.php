<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    //
    
    public function __construct()
    {
        
    }

    /**
     * @OA\Info(title="Apis", version="0.1")
     */

    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Get list of users",
     *     @OA\Parameter(
     *         name="first_name",
     *         in="query",
     *         description="Status values that need to be considered for filter",
     *         required=false,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="last_name",
     *         in="query",
     *         description="Status values that need to be considered for filter",
     *         required=false,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Status values that need to be considered for filter",
     *         required=false,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="phone",
     *         in="query",
     *         description="Status values that need to be considered for filter",
     *         required=false,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *     @OA\Response(response="200", description="all users"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403,description="Forbidden")
     * )
     */

    public function index(Request $request)
    {
        $this->authorize('create');
        $sortColumn = ($request->sort_column)?$request->sort_column:'id';
        $sortBy = ($request->sort_by)?$request->sort_by:'desc';
        $limit = ($request->page_size)?$request->page_size:'10';

        $users = User::when($request->first_name, function($query)use($request){
            $query->where('first_name', 'like', '%'.$request->first_name.'%');
        })
        ->when($request->last_name, function($query)use($request){
            $query->where('last_name', 'like', '%'.$request->last_name.'%');
        })
        ->when($request->email, function($query)use($request){
            $query->where('email', 'like', '%'.$request->email);
        })
        ->when($request->phone, function($query)use($request){
            $query->where('phone', 'like', '%'.$request->phone);
        })
        ->orderBy($sortColumn, $sortBy)
        ->paginate($limit);
        return new UserResource($users);
    }
}
