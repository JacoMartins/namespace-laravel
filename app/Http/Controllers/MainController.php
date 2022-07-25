<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateData;
use App\Models\Main;
use App\Models\Name;
use App\Models\User;

class MainController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function signup()
  {
    return view('auth.signup');
  }

  public function index()
  {
    $names = Name::orderBy($order ?? 'id', 'asc')->paginate(10);

    if (session('LoggedUser')) {
      $data = User::where('uuid', '=', session('LoggedUser'))->first();

      return view('home', [
        'id' => $data->uuid,
        'username' => $data->username,
        'is_admin' => $data->is_admin,
        'names' => $names,
      ]);
    }

    return view('home', [
      'names' => $names,
    ]);
  }

  public function edit($id) {
    $name = Name::where('id', '=', $id)->first();
    $user = User::where('uuid', '=', session('LoggedUser'))->first();

    if (session('LoggedUser')) {
      if($name->who_posted === $user->username) {
        $data = User::where('uuid', '=', session('LoggedUser'))->first();
  
        return view('admin.edit', [
          'id' => $data->uuid,
          'username' => $data->username,
          'is_admin' => $data->is_admin,
          'name' => $name,
        ]);
      }
    }

    return redirect()
      ->route('index.route')
      ->with('message', "Nome apagado com sucesso.");
  }
}
