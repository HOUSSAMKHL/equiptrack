<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'EFP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'EFP</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID :</strong> {{ $Efp->id }}</p>
                        <p><strong>Nom de l'établissement :</strong> {{ $Efp->nom_etablissement }}</p>
                        <p><strong>Adresse :</strong> {{ $Efp->adresse }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Numéro :</strong> {{ $Efp->numero }}</p>
                        <p><strong>Email :</strong> {{ $Efp->email }}</p>
                        <p><strong>Complexe :</strong> 
                            @if($Efp->complexe)
                                {{ $Efp->complexe->nom_complexe }}
                            @else
                                Aucun complexe associé
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('efps.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('efps.edit', $Efp->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>