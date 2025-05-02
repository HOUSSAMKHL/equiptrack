<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la Fréquence</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">Détails de la Fréquence</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h3 class="h6 text-muted">ID</h3>
                            <p class="fs-5">{{ $frequence->id }}</p>
                        </div>

                        <div class="mb-3">
                            <h3 class="h6 text-muted">Type de Fréquence</h3>
                            <p class="fs-5">{{ $frequence->type_frequence }}</p>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('frequences.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Retour à la liste
                            </a>
                            <a href="{{ route('frequences.edit', $frequence->id) }}" class="btn btn-primary">
                                <i class="bi bi-pencil"></i> Modifier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>