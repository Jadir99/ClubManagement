hello every one this is me 

here we going to show all reclamations and an voir feedbacks 
in feedback we going to make a crud in feedback for the reclamtion so why

test <a href="{{ route('reclamation.create') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

@foreach ($reclamations as $item)
this <h1>{{$item->NumReclamation }}</h1> <br>
this <h1>{{$item->CorpReclamation}}</h1> <br>

<a class="dropdown-item" href="{{route('feedback.show',['feedback'=>$item->NumReclamation ])}}">show all feedbacks</a><br>
@endforeach




