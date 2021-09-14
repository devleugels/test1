
@extends('layouts.vleugelslayout')
 
 @section('content')
     <div class="flex justify-center text-4xl">Editeren van een persoon</div>

     @php
        $extra = array(
        'isAdmin' => 1,
        'client_id' => 0,
        );
       echo("[views.persoon.edit] data =".json_encode($persoon)."<br />");
       echo(" en extra = ".json_encode($extra));
     @endphp

     <formulier
       :data="{{ json_encode($persoon) }}"
       :extra="{{ json_encode($extra) }}" />

 @endsection
 