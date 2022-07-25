<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAccountCreation;
use App\Http\Requests\ValidateData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
  public function auth(ValidateData $request) {
    $user = User::where('username', '=', $request->identifier)
      ->orWhere('email', '=', $request->identifier)
      ->first();

    if(!$user) {
      return back()->with('message', 'User not found.');
    }

    if(Hash::check($request->password, $user->password)){
      $request->session()->put('LoggedUser', $user->uuid);
      return redirect()
        ->route('index.route');
    } else {
      return back()->with('message', 'Wrong password.');
    }

    return $user;
  }

  // Criar novo usuário

  public function create(ValidateAccountCreation $request) {
    User::create([
      'username' => $request->username,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'is_admin' => false
    ]);

    return redirect()
      ->route('index.route')
      ->with('message', 'Usuário criado com sucesso');
  }

  // Logout

  public function logout() {
    if(session()->has('LoggedUser')){
      session()->pull('LoggedUser');
      return redirect()
        ->route('index.route');
    }
  }
}