<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Équipement Tracable</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Équipement Tracable</h1>

    <p><strong>ID:</strong> {{ $equipementTracable->id }}</p>
    <p><strong>Statut:</strong> {{ $equipementTracable->statut }}</p>
    <p><strong>Référence:</strong> {{ $equipementTracable->reference }}</p>
    <p><strong>Année d'acquisition:</strong> {{ $equipementTracable->annee_dacquisition }}</p>
    <p><strong>Valeur d'acquisition:</strong> {{ $equipementTracable->valeur_dacquisition }}</p>
    <p><strong>Atelier:</strong> {{ $equipementTracable->atelier->nom_atelier }}</p>
    <p><strong>Équipement Identifié:</strong> {{ $equipementTracable->equipement->nom_equipement }}</p>

    <a href="{{ route('equipements_tracables.index') }}">Retour à la liste</a>
</body>
</html>
