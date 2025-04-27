<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Fréquence</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de la Fréquence</h1>
    <p><strong>ID:</strong> {{ $frequence->id }}</p>
    <p><strong>Type de Fréquence:</strong> {{ $frequence->type_frequence }}</p>
    <a href="{{ route('frequences.index') }}">Retour à la liste des fréquences</a>
</body>
</html>
