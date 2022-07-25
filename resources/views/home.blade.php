<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <title>NameSpace - Início</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Inter, Arial, Helvetica, sans-serif;
    letter-spacing: -0.0625rem;
    background-color: rgba(0, 0, 0, 0.04);
  }

  h1 {
    font-weight: 600;
  }

  h2 {
    font-weight: 600;
  }

  .btn {
    font-family: Inter;
    letter-spacing: -0.0625rem;
  }

  .header {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    left: 0;
    background: #f8f9fa;
    box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);
    width: 100%;
  }

  .header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    width: 1140px;
    max-width: 1140px;
    min-width: 400px;
    padding: 1rem 1.75rem;
  }

  .sub-container {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 0.5rem;
  }

  .sub-container h5 {
    margin: auto;
  }

  .logo {
    font-family: Montserrat, Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 1.5rem;
    color: #2B6CB0;
    margin: 0;
    padding: 0;
  }

  .current-page {
    font-weight: 600;
    color: #3182CE;
  }

  header nav {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  header nav ul {
    display: flex;
    gap: 1rem;
    list-style: none;
    margin: auto;
  }


  a {
    text-decoration: none;
  }

  a:hover {
    text-decoration: none;
  }

  main {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 80px;
    height: 100%;
    width: 100%;
  }

  .main-container {
    display: block;
    width: 1140px;
    max-width: 100%;
    padding: 1rem 1.75rem;
  }

  h1 {
    font-size: 2rem;
  }

  thead {
    font-weight: 600;
  }

  header div button {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
  }

  svg {
    height: 1rem;
    width: 1rem;
  }

  .btn {
    padding: 0.25rem 0.5rem;
  }

  header div button svg {
    height: 1.375rem;
    width: 1.375rem;
    margin: 0;
  }

  .tbl-a {
    margin: 0.15rem 0 0.15rem 0;
  }

  .form-control {
    font-family: Inter, Arial, Helvetica, sans-serif;
    letter-spacing: -0.0625rem;
    margin-bottom: 0.25rem;
  }

  .post-name-container form {
    height: 2.5rem;
    display: flex;
    flex-direction: row;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
  }

  .post-name-container input {
    height: 100%;
    margin: 0;
    padding: 0.5rem 0.5rem;
  }

  .post-name-container button {
    width: 7.5rem;
    padding: 0;
  }

  .table-order-container .find-container form {
    display: flex;
    flex-direction: row;
    max-width: 16rem;
    gap: 0.25rem;
  }

  .table-order-container .find-container form input,
  button {
    margin: 0;
    height: 100%;
    padding: 0.5rem 0.5rem;
  }

  .table-order-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .table-order-container .order-by-container {
    display: flex;
    flex-direction: row;
    gap: 0.25rem;
    justify-content: space-between;
  }

  .tbl-data-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.25rem;
  }

  .paginator-container {
    width: auto;
    margin-bottom: 1rem;
  }

  .paginator-container nav {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }


  .paginator-container nav div:first-child {
    display: flex;
    justify-content: center;
    width: auto;
  }

  .paginator-container nav>div:first-child>a {
    height: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .paginator-container nav>div:first-child>span {
    height: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .paginator-container nav div:last-child {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: auto;
    box-shadow: none;
  }

  .paginator-container nav div:last-child div:last-child span,
  a {
    display: flex;
    height: 2rem;
    justify-content: center;
    align-items: center;
  }

  .paginator-container nav div:last-child p {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 0.25rem;
    min-width: 20rem;
    margin: 0.5rem 0;
  }

  .paginator-container nav div:last-child span {
    display: flex;
    justify-content: center;
    width: auto;
    box-shadow: none;
  }

  @media screen and (max-width: 512px) {
    .table-order-container {
      flex-direction: column;
      gap: 0.5rem;
    }

    .table-order-container div form {
      min-width: 100%;
    }

    .table-order-container div form button,
    input {
      padding: 0.375rem 0.75rem;
    }

    .table-order-container .order-by-container {
      display: flex;
      max-width: 100%;
      gap: 0.25rem;
    }

    .table-order-container .order-by-container form {
      min-width: 0;
      width: 100%;
    }

    .table-order-container .order-by-container form button {
      height: 100%;
      width: 100%;
    }

    .table-order-container .find-container form input[type="text"] {
      width: 100%;
    }

    .tbl-data-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  }
</style>

<body>
  <header class="header">
    <div class="container">
      <h2 class="logo">NameSpace</h2>
      <div class="sub-container">
        <!-- <nav>
          <ul>
            <a>
              <li class="current-page">Início</li>
            </a>
          </ul>
        </nav> -->

        @if(session('LoggedUser'))
        <h5>{{$username}}</h5>
        <button class="btn btn-outline-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </button>

        <a href="{{ route('logout.route') }}">
          <button class="btn btn-outline-danger" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
              <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg>
          </button>
        </a>
        @else

        <a href="{{ route('signup.route') }}">
          <button type="button" class="btn btn-light">Criar uma conta</button>
        </a>

        <a href="{{ route('login.route') }}">
          <button type="button" class="btn btn-primary">Entrar</button>
        </a>

        @endif
      </div>
    </div>
  </header>

  <main>
    <div class="main-container">
      @if (session('message'))
      <p style="color: darkgreen;">{{session('message')}}</p>
      @endif

      <h1>Nomes</h1>

      <div class="table-order-container">
        <div class="find-container">
          <form action="" method="post">
            <input class="form-control" type="text" value="{{ old('search') }}" placeholder="Buscar nome" name="search" />
            <button type="submit" class="btn btn-primary">Procurar</button>
          </form>
        </div>

        <div class="order-by-container">
          <form action="{{ route('names.get', 'id') }}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">Criação</button>
          </form>

          <form action="{{ route('names.get', 'name') }}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">Alfabética</button>
          </form>

          <form action="{{ route('names.get', 'registers') }}" method="get">
            @csrf
            <input type="hidden" value="{{ csrf_token() }}" name="_token" />
            <button type="submit" class="btn btn-secondary">Mais registros</button>
          </form>
        </div>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 50%;">Nome</td>
            <th style="width: 15%;">Criação</td>
            <th style="width: 2%;">Reg</td>
              @if(session('LoggedUser'))
            <th style=" width: 15%;">Ações</td>
              @endif
            <th>Usuário</td>
          </tr>
        </thead>

        <tbody>
          @foreach($names as $name)

          <tr>
            <td>
              <p class="tbl-a">{{ $name->name }}</p>
            </td>
            <td>
              <p class="tbl-a">{{ date_format(date_create($name->created_at), 'd/m/y H:m') }}</p>
            </td>
            <td>
              <p class="tbl-a">{{ $name->registers }}</p>
            </td>
            @if(session('LoggedUser'))
            <td>
              @if($username === $name->who_posted)
              <div class="tbl-data-container">
                <form action="{{ route('names.patch', $name->id) }}" method="post">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                  <input type="hidden" value="PATCH" name="_method" />
                  <button type="submit" class="btn btn-success btn-sm">Registrar</button>
                </form>

                <form action="{{ route('edit.route', $name->id) }}" method="get">
                  <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                </form>

                <form action="{{ route('names.delete', $name->id) }}" method="post">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                  <input type="hidden" value="DELETE" name="_method" />
                  <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                </form>
              </div>
              @endif
            </td>
            @endif
            <td>
              <p class="tbl-a">{{ $name->who_posted }}</p>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

      <div class="paginator-container">{{$names->links()}}</div>

      @if(session('LoggedUser'))

      <div class="post-name-container">
        <form action="{{ route('names.post') }}" method="post">
          <input type="hidden" value="{{ csrf_token() }}" name="_token" />
          <input class="form-control" type="text" value="{{ old('name') }}" placeholder="Postar um nome" name="name" />
          <button type="submit" class="btn btn-primary">Enviar nome</button>
        </form>
      </div>

      @endif
    </div>
  </main>
</body>

</html>