<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Anomalies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Liste des Anomalies</h1>

        <a href="{{ route('anomalies.create') }}" class="btn btn-success mb-3">Ajouter une anomalie</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cause de l'anomalie</th>
                    <th scope="col">Action corrective</th>
                    <th scope="col">Date de signalement</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anomalies as $anomalie)
                    <tr>
                        <td>{{ $anomalie->cause_anomalie }}</td>
                        <td>{{ $anomalie->action_corrective }}</td>
                        <td>{{ $anomalie->date_signalement }}</td>
                        <td>
                            <a href="{{ route('anomalies.show', $anomalie->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('anomalies.edit', $anomalie->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('anomalies.destroy', $anomalie->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
