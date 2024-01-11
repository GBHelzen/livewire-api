<?php

namespace App\Livewire\Artistas;

use App\Models\Artista;
use Livewire\Component;

class IndexArtistas extends Component
{
    public $displayName;
    public $artista = null;
    public $search = '';
    
    public function show(Artista $artista, string|int $constituentID)
    {
        $artista = Artista::findOrFail($constituentID, 
        [
            'constituentID',
            'displayName',
            'artistBio',
            'nationality',
        ]);

        return view ('livewire.artistas.show-artista', compact('artista'));
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
    }
}
