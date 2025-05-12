<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Utilisateur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0"><i class="bi bi-person-circle me-2"></i>Détails de l'Utilisateur</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="h6 text-muted mb-3">Informations personnelles</h3>

                            <p><strong class="d-block text-muted small">ID</strong>
                            <span class="fs-5">{{ $utilisateur->id }}</span></p>

                            <p><strong class="d-block text-muted small">Nom</strong>
                            <span class="fs-5">{{ $utilisateur->nom_user }}</span></p>

                            <p><strong class="d-block text-muted small">Âge</strong>
                            <span class="fs-5">{{ $utilisateur->age }}</span></p>

                            <p><strong class="d-block text-muted small">Téléphone</strong>
                            <span class="fs-5">{{ $utilisateur->telephone }}</span></p>

                            <p><strong class="d-block text-muted small">Email</strong>
                            <span class="fs-5">{{ $utilisateur->email }}</span></p>

                            <p><strong class="d-block text-muted small">Adresse</strong>
                            <span class="fs-5">{{ $utilisateur->adresse }}</span></p>

                            <p><strong class="d-block text-muted small">mot de passe</strong>
                            <span class="fs-5">{{ $utilisateur->password }}</span>
                            </p>

                            <p><strong class="d-block text-muted small">Rôle</strong>
                            <span class="fs-5">{{ $utilisateur->role->nom_role }}</span></p>
                        </div>

                        <div class="d-flex justify-content-between border-top pt-4 mt-3">
                            <a href="{{ route('utilisateurs.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                            </a>
                            <div>
                                <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil me-2"></i>Modifier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
