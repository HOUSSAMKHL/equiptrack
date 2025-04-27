<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rôle</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Ajouter un Rôle</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom_role">Nom du Rôle:</label>
            <input type="text" name="nom_role" id="nom_role" value="{{ old('nom_role') }}" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="{{ route('roles.index') }}">Retour à la liste des rôles</a>
</body>
</html>
