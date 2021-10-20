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

    public function index(Request $request)
    {
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
