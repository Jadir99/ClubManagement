
    test <a href="{{ route('reclamation.create') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

    @foreach ($reclamations as $item)
   this <h1>{{$item->NumReclamation }}</h1> <br>
   this <h1>{{$item->CorpReclamation}}</h1> <br>
   <form action="{{route('reclamation.destroy',['reclamation'=>$item->NumReclamation ])}}" method="post" id="deleteForm-{{$item->NumReclamation}}">
    @csrf
    @method('delete')
    {{-- <div class="dropdown-divider"></div> <button type="button" class="dropdown-item text-danger" onclick="confirmation({{$item->NumReclamation}})">Delete</button>  --}}
    <button>Suppr</button>
  </form>
  <br>
  <a class="dropdown-item" href="{{route('reclamation.edit',['reclamation'=>$item->NumReclamation ])}}">Edit</a>
    @endforeach

    