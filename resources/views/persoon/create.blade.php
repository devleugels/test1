
@extends('layouts.vleugelslayout')
 
 @section('content')
     <div class="flex justify-center text-4xl">creëren van een persoon</div>

     @php
       echo("[views.persoon.create] data =".json_encode($data)."<br />");
       echo(" en extra = ".json_encode($extra));
     @endphp

     <formulier
       :data="{{ json_encode($data) }}"
       :extra="{{ json_encode($extra) }}" />

 @endsection
 