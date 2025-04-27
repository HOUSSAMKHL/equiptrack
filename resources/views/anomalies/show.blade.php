<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'anomalie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Détails de l'anomalie</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Cause de l'anomalie :</strong> {{ $anomalie->cause_anomalie }}</p>
                <p><strong>Action corrective :</strong> {{ $anomalie->action_corrective }}</p>
                <p><strong>Date de signalement :</strong> {{ $anomalie->date_signalement }}</p>
                <p><strong>Date de remise :</strong> {{ $anomalie->date_remise ?? 'Non renseignée' }}</p>
                <p><strong>Durée de la panne :</strong> {{ $anomalie->duree_panne }} heures</p>
                <p><strong>Coût de réparation :</strong> {{ $anomalie->cout_reparation }} MAD</p>
                <p><strong>Résolue :</strong> 
                    @if($anomalie->anomalie_resolue)
                        ✅ Oui
                    @else
                        ❌ Non
                    @endif
                </p>
                <p><strong>Pièces de rechange :</strong> {{ $anomalie->pieces_rechange ?? 'Aucune' }}</p>
                <p><strong>ID de l'utilisateur :</strong> {{ $anomalie->id_user }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('anomalies.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('anomalies.edit', $anomalie->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>

</body>
</html>