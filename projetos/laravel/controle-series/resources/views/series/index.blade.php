<x-layout title="Séries">
    <a class="btn btn-primary" href="{{ route('series.create')}}" role="button">Link</a>
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</x-layout>
