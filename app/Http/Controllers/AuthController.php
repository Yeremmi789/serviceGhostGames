<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    //

    public function pruebas(){

        return response()->json(
            "Hola mundo"
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }


    public function registrarse(Request $request) // antes como signUp
    {

        try{

            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string',
                'apellido' => 'required|string', // Asegúrate de validar también el apellido
                'usuario' => 'required|string',
            ]);


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'apellido' => $request->apellido,
                "usuario" => $request->usuario,
                "rol_id" => 2,
                "activo" => 1,
                "ultimo_acceso" => Carbon::now(),
            ]);

            return response()->json([
                'message' => 'Usuario creado exitosamente :D!',
                'user' => $user, // Incluir el usuario creado en la respuesta
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }



        // $token = $user->createToken('auth_token')->plainTextToken;
        // return response()->json([
        //     // 'access_token' => $token,
        //     'access_token' => $token->accessToken,
        //     'token_type' => 'Bearer',

        // ]);


    }


}
