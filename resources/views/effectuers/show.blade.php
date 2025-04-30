<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'opération effectuée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'opération effectuée</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID :</strong> {{ $effectuer->id }}</p>
                        <p><strong>Utilisateur :</strong> {{ optional($effectuer->utilisateur)->nom_user ?? 'Utilisateur inconnu' }}</p>
                        <p><strong>Exemplaire :</strong> {{ optional($effectuer->equipementTracable->equipementIdentifie)->nom_equipement ?? 'Exemplaire inconnu' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Opération :</strong> {{ optional($effectuer->operation)->nom_operation ?? 'Opération inconnue' }}</p>
                        <p><strong>Date de l'opération :</strong> {{ \Carbon\Carbon::parse($effectuer->date_operation)->format('d/m/Y H:i') }}</p>
                        <p><strong>Durée :</strong> {{ $effectuer->durée }} minutes</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('effectuers.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('effectuers.edit', $effectuer->id) }}" class="btn btn-primary">Modifier</a>

        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>