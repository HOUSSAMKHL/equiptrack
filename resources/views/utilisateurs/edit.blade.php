@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h1>Modifier l'Utilisateur</h1>
    <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom_user">Nom de l'utilisateur:</label>
            <input type="text" name="nom_user" id="nom_user" value="{{ old('nom_user', $utilisateur->nom_user) }}" required>
            @error('nom_user')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="age">Âge:</label>
            <input type="number" name="age" id="age" value="{{ old('age', $utilisateur->age) }}" required>
            @error('age')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $utilisateur->telephone) }}" required>
            @error('telephone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $utilisateur->email) }}" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $utilisateur->adresse) }}" required>
            @error('adresse')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" value="">
            <small>Laissez vide pour ne pas changer le mot de passe</small>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="id_roles">Rôle:</label>
            <select name="id_roles" id="id_roles" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $utilisateur->id_roles == $role->id ? 'selected' : '' }}>
                        {{ $role->nom_role }}
                    </option>
                @endforeach
            </select>
            @error('id_roles')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('utilisateurs.index') }}">Retour à la liste des utilisateurs</a>
</body>
</html>
@endsection
