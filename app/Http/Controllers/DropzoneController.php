<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DropzoneController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json([
            'imagen' => $nombreImagen
        ]);
    }

    public function delete()
    {
        $imagenes = glob(public_path('uploads') . '/*');
        $imagenesBaseDatos = Torneo::pluck('imagen')->toArray();

        foreach ($imagenes as $imagen) {
            if (!in_array(basename($imagen), $imagenesBaseDatos)) {
                unlink($imagen);
            }
        }

        return response()->json(['mensaje' => 'Imagenes eliminadas']);
    }
}
