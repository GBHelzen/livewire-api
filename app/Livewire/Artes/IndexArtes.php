<?php

namespace App\Livewire\Artes;

use App\Http\Resources\ArteResource;
use App\Models\Arte;
use Livewire\Component;

class IndexArtes extends Component
{
    public $title;
    public $arte = null;
    public $search = '';


    public function teste2(string|int $objectID)
    {
        $arte = new ArteResource(Arte::findOrFail($objectID));

        return ($arte);
    }

    public function teste()
    {
        $artes = Arte::paginate(1);
        
        $teste = ArteResource::collection($artes);
        return ($teste);
    }

    public function show(Arte $arte, string|int $objectID)
    {
        $arte = Arte::findOrFail($objectID, 
        [
            'objectID',
            'title',
            'dimensions',
            'url',
            'creditLine',
        ]);

        $pivot = $arte->artistas()->select('constituentID','displayName')->get();

        return view ('livewire.artes.show-arte', compact('arte', 'pivot'));
    }
    
    public function render()
    {
        return view('livewire.artes.index-artes', 
            [
                'artes' => Arte::select([
                        'objectID',
                        'title',
                        'classification',
                        'medium',
                        'department'
                    ])
                    ->where('title', 'ilike', '%' . $this->search . '%')
                    ->orderBy('objectID', 'desc')
                    ->paginate(4),
            ]
        );

        // $artes = Arte::where('title', 'ilike', '%' . $this->search . '%')
        //     ->orderBy('objectID', 'desc')->paginate(4);

        // $teste = ArteResource::collection($artes);

        // return view('livewire.artes.index-artes', 
        //     [
        //         'artes' => $teste
        //     ]
        // );

    }
}
