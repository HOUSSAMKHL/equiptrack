@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Opération</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

</head>
<body>
    <h1>Ajouter une Opération</h1>
    <form action="{{ route('operations.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom_operation">Nom de l'Opération:</label>
            <input type="text" name="nom_operation" id="nom_operation" value="{{ old('nom_operation') }}" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="{{ route('operations.index') }}">Retour à la liste des opérations</a>
</body>
</html>
@endsection
