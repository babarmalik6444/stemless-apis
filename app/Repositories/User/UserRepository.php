<?php

namespace App\Repositories\User;

use App\Repositories\Interfaces\UnserInterface;
use Illuminate\Http\Request;

class UserRepository implements UnserInterface{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create()
    {

    }

    public function update()
    {
        
    }


}