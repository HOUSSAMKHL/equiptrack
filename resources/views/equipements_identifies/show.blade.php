<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'Équipement Identifié</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'Équipement Identifié</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-3"><strong>ID :</strong> {{ $equipementIdentifie->id }}</p>
                        <p class="mb-3"><strong>Nom de l'équipement :</strong> {{ $equipementIdentifie->nom_equipement }}</p>
                        <p class="mb-3"><strong>Secteur :</strong> {{ $equipementIdentifie->secteur ?? 'Non spécifié' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Catégorie :</strong> 
                            {{ $equipementIdentifie->categorie->nom_categorie ?? 'Aucune catégorie associée' }}
                        </p>
                        <p class="mb-3"><strong>Fréquence :</strong> 
                            {{ $equipementIdentifie->frequence->type_frequence ?? 'Aucune fréquence définie' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('equipements_identifies.index') }}" class="btn btn-secondary me-2">
                Retour à la liste
            </a>
            <a href="{{ route('equipements_identifies.edit', $equipementIdentifie->id) }}" class="btn btn-primary">
                Modifier
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>