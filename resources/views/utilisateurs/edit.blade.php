<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Utilisateur</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier l'Utilisateur</h1>
    <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nom_user">Nom de l'utilisateur:</label>
            <input type="text" name="nom_user" id="nom_user" value="{{ old('nom_user', $utilisateur->nom_user) }}" required>
        </div>
        <div>
            <label for="age">Âge:</label>
            <input type="number" name="age" id="age" value="{{ old('age', $utilisateur->age) }}" required>
        </div>
        <div>
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $utilisateur->telephone) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $utilisateur->email) }}" required>
        </div>
        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $utilisateur->adresse) }}" required>
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
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('utilisateurs.index') }}">Retour à la liste des utilisateurs</a>
</body>
</html>
