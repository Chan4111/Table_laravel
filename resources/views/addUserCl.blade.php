<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Add New User form Apply the closure Rule validation</h1>
                <!-- @if ($errors -> any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif -->
                <form action="{{ route('addUserCl') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="{{ old('username') }}"
                            class="form-control @error('username') is-invalid @enderror" name="username">
                        <span class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="{{ old('useremail') }}"
                            class="form-control @error('useremail') is-invalid @enderror" name="useremail">
                        <span class="text-danger">
                            @error('useremail')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>