<?php

namespace App\Livewire\Artistas;

use App\Http\Resources\ArtistaResource;
use App\Models\Arte;
use App\Models\Artista;
use Livewire\Component;

class IndexArtistas extends Component
{
    public $displayName;
    public $artista = null;
    public $search = '';

    public function teste2(string|int $constituentID)
    {
        $artista = Artista::findOrFail($constituentID);
        
        $teste = (new ArtistaResource($artista));
        dd ($teste);
    }

    public function teste()
    {
        $artistas = $artistas = Artista::with('artes')->paginate(1); 
        $teste = (ArtistaResource::collection($artistas));
        dd ($teste);
    }
    
    public function show(Artista $artista, Arte $arte, string|int $constituentID)
    {   
        $artista = Artista::findOrFail($constituentID, 
        [
            'constituentID',
            'displayName',
            'artistBio',
            'nationality',
        ]);

        return view ('livewire.artistas.show-artista', compact('artista'));
        
        // $artista = Artista::findOrFail($constituentID);
        
        // $teste = (new ArtistaResource($artista))->resolve();

        // return view ('livewire.artistas.show-artista', ['artista' => $teste]);
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
                    ->orderBy('constituentID', 'desc')->paginate(4),
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
