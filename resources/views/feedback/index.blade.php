
@extends('layout')

@section('content')
@include('header')

    <style>
        /* Styles existants */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
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
        #bodyReclamation{
            padding: 80px;
        }
    </style>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="bodyReclamation">
                <h1>Liste des réclamations</h1>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Club</th>
                            <th>Intitulé de réclamation</th>
                            <th>Contenu</th>
                            <th>État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clubs as $club)
                            <tr>
                                @foreach ($club->reclamations as $reclamation)
                                    
                                        <td>{{$club->name}}</td>
                                        <td>{{$reclamation->title}}</td>
                                        <td>{{$reclamation->CorpReclamation}} </td>
                                        
                                        <td class="etat-en-cours">
                                            @if ($reclamation->etat==0)
                                            En cours de traitement
                                            @else
                                            traité
                                            @endif
                                        </td>
                                        <td>      
                                            @if ($reclamation->etat==0)
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$reclamation->NumReclamation}}" data-feedback="Feedback pour le problème de connexion.">Traiter</button>
                                            @endif
                                            @if ($reclamation->etat==1)
                                                @foreach ($reclamation->feedbacks as $feedback)
                                            
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalv{{$feedback->id}}" data-feedback="Feedback pour le problème de connexion.">voir</button>
                                                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalv{{$feedback->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un feedback</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('feedback.store')}}" method="Post">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            {{$feedback->response}}
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif                                      
                                       </td> 
                                       <!-- Modal -->
                                       <div class="modal fade" id="exampleModal{{$reclamation->NumReclamation}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un feedback</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('feedback.store')}}" method="Post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <input type="hidden" name="reclamation_id" value="{{$reclamation->NumReclamation}}">
                                                            
                                                            <label for="feedback" class="form-label">Feedback</label>
                                                            <textarea class="form-control" id="feedback" rows="3" name ="response"required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    
                                @endforeach 
                        <br></tr>
                        @endforeach
                        
                        <!-- Ajouter d'autres lignes pour d'autres réclamations non traitées -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @include('footer')
@endsection





