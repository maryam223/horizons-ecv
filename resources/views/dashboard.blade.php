<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="display: grid;place-items: center;">
               @foreach ($data as $data)
               <h1>{{$data->name}}, organisons ce voyage.</h1>
                @endforeach
               @if($data->nb_trip >= 0 && $data->nb_trip < 15 )
                <img src="https://horizons-ecv.netlify.app/pigeon.png" width="120px">
                <p style="text-align: center;">Vous avez effectué <span style="font-weight:bold;">{{ $data->nb_trip }} voyages</span>. <br>Vous êtes au niveau <span style="font-weight:bold; font-style: italic;">Pigeon Voyageur</span>.<p>
               @elseif($data->nb_trip >= 15 && $data->nb_trip < 30 )
               <img src="https://horizons-ecv.netlify.app/saumon.png" width="120px">
                <p style="text-align: center;">Vous avez effectué <span style="font-weight:bold;">{{ $data->nb_trip }} voyages</span>. <br>Vous êtes au niveau <span style="font-weight:bold; font-style: italic;">Saumon Sauvage</span>.<p>
               @elseif($data->nb_trip >= 30 && $data->nb_trip < 45 )
               <img src="https://horizons-ecv.netlify.app/baleine-bleue.png" width="120px">
                <p style="text-align: center;">Vous avez effectué <span style="font-weight:bold;">{{ $data->nb_trip }} voyages</span>. <br>Vous êtes au niveau <span style="font-weight:bold; font-style: italic;">Baleine Bleue</span>.<p>
               @else
               <img src="https://horizons-ecv.netlify.app/sterne-arctique.png" width="120px">
                <p style="text-align: center;">Vous avez effectué <span style="font-weight:bold;">{{ $data->nb_trip }} voyages</span>. <br>Vous êtes au niveau <span style="font-weight:bold; font-style: italic;">Sterne Arctique</span>.<p>
               @endif
                
            </div>
        </div>
    </div>
</x-app-layout>
