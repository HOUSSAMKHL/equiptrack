<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Atelier</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Détails de l'Atelier</h1>
    <p><strong>Numéro de l'atelier :</strong> {{ $atelier->numero_atelier }}</p>
    <p><strong>Établissement :</strong> 
        @if($atelier->efp)
            {{ $atelier->efp->nom_etablissement }}
        @else
            Aucun établissement associé
        @endif
    </p>
    <a href="{{ route('ateliers.index') }}">Retour à la liste des ateliers</a>
</body>
</html>
