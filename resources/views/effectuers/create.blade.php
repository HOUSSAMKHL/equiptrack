@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Ajouter une opération effectuée</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('effectuers.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="id_user" class="form-label">Utilisateur :</label>
                    <select name="id_user" id="id_user" class="form-select" required>
                        @foreach($utilisateurs as $utilisateur)
                            <option value="{{ $utilisateur->id }}">{{ $utilisateur->nom_user }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="id_exemplaire" class="form-label">Exemplaire :</label>
                    <select name="id_exemplaire" id="id_exemplaire" class="form-select" required>
                        @foreach($equipementsTracables as $equipement)
                            <option value="{{ $equipement->id }}">
                                {{ $equipement->equipementIdentifie->nom_equipement ?? 'Nom non disponible' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="id_operation" class="form-label">Opération :</label>
                    <select name="id_operation" id="id_operation" class="form-select" required>
                        @foreach($operations as $operation)
                            <option value="{{ $operation->id }}">{{ $operation->nom_operation }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="date_operation" class="form-label">Date de l'opération :</label>
                    <input type="datetime-local" name="date_operation" id="date_operation" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="durée" class="form-label">Durée (HH:MM:SS) :</label>
                    <input type="time" name="durée" id="durée" class="form-control" step="1" required>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('effectuers.index') }}" class="btn btn-secondary me-md-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection