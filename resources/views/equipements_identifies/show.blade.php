<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Équipement Identifié</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Équipement Identifié</h1>
    <p><strong>ID :</strong> {{ $equipement->id }}</p>
    <p><strong>Nom de l'équipement :</strong> {{ $equipement->nom_equipement }}</p>
    <p><strong>Secteur :</strong> {{ $equipement->secteur }}</p>
    <p><strong>Catégorie :</strong> {{ $equipement->categorie->nom_categorie }}</p>
    <p><strong>Fréquence :</strong> {{ $equipement->frequence->nom_frequence }}</p>
    <a href="{{ route('equipementIdentifies.index') }}">Retour à la liste des équipements</a>
</body>
</html>
