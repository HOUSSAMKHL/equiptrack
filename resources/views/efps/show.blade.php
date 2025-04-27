<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'EFP</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'EFP</h1>
    <p><strong>ID :</strong> {{ $efp->id }}</p>
    <p><strong>Nom de l'établissement :</strong> {{ $efp->nom_etablissement }}</p>
    <p><strong>Adresse :</strong> {{ $efp->adresse }}</p>
    <p><strong>Numéro :</strong> {{ $efp->numero }}</p>
    <p><strong>Email :</strong> {{ $efp->email }}</p>
    <p><strong>Complexe :</strong> {{ $efp->complexe->nom_complexe }}</p>
    <a href="{{ route('efps.index') }}">Retour à la liste des EFPs</a>
</body>
</html>
