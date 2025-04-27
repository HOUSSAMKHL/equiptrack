<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Rôle</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Modifier le Rôle</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nom_role">Nom du Rôle:</label>
            <input type="text" name="nom_role" id="nom_role" value="{{ old('nom_role', $role->nom_role) }}" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('roles.index') }}">Retour à la liste des rôles</a>
</body>
</html>
