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

  .logo {
    font-family: Montserrat, Arial, Helvetica, sans-serif;
    font-weight: 600;
    font-size: 1.5rem;
    margin: 0;
    padding: 0;
    color: #2B6CB0;
  }

  main {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    height: 100vh;
  }

  .btn {
    font-family: Inter, Arial, Helvetica, sans-serif;
    letter-spacing: -0.0625rem;
  }

  .card form {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    padding: 1rem;
    border-radius: 0.5rem;
    box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.15);
  }

  .form-control {
    font-family: Inter, Arial, Helvetica, sans-serif;
    letter-spacing: -0.0625rem;
    margin-bottom: 0.25rem;
  }

  form .btn {
    margin-top: 0.25rem;
  }

  p {
    margin: 0rem;
  }

  /* input+p {} */
</style>

<body>
  <main>
    <h1 class="logo">NameSpace</h1>
    <h5>Cadastrar-se</h5>
    <div class="card">
      <form action="{{ route('create.route') }}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
        <p>Nome de usuário</p>
        <input type="text" class="form-control" placeholder="Nome de usuário" name="username" value="{{ old('username') }}" />
        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
        
        <p>Email</p>
        <input type="email" class="form-control" placeholder="Endereço de email" name="email" value="{{ old('email') }}" />
        <span class="text-danger">@error('email'){{ $message }} @enderror</span>

        <p>Senha</p>
        <input type="password" class="form-control" placeholder="Senha" name="password" value="{{ old('password') }}" />
        <input type="password" class="form-control" placeholder="Confirmar senha" name="password_confirmation" value="{{ old('password_confirmation') }}" />
        <span class="text-danger">@error('password'){{ $message }} @enderror</span>

        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>

    <p>Já tem uma conta? <a href="{{route('login.route')}}">Fazer login.</a></p>
  </main>
</body>

</html>