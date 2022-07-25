<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateNamePost;
use App\Models\Name;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class NameController extends Controller
{
  public function get($order)
  {
    $names = Name::orderBy($order ?? 'id', $order === 'registers' ? 'desc' : 'asc')->paginate(10);

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

  public function search($query){
    $names = Name::contains($query)->get();

    return view('home', [
      'names' => $names,
    ]);
  }

  public function post(ValidateNamePost $request)
  {
    if (session('LoggedUser')) {
      $user = User::where('uuid', '=', session('LoggedUser'))->first();

      Name::create([
        'name' => $request->name,
        'registers' => 0,
        'updated_at' => date_create(now()),
        'who_posted' => $user->username,
      ]);

      return redirect()
        ->route('index.route')
        ->with('message', 'Nome postado com sucesso');
    }

    return redirect()
      ->route('index.route')
      ->with('message', 'Não autenticado.');
  }

  public function put(ValidateNamePost $request, $id)
  {
    if (session('LoggedUser')) {
      $user = User::where('uuid', '=', session('LoggedUser'))->first();
      Name::where('id', '=', $request->id)->first()->update([
        'name' => $request->name,
        'updated_at' => date_create(now()),
      ]);
    }
  }

  public function delete($id)
  {
    if (session('LoggedUser')) {
      $name = Name::where('id', '=', $id)->first();

      if (!$name) {
        return redirect()
          ->route('index.route')
          ->with('message', "Não foi possível apagar nome: Nome não encontrado.");
      }

      $name->delete();

      return redirect()
        ->route('index.route')
        ->with('message', "Nome apagado com sucesso.");
    }

    return redirect()
      ->route('index.route')
      ->with('message', "Não autenticado.");
  }

  public function patch($id)
  {
    if (session('LoggedUser')) {
      $name = Name::where('id', '=', $id)->first();

      if (!$name) {
        return redirect()
          ->route('index.route')
          ->with('message', 'Não foi possível apagar nome: Nome não encontrado.');
      }

      $name->update([
        'registers' => $name->registers + 1
      ]);

      return Redirect::back()
        ->with('message', 'Adicionado no número de registros');
    }

    return redirect()
      ->route('index.route')
      ->with('message', 'Não autenticado.');
  }
};
