@extends('layouts.vleugelslayout')
 
@section('content')
    <div class="flex justify-center text-4xl">Overzicht van de personen</div>

    @php 

    //echo (" aantal = " . count($personen));
    //dd($personen);

    @endphp

    @if ( count($personen) == 0)
        <div class="flex justify-center text-4xl text-red-700">Er zijn geen personen</div>
    @else
        {{ $personen->links() }}

        <table class="tabel table-auto">
            <thead class="thead">
                <tr>
                    <th>#</th>
                    <th>naam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- doorloop alle -->
                @foreach($personen as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->voornaam }} {{ $item->familienaam }}</td>
                        <td class="flex">
                            <a href="persoon/{{ $item->id }}/edit" class="formknop">wijzig</a>
                            <a href="persoon/{{ $item->id }}/delete" class="formknop">verwijder</a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        {{ $personen->links() }}
    @endif 
@endsection


