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
        $path = $request->input('path');
        $exist = false;
        $user = Auth::user();
        $pathAbsolute = $path . $name;
        // Exécutez votre commande Docker ici
        $containerName = str_replace("@", "", $user->email);
        $filesFolder = "docker exec $containerName ls -F $path 2>&1";
        $outputFiles = shell_exec($filesFolder);
        $contents = explode("\n", trim($outputFiles));

        foreach($contents as $content){
            if($content == $name){
                $exist = true;
            }
        }
        if(!$exist){
            $command = "docker exec $containerName touch $pathAbsolute";
            $output = shell_exec($command);
            
            // Vous pouvez retourner une réponse JSON
            return response()->json(['message' => $path]);
        }else{
            return response()->json(['message' => 'Ce fichier existe déjà dans ce repertoire']);
        }
    }

    public function createFolder(Request $request)
    {
        $name = $request->input('name');
        // Assurez-vous de valider et échapper les données d'entrée avant de les utiliser dans la commande Docker
        $path = $request->input('path');
        $exist = false;
        $user = Auth::user();
        $pathAbsolute = $path . $name;

        // Exécutez votre commande Docker ici
        $containerName = str_replace("@", "", $user->email);
        $folders = "docker exec $containerName ls -F $path 2>&1";
        $outputFolders = shell_exec($folders);
        $contents = explode("\n", rtrim(trim($outputFolders), '/'));

        foreach($contents as $content){
            if($content == $name){
                $exist = true;
            }
        }
        if(!$exist){
            $command = "docker exec $containerName mkdir $pathAbsolute";
            $output = shell_exec($command);
    
            // Vous pouvez retourner une réponse JSON
            return response()->json(['message' => 'Dossier créé avec succès']);
        }else{
            return response()->json(['message' => 'Dossier déjà existant dans le repertoire']);
        }

    }

    public function deleteFile(Request $request){
        $name = $request->input('id');
        $path = $request->input('path');
        $user = Auth::user();
        $pathAbsolute = $path . $name;
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName rm $pathAbsolute";
        $output = shell_exec($command);

        // Vous pouvez retourner une réponse JSON
        return response()->json(['message' => 'Fichier supprimé']);
    }

    public function editFile($path, $name){

        return view('directory.edit', compact('path', 'name'));
    }
}
