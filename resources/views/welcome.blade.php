<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Équipements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Équipements</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item"><a class="nav-link" href="{{ route('anomalies.index') }}">Anomalies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('ateliers.index') }}">Ateliers</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Catégories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('effectuers.index') }}">Effectuer</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('efps.index') }}">EFPs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('equipements_identifies.index') }}">Équipements Identifiés</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('equipements_tracables.index') }}">Équipements Traçables</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frequences.index') }}">Fréquences</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('intervenants.index') }}">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('operations.index') }}">Opérations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Rôles</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('utilisateurs.index') }}">Utilisateurs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('observations.index') }}">Observations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('complexes.index') }}">Complexes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('efps.index') }}">Établissements</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('direction_regionales.index') }}">Directions Régionales</a></li>

      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h1>Bienvenue dans le système de gestion des équipements</h1>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
