<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DockerController extends Controller
{
    public function createFile(Request $request)
    {
        $name = $request->input('name');
        // Assurez-vous de valider et échapper les données d'entrée avant de les utiliser dans la commande Docker

        $user = Auth::user();

        // Exécutez votre commande Docker ici
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName touch $name";
        $output = shell_exec($command);

        // Vous pouvez retourner une réponse JSON
        return response()->json(['message' => 'Fichier créé avec succès']);
    }

    public function createFolder(Request $request)
    {
        $name = $request->input('name');
        // Assurez-vous de valider et échapper les données d'entrée avant de les utiliser dans la commande Docker

        $user = Auth::user();

        // Exécutez votre commande Docker ici
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName mkdir $name";
        $output = shell_exec($command);

        // Vous pouvez retourner une réponse JSON
        return response()->json(['message' => 'Dossier créé avec succès']);
    }
}
