<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la catégorie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @extends('layouts.app')
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de la catégorie</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>ID :</strong> {{ $categorie->id }}</p>
                <p><strong>Nom de la catégorie :</strong> {{ $categorie->nom_categorie }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>