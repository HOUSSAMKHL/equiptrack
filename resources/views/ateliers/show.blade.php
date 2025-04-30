<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'atelier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'atelier</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Numéro de l'atelier :</strong> {{ $atelier->numero_atelier }}</p>
                <p><strong>Établissement :</strong> 
                    @if($atelier->efp)
                        {{ $atelier->efp->nom_etablissement }}
                    @else
                        Aucun établissement associé
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('ateliers.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('ateliers.edit', $atelier->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>