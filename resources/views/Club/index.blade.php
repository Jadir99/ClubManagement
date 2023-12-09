@extends('layout')

@section('content')

@include('header')
    <style>
        /* Vos styles CSS ici */

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            margin-bottom: 30px;
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

        /* Autres styles... */
    </style>
<script>
    swal("Hello, world!");
</script>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Ajouter un club</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClubModal">
                    Ajouter un club
                </button>

                <!-- Modal d'ajout de club -->
                <div class="modal" id="addClubModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenu du modal pour ajouter un club -->
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un club</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('Club.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="club_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <select name="admin_id"class="form-select" aria-label="Default select example">
                                        <option selected>choose the amdin of the club</option>
                                        @foreach ($admins as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <input type="file" name="image" id=""><br>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau pour afficher les clubs -->
                <div class="table-container">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $item)
                                <tr>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a class="text-decoration-none" href="\images\club\{{ $item->image }}"
                                            data-gallery="attachment-bg">
                                            <img class="w-100 h-100 object-fit-cover" src="\images\club\{{ $item->image }}"
                                                alt="" />
                                        </a>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editClubModal{{ $item->id }}">Modifier</button>

                                        <!-- Modal pour modifier un club -->
                                        <!-- Modal pour modifier un club -->
                                        <div class="modal" id="editClubModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Contenu du modal pour modifier un club -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier un club</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('Club.update', ['Club' => $item->id]) }}"
                                                            method="Post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-3">
                                                                <label for="nom" class="form-label">Nom</label>
                                                                <input type="text" class="form-control" id="nom"
                                                                    value="{{$item->name}}"name="club_name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="form-label">Description</label>
                                                                <textarea class="form-control" id="description" name="description" rows="3"   required>{{ $item->description }}</textarea>
                                                            </div>
                                                            <select name="admin_id"class="form-select"
                                                                aria-label="Default select example">
                                                                <option selected>{{$item->admin->name}}</option>
                                                                @foreach ($admins as $admin)
                                                                    <option value="{{ $admin->id }}">
                                                                        {{ $admin->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <input type="file" name="image" id=""><br>
                                                            <button type="submit"
                                                                class="btn btn-primary">Enregistrer</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                </div>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteClubModal{{$item->id}}">Supprimer</button>
                <div class="modal" id="deleteClubModal{{$item->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenu du modal pour supprimer un club -->
                            <div class="modal-header">
                                <h5 class="modal-title">Supprimer un club</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Êtes-vous sûr de vouloir supprimer ce club ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="{{route('Club.destroy',['Club'=>$item->id])}}" method="post" id="deleteForm-{{$item->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
                </tr>
                @endforeach
                <!-- Ajoutez d'autres lignes pour les autres clubs -->
                </tbody>
                </table>
            </div>

            <!-- Modal pour modifier un club -->
            <!-- Modal pour modifier un club -->
            <div class="modal" id="editClubModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Contenu du modal pour modifier un club -->
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier un club</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Club.update', ['Club' => $item->id]) }}" method="Post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="club_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <select name="admin_id"class="form-select" aria-label="Default select example">
                                    <option selected>choose the amdin of the club</option>
                                    @foreach ($admins as $item)
                                        <option value="{{$item->id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                                <input type="file" name="image" id=""><br>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal pour supprimer un club -->
        <!-- Modal pour supprimer un club -->


    </div>
    </div>
    </div>

    @include('footer')
@endsection
