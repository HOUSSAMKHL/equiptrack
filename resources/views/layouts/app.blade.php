<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Équipements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #1A1F2C;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 260px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-white text-center">Equip-Track</h3>
    <a href="{{ route('anomalies.index') }}">Anomalies</a>
    <a href="{{ route('ateliers.index') }}">Ateliers</a>
    <a href="{{ route('categories.index') }}">Catégories</a>
    <a href="{{ route('effectuers.index') }}">Effectuer</a>
    <a href="{{ route('efps.index') }}">EFPs</a>
    <a href="{{ route('equipements_identifies.index') }}">Équipements Identifiés</a>
    <a href="{{ route('equipements_tracables.index') }}">Équipements Traçables</a>
    <a href="{{ route('frequences.index') }}">Fréquences</a>
    <a href="{{ route('intervenants.index') }}">Intervenants</a>
    <a href="{{ route('operations.index') }}">Opérations</a>
    <a href="{{ route('roles.index') }}">Rôles</a>
    <a href="{{ route('utilisateurs.index') }}">Utilisateurs</a>
    <a href="{{ route('observations.index') }}">Observations</a>
    <a href="{{ route('complexes.index') }}">Complexes</a>
    <a href="{{ route('direction_regionales.index') }}">Directions Régionales</a>
</div>

<!-- Contenu principal -->
<div class="content container mt-4">
    @yield('content')  <!-- Ceci permettra d'injecter le contenu spécifique de chaque page -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
