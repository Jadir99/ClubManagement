
@extends('layout')

@section('content')
    @include('headerAdmin')
    <style>
         .custom-table {
            width:  200%; /* Ajustement de la largeur de la table */
            border-collapse: collapse;
            margin-top: 30px;
            margin-bottom: 30px;
            margin-left: auto; /* Centre la table horizontalement */
            margin-right: auto; /* Centre la table horizontalement */
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-en-cours {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-traite button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Vos autres styles... */
        .table-container {
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
        }

        .header_section {
            margin-bottom: 30px;
        }

        .footer_section {
            margin-top: 30px;
        }

       

    </style>

    <!-- Votre contenu -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                

                <!-- Formulaire d'ajout d'administrateur dans le modal -->
               <!-- Formulaire d'ajout d'administrateur dans le modal -->
               <div class="modal" id="addAdminModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un administrateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulaire pour ajouter un administrateur -->
                            <form>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Tableau pour afficher les administrateurs -->
                <div class="table-container">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>profil</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if ($item->isadmin==1)
                                            Admin
                                        @else
                                            user
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('admin.update',['admin'=>$item->id ])}}">
                                            @csrf
                                            @method('put')
                                                @if ($item->isadmin)
                                                    <button type="submit" class="btn btn-info" >return to user</button>
                                                @else
                                                    <button type="sublit" class="btn btn-info" >return to admin</button>
                                                @endif
                                        </form>
                                        <form action="{{route('admin.destroy',['admin'=>$item->id ])}}" method="post" >
                                            @csrf
                                            @method('delete')
                                            {{-- <div class="dropdown-divider"></div> <button type="button" class="dropdown-item text-danger" onclick="confirmation({{$item->NumReclamation}})">Delete</button>  --}}
                                            <button class="btn btn-danger">Suppr</button>
                                        </form>
                                        {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editAdminModal">Modifier</button>
                                        <button type="button" class="btn btn-danger">Supprimer</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal" id="editAdminModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier un administrateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulaire pour modifier un administrateur -->
                                <form>
                                    <div class="mb-3">
                                        <label for="editNom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="editNom" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPrenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="editPrenom" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="editEmail" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsectionc:\Users\hp\Downloads\front-gestion_reclamation\front-gestion_reclamation\resources\views\headerAdmin.blade.php
