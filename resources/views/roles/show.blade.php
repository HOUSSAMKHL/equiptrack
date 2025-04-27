<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Rôle</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails du Rôle</h1>
    <p><strong>ID:</strong> {{ $role->id }}</p>
    <p><strong>Nom du Rôle:</strong> {{ $role->nom_role }}</p>
    <a href="{{ route('roles.index') }}">Retour à la liste des rôles</a>
</body>
</html>
