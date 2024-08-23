<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    //

    public function new_juego(Request $re)
    {

        $re->validate([
            'portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $newJuego = new Games();
        $path = $re->file('portada')->store('images', 'public');
        $newJuego->name = $re->name_juego;
        $newJuego->activo = $re->activo;
        $newJuego->precio = $re->precio;
        $newJuego->portada = $path;
        $newJuego->plataforma = $re->plataforma;
        $newJuego->categoria_id = $re->id_categoria;
        $newJuego->lanzamiento = $re->lanzamiento;
        $newJuego->save();
        $retorno = [
            'mensaje: ' => 'Juego registrado correctamente',
            'juego: ' => $newJuego
        ];
        return response()->json($retorno);
    }

    public function gameList(){
        $games = Games::all();

        $retorno = $games->map(function ($juego) {
            return[
                "ID: " => $juego->id,
                "Nombre: " => $juego->name,
                "Categoria: " => $juego->categoria_id,
                "Precio: " => $juego->precio,
                "Plataforma" => $juego->plataforma,
                "Lanzamiento" => $juego->lanzamiento,
                "Activo: " => $juego->activo,
                "Portada: " => asset('storage/' . $juego->portada) // Genera la URL completa de la portada
            ];
        });
        return response()->json($retorno);
    }

}
