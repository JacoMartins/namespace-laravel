<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateNamePost;
use App\Http\Requests\ValidateSearch;
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

  public function search(ValidateSearch $request)
  {
    $names = Name::where('name', 'ilike', "%$request->search%")->paginate(10);

    if (session('LoggedUser')) {
      $user = User::where('uuid', '=', session('LoggedUser'))->first();

      return view('home', [
        'username' => $user->username,
        'is_admin' => $user->is_admin,
        'names' => $names,
      ]);
    }

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
    $name = Name::where('id', '=', $id)->first();

    if (session('LoggedUser')) {
      $user = User::where('uuid', '=', session('LoggedUser'))->first();
      if ($name->who_posted === $user->username) {
        $name->update([
          'name' => $request->name,
          'registers' => 0,
          'updated_at' => date_create(now()),
        ]);

        return redirect()
          ->route('index.route')
          ->with('message', 'Nome editado com sucesso.');
      }

      return redirect()
        ->route('index.route')
        ->with('message', 'Não autorizado.');
    }

    return redirect()
      ->route('index.route')
      ->with('message', 'Não autenticado.');
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
          ->with('message', 'Não foi possível adicionar aos registros: Nome não encontrado.');
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
