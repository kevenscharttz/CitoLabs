<x-layout title="Séries">
    <a class="btn btn-primary" href="/series/criar" role="button">Link</a>
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>
</x-layout>
