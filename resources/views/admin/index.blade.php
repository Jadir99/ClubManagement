this is liste of user if u want to add some one to be an administrator

@foreach ($users as $user)
    name {{$user->name}}<br>
  <h1>  {{$user->isadmin}}<br></h1>
    
        <form method="POST" action="{{route('admin.update',['admin'=>$user->id ])}}">
            @csrf
            @method('put')
                @if ($user->isadmin)
                im admin
                <button>return to user</button>
                @else
                im user
                <button>return to admin</button>
                @endif
        </form><br>
        <form action="{{route('admin.destroy',['admin'=>$user->id ])}}" method="post" >
            @csrf
            @method('delete')
            {{-- <div class="dropdown-divider"></div> <button type="button" class="dropdown-item text-danger" onclick="confirmation({{$item->NumReclamation}})">Delete</button>  --}}
            <button>Suppr</button>
        </form>
@endforeach