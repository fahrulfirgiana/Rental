<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="{{ asset('Asset/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
  <p></p>
  <br>
  <br>
  <br>
  <br>
  <div class="w-50 center rounded px-3 py-3 mx-auto">
    @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
              @endif
  </div>
  <div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Login</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/sesi/login" method="POST">
      {{-- // csrf untuk menyiapkan inputan hidden dan nanti isinya adalah token sehingga
      // kita bisa memastikan proses posting data diambil dari form yang kita miliki --}}
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" value="{{Session::get('email')}}" name="email" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3 d-grid">
      <button name="submit" type="submit" class="btn btn-primary">Login</button>
      <a class="btn btn-primary" href="sesi/register"> Register</a>
    </div>
  </form>
  </div>

</body>
</html>
    