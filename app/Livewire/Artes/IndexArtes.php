<?php

namespace App\Livewire\Artes;

use App\Models\Arte;
use Livewire\Component;

class IndexArtes extends Component
{
    public $title;
    public $arte = null;
    public $search = '';

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

        return view ('livewire.artes.show-arte', compact('arte'));
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
                    ->orderBy('objectID', 'desc')->paginate(4),
            ]
        );
    }
}
