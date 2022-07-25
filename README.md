### Projeto Semana 2 - NameSpace.

- Projeto onde aprofundei meus conhecimentos em laravel e docker.

- CRUD, Docker, Eloquent ORM.

## Utilizei o VS Code.

- Versão PHP: 8.1.8
- Laravel: 8
- Docker 20.10.17
- Docker-compose 1.29.2
- No banco de dados usei Postgresql versão 14.4
- Para visualização do banco de dados utilizei o DBeaver.

## Criando o projeto

- Primeiramente criei o projeto laravel usando o composer.

```console
composer create-project laravel/laravel="8.*" projeto_semana02
```

- Logo após configurei os containers no arquivo docker-compose.yml e utilizando o docker-compose, crei 2 containers: um para o app e um para o banco de dados.

Ligando os containers:
```console
sudo docker-compose up -d
```

- Depois sincronizei com o app usando as a variáveis de ambiente, e iniciei a aplicação.

```console
sudo docker exec -it app bash

# php artisan serve --host 0.0.0.0:8000
```

## Migrations

- Iniciei fazendo as migrations das tables usuários e nomes.

- Depois disso, iniciei o sistema de autenticação.

## Autenticação e Contas

![Autenticação](https://i.imgur.com/AlWEC7k.png)

- Para a autenticação, fiz um controller para os usuários, utilizando as funções create (para criar um novo usuário no banco) e where (para buscar um usuário já existente).

- O sistema de autenticação evita que usuários não autenticados façam posts de nomes.

- Qualquer um pode se cadastrar e fazer o upload de nomes.

```php
// Autenticação

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
```

## Views

- Fiz uma tela inicial com uma tabela mostrando os nomes, que posteriormente será usada para utilizar as funções paginate e orderBy.

- Utilizei bootstrap e CSS puro para a estilização.

![View de nomes](https://i.imgur.com/6ghHBiY.png)

## Nomes

- Para os nomes, utilizei as funções get, paginate, orderBy e where.

- Utilizei o paginate para separar em páginas de 10 nomes, orderBy para organizar os nomes de diferentes maneiras (Alfabética, Maior número de registros ou por ordem de criação).

- Where para puxar os dados utilizando parâmetros específicos, com a ajuda dos operadores ('=', 'like', 'ilike' e etc).

Exemplos:

```PHP
Name::where('id', '=', $id)->first();
Name::orderBy('coluna', 'ordem')->paginate(10);
```

### Rotas

- Fiz as rotas de criação, visualização, edição e exclusão de nomes, funcionando mais ou menos assim:

```php
POST localhost:8000/names // -> Postar nome
PATCH localhost:8000/names/{id} // -> Adicionar +1 Registro
PUT localhost:8000/names/{id} // -> Editar nome
GET localhost:8000/names // -> Visualizar nomes
GET localhost:8000/names/{order} // -> Visualizar nomes com ordem modificada

```

### Na tela

- Para renderizar os nomes usei o foreach do php em uma tabela e com o paginate, pude separar em páginas de 10 itens.

```php
@foreach($names as $name)
  <tr>
  </tr>...
@endforeach
```

Resultado:
![Lista com Paginação](https://i.imgur.com/UD4lW04.png)

- Também fiz os nomes da lista verificarem se há alguma sessão de usuário, caso haja, mostrar as ações que o usuário pode exercer sobre os nomes que ele postou.

![Ações do usuário](https://i.imgur.com/mhKjgZA.png)

```php
@if(session('LoggedUser'))
  @if($username === $name->who_posted)
  <button>ação1...
  @endif
@endif
```

## Considerações finais

- Foi um ótimo projeto para o meu aprendizado em php e laravel.

- Sinto que estou começando a me habituar com a linguagem.

- Aprendi a usar docker (especialmente docker-compose).

- A todos que estão me acompanhando, agradeço!