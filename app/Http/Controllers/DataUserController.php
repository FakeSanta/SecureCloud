<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class DataUserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $containerName = str_replace("@", "", $user->email);
        $command = "docker exec $containerName ls /usr";
        exec($command, $directories, $returnVar);

        //$files = scandir("/usr");
        return View::make('usr.index', compact('directories'));
    }
}
