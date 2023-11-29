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
        $path = urldecode($path);
        $user = Auth::user();
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName ls -F $path 2>&1";
        $output = shell_exec($command);
        $contents = explode("\n", trim($output));
        return view('directory.show', compact('path', 'contents', 'containerName'));
    }

}
