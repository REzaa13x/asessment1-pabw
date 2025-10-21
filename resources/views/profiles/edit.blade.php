<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Edit Profil</h3>
        <form action="{{ route('profiles.update', $profile['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $profile['name'] }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $profile['email'] }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Umur</label>
                <input type="number" name="age" class="form-control" value="{{ $profile['age'] }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('profiles.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>