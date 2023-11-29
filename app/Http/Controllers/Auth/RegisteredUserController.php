<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image_docker' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_docker' => $request->image_docker,
        ]);

        event(new Registered($user));

        Auth::login($user);

        /*Artisan::call('docker:create-container', [
            'email' => $request->email,
        ]);*/

        $email = $request->email;
        $image = $request->image_docker;
        $email_wo_at = str_replace("@", "", $email);
        $command = "docker run -d --name $email_wo_at $image";
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            echo "Conteneur Docker démarré avec succès!";
        } else {
            echo "Erreur lors du démarrage du conteneur Docker.";
            // Gérer les erreurs ici...
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
