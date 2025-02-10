<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Dashboard Page</h1>
    <h2>Welcome, {{ Auth::user()->name }}</h2><br>

    <div class="row">
        <div class="col-6 mx-auto">
            <a href="{{ route('inner') }}" class="btn btn-info">Go to Inner Page</a>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <h2>Users List</h2>
            <table class="table" border="3px">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                </table>

                        <div class="row">
                            <div class="col">
                                {{ $users->links() }}
                            </div>
                        </div>

    </div>
</body>
</html>
