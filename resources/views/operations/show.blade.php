<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Opération</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Opération</h1>
    <p><strong>ID:</strong> {{ $operation->id }}</p>
    <p><strong>Nom de l'Opération:</strong> {{ $operation->nom_operation }}</p>
    <a href="{{ route('operations.index') }}">Retour à la liste des opérations</a>
</body>
</html>
