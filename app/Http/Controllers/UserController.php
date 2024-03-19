<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user;

    public function __construct(User $users)
    {
        $this->user = $users;
    }

    public function getClientes()
    {
        $response = $this->user->all();
        if ($response == NULL) {
            return response()->json(['erro' => 'usuarios nao encontrados!'], 404);
        }
        return response()->json($response, 200);
    }
}
