hello this for updating the reclmation

<h1>{{$Reclamation->NumReclamation}}</h1>
<form action="{{route('reclamation.update',['reclamation'=>$Reclamation->NumReclamation])}}" method="Post">
    @csrf
    @method('put')
    
   
  <textarea name="CorpReclamation" id="" cols="30" rows="10"></textarea>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>