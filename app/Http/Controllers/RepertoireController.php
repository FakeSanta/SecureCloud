<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
class RepertoireController extends Controller
{
    public function show($directory)
    {
        $user = Auth::user();
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName ls /$directory";
        exec($command, $directories, $returnVar);
        return view('directory.show', compact('directory', 'files'));
    }
}
