<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'Équipement Traçable</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'Équipement Traçable</h1>

        <div class="card shadow-sm mb-4">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-3"><strong>ID:</strong> {{ $equipementTracable->id }}</p>
                        <p class="mb-3"><strong>Statut:</strong> 
                            <span class="badge bg-{{ $equipementTracable->statut === 'actif' ? 'success' : 'warning' }}">
                                {{ $equipementTracable->statut }}
                            </span>
                        </p>
                        <p class="mb-3"><strong>Référence:</strong> {{ $equipementTracable->reference ?? 'Non renseignée' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Année d'acquisition:</strong> {{ $equipementTracable->annee_dacquisition ?? 'Non renseignée' }}</p>
                        <p class="mb-3"><strong>Valeur d'acquisition:</strong> 
                            {{ $equipementTracable->valeur_dacquisition ? number_format($equipementTracable->valeur_dacquisition, 2, ',', ' ') . ' MAD' : 'Non renseignée' }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Atelier:</strong> 
                            @if($equipementTracable->atelier)
                                {{ $equipementTracable->atelier->numero_atelier }}
                            @else
                                <span class="text-muted">Aucun atelier associé</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Équipement Identifié:</strong> 
                            @if($equipementTracable->equipementIdentifie)
                                {{ $equipementTracable->equipementIdentifie->nom_equipement }}
                            @else
                                <span class="text-muted">Aucun équipement identifié associé</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('equipements_tracables.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Retour à la liste
            </a>
            <a href="{{ route('equipements_tracables.edit', $equipementTracable->id) }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Modifier
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>