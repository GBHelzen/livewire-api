<?php

namespace App\Livewire\Artistas;

use App\Http\Resources\ArtistaResource;
use App\Models\Artista;
use Livewire\Component;

class IndexArtistas extends Component
{
    public $displayName;
    public $artista = null;
    public $search = '';

    public function teste2(string|int $constituentID)
    {
        $artista = new ArtistaResource(Artista::findOrFail($constituentID));
        
        dd ($artista);
    }

    public function teste()
    {
        $artistas = Artista::with('artes')->paginate(1); 
        $teste = (ArtistaResource::collection($artistas));
        dd ($teste);
    }
    
    public function show(Artista $artista, string|int $constituentID)
    {  
        $artista = Artista::findOrFail($constituentID, 
        [
            'constituentID',
            'displayName',
            'artistBio',
            'nationality',
        ]);

        $pivot = $artista->artes()->select('objectID','title')->get();

        return view ('livewire.artistas.show-artista', compact('artista', 'pivot'));
    }

    public function render()
    {

        return view('livewire.artistas.index-artistas', 
            [
                'artistas' => Artista::select([
                        'constituentID',
                        'displayName',
                        'nationality',
                        'beginDate',
                        'endDate'
                    ])
                    ->where('displayName', 'ilike', '%' . $this->search . '%')
                    ->orderBy('constituentID', 'desc')
                    ->paginate(4),
            ]
        );

        // $artistas = Artista::where('displayName', 'ilike', '%' . $this->search . '%')
        //     ->orderBy('constituentID', 'desc')->paginate(4);

        // $teste = ArtistaResource::collection($artistas);

        // return view('livewire.artistas.index-artistas', 
        //     [
        //         'artistas' => $teste
        //     ]
        // );
        
    }
}
