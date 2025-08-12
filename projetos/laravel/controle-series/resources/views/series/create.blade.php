<x-layout title="Nova Série">
    {{-- Essa função pega da flash session, daquela sessão que dura uma vez só, a requisição anterior, que foi adicionada pela validação. --}}
	<x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" />
</x-layout>
