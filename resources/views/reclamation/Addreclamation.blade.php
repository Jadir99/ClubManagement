<form action="{{route('reclamation.store')}}" method="Post" enctype="multipart/form-data">
    @csrf
    {{-- @method('put') --}}

    titre<input type="text">    
    
    
  <textarea name="CorpReclamation" id="" cols="30" rows="10"></textarea>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>