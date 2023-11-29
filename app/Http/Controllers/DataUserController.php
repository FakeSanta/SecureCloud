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
        $email = $user->email;
        $containerName = str_replace("@", "", $email);
        $files = scandir("docker exec $containerName ls /usr");
        return View::make('usr.index', compact('files'));
    }
}
