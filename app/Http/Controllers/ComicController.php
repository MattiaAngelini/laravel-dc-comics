<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data =[
            'comics' => $comics
        ];
        return view('comics.index', $data);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $formData = $request ->all();
        $this->validation($formData);
        $newComic = new Comic();;
        $newComic->fill($formData);
        $newComic->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        $data = [
            'comic' => $comic
        ];
        
        return view('comics.show', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        
        $data = [
            'comic' => $comic
        ];

        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $formData = $request->all();
        $this->validation($formData);

        $comic = Comic::findOrFail($id);
        
        $comic->update($formData);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $comic = Comic::findOrFail($id);
       $comic-> delete();  
       return redirect()->route('comics.index');
    }

    private function validation($data) {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:5|max:50',
                'image' => 'required|max:250',
                'type' => 'required|max:20',
                'series' => 'required|max:100',
                'description' => 'nullable|min:10|max:2000'
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio',
                'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
                'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
                'image.required' => 'Il campo immagine è obbligatorio',
                'type.required' => 'Il campo tipo è obbligatorio',
                'series.required' => 'Il campo serie è obbligatorio'
            ]
        )->validate();

        return $validator;
    }
}
