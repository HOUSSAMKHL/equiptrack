<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Anomalies</title>
    @extends('layouts.app')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        a.btn,
        button.btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn.success {
            background-color: #28a745;
            color: white;
            border-radius: 9px;
        }

        .btn.info {
            background-color: #17a2b8;
            color: white;
        }

        .btn.warning {
            background-color: #ffc107;
            color: black;
        }

        .btn.danger {
            background-color: #dc3545;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #e9ecef;
        }

        table td:nth-child(1),
        table td:nth-child(2),
        table td:nth-child(3),
        table td:nth-child(4),
        table td:nth-child(5),
        table td:nth-child(6),
        table td:nth-child(7) {
            width: 12%;
        }

        table td:last-child {
            width: 20%;
        }

        td.actions {
            white-space: nowrap;
        }

        td.actions a.btn,
        td.actions form.inline-form {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        td.actions form.inline-form {
            margin: 0;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <h1>Liste des Anomalies</h1>

    <a href="{{ route('anomalies.create') }}" class="btn success">Ajouter une anomalie</a>

    <table>
        <thead>
        <tr>
            <th>Cause de l'anomalie</th>
            <th>Action corrective</th>
            <th>Date de signalement</th>
            <th>Date de remise</th>
            <th>Durée de panne</th>
            <th>Coût de réparation</th>
            <th>Anomalie résolue</th>
            <th>Piéces rechange</th>
            <th>Responsable</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($anomalies as $anomalie)
            <tr>
                <td>{{ $anomalie->cause_anomalie }}</td>
                <td>{{ $anomalie->action_corrective }}</td>
                <td>{{ \Carbon\Carbon::parse($anomalie->date_signalement)->format('d/m/Y H:i') }}</td>
                <td>{{ $anomalie->date_remise ? \Carbon\Carbon::parse($anomalie->date_remise)->format('d/m/Y H:i') : 'Non définie' }}</td>
                <td>{{ $anomalie->duree_panne }} heures</td>
                <td>{{ number_format($anomalie->cout_reparation, 2, ',', ' ') }} MAD</td>
                <td>{{ $anomalie->anomalie_resolue ? 'Oui' : 'Non' }}</td>
                <td>{{ $anomalie->pieces_rechange }}</td>
                <td>{{ $anomalie->utilisateur->nom_user ?? 'Inconnu' }}</td>
                <td class="actions">
                    <a href="{{ route('anomalies.show', $anomalie->id) }}" class="btn info">Voir</a>
                    <a href="{{ route('anomalies.edit', $anomalie) }}" class="btn warning">Modifier</a>
                    <form action="{{ route('anomalies.destroy', $anomalie) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
