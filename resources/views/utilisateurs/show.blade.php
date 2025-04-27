<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Utilisateur</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Utilisateur</h1>
    <p><strong>ID:</strong> {{ $utilisateur->id }}</p>
    <p><strong>Nom de l'utilisateur:</strong> {{ $utilisateur->nom_user }}</p>
    <p><strong>Âge:</strong> {{ $utilisateur->age }}</p>
    <p><strong>Téléphone:</strong> {{ $utilisateur->telephone }}</p>
    <p><strong>Email:</strong> {{ $utilisateur->email }}</p>
    <p><strong>Adresse:</strong> {{ $utilisateur->adresse }}</p>
    <p><strong>Rôle:</strong> {{ $utilisateur->role->nom_role }}</p>
    <a href="{{ route('utilisateurs.index') }}">Retour à la liste des utilisateurs</a>
</body>
</html>
