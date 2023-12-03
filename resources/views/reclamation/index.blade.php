
@extends('layout')

@section('content')
    @include('headerAdherant')

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
            padding: 40px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12" id="bodyReclamation">
                <h1>Liste des réclamations</h1>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Intitulé de réclamation</th>
                            <th>Club name</th>
                            <th>Contenu</th>
                            <th>État</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($reclamations as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            
                          <td>{{$item->club->name}}</td>  
                            <td>{{$item->CorpReclamation}}</td>
                            @if ($item->etat==0)
                                
                              <td class="etat-en-cours">En cours de traitement</td>
                            @else 
                            <td class="etat-traite"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-feedback="Le problème de livraison a été résolu.">Traité</button></td>
                            @endif
                            <td> 
                                <form action="{{route('reclamation.destroy',['reclamation'=>$item->NumReclamation ])}}" method="post" id="deleteForm-{{$item->NumReclamation}}">
                                  @csrf
                                  @method('delete')
                                  {{-- <div class="dropdown-divider"></div> <button type="button" class="dropdown-item text-danger" onclick="confirmation({{$item->NumReclamation}})">Delete</button>  --}}
                                  <button>Suppr</button>
                                </form>
                                <a class="dropdown-item" href="{{route('reclamation.edit',['reclamation'=>$item->NumReclamation ])}}">Edit</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback de réclamation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modal-text">Feedback de l'administrateur.</p>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

   
@endsection


    