<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
class RepertoireController extends Controller
{
    public function show($path = '/')
    {
        $user = Auth::user();
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName ls $path";
        $output = shell_exec($command);
        $contents = ($output !== null) ? explode("\n", trim($output)) : [];

        return view('directory.show', compact('path', 'contents', 'containerName'));
    }

}
