@foreach ($clubs as $item)
    {{$item->name}}<br>
@endforeach

test <a href="{{ route('Club.create') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ajouter</a>
ajouter