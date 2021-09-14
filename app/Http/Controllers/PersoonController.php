<?php

namespace App\Http\Controllers;

use App\Models\Persoon;
use Illuminate\Http\Request;
use Validator;

class PersoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Enkel de admin mag dit ( voor later )

        // haal alle personen op
        $personen = Persoon::paginate(10); 

        return view('persoon.index', compact('personen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
          'id' => 0,
          'voornaam' => '',
          'familienaam' => '',
          'straat' => '',
          'huisnummer' => '',
          'bus' => '',
          'postcode' => '',
          'gemeente' => '',
          'telefoon' => '',
          'gsm' => '',
          'email' => '',
        );

       // $data = json_encode($data);
      
        $extra = array(
          'isAdmin' => 1,
          'client_id' => 0,
        );
      //  $extra = json_encode($extra);

        return view('persoon.create', compact('data', 'extra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request['data']);
        $data = $request['data'];

        $validator = $this->valideer($data);
        
        // spaar de gegevens
        $persoon = Persoon::create($data);

        return ['message' => 'test'];

    }

    private function valideer($data)
    {
        // valideer
        $validator = Validator::make( $data, [
            'voornaam' => 'required | min:2',
            'familienaam' => 'required | min:2',
            'straat' => 'required | min:2',
            'huisnummer' => 'required | min:1',
            'postcode' => 'required | min:4',
            'gemeente' => 'required | min:2',
            'telefoon' => 'required | min:2',
            'gsm' => 'required | min:2',
            'email' => 'sometimes|email:rfc,dns'
        ])->validate();
        
        return $validator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persoon  $persoon
     * @return \Illuminate\Http\Response
     */
    public function show(Persoon $persoon)
    {
        echo ("[PersoonController@show] ");
        dd($persoon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persoon  $persoon
     * @return \Illuminate\Http\Response
     */
    public function edit(Persoon $persoon)
    {
        return view('persoon/edit', compact('persoon'));
//        echo ("[PersoonController@edit] ");
//        dd($persoon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persoon  $persoon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persoon $persoon)
    {
        $all = request()->all();
        $data = $all['data'];

    //    echo ("[PersoonController@update] ");
    //    dd($data);

        $validator = $this->valideer($data);


        // spaar de gegevens
        $item = Persoon::findOrFail($persoon->id);
        $item->voornaam = $data['voornaam'];
        $item->familienaam = $data['familienaam'];
        $item->straat = $data['straat'];
        $item->huisnummer = $data['huisnummer'];
        $item->bus = $data['bus'];
        $item->postcode = $data['postcode'];
        $item->gemeente = $data['gemeente'];
        $item->telefoon = $data['telefoon'];
        $item->gsm = $data['gsm'];
        $item->email = $data['email'];

        $item->save();

        return ['message' => 'test'];    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persoon  $persoon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persoon $persoon)
    {
        //
    }

    /***
     * spring hier als je een item wil verwijderen
     * 
     */
    public function verwijder( $id ) // Persoon $persoon)
    {
        echo ("[PersoonController@verwijder] ");
//        $all = session()->all();
//        echo(" all = ".json_encode($all));
//        ddd($id);      
        $persoon = Persoon::findOrFail( $id );
        // ddd($persoon);
        $persoon->delete();

        return view('/home');


    }
}
