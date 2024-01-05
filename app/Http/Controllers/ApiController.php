<?php

namespace App\Http\Controllers;

use App\Models\Arte;
use App\Models\Artista;
use App\Services\MuseumofModernArt\ArtistService;
use App\Services\MuseumofModernArt\ArtService;

class ApiController extends Controller
{
    public Artista $artista;
    public Arte $arte;
    public array $data;
    public int $maxArtist;
    public int $maxArt;
    public function artistas()
    {  
        $x = 0;
        
        $service = new ArtistService();
        // Artists
        $json = $service
            ->artists()
            ->get();
        
            ($maxArtist = $json->count());
            
            // Salvando no banco de dados
            while ($x < $maxArtist) {
                foreach ($json[$x] as $artista) {
                    $artista = new Artista;
                    $artista->constituentID     = $json[$x]->constituentID;
                    $artista->displayName       = $json[$x]->displayName;
                    $artista->artistBio         = $json[$x]->artistBio;
                    $artista->nationality       = $json[$x]->nationality;
                    $artista->gender            = $json[$x]->gender;
                    $artista->beginDate         = $json[$x]->beginDate;
                    $artista->endDate           = $json[$x]->endDate;
                    $artista->wikiQID           = $json[$x]->wikiQID;
                    $artista->ULAN              = $json[$x]->ULAN;
                    $artista->save();
                    $x = $x + 1;
                }
            }

            return('Artistas salvos no banco de dados com sucesso!');
    }

    public function artes()
    {
        $x = 0;
        
        $service = new ArtService();
        // Artworks
        $json = $service
        ->arts()
        ->get();
        
        $maxArt = $json->count();

        // Salvando no banco de dados
        while ($x < $maxArt) {
            foreach($json[$x] as $arte) {
                $arte = new Arte;
                $arte->objectID          = $json[$x]->objectID;
                $arte->title             = $json[$x]->title;
                $arte->constituentID     = implode(', ', $json[$x]->constituentID);
                $arte->date              = $json[$x]->date;
                $arte->medium            = $json[$x]->medium;
                $arte->dimensions        = $json[$x]->dimensions;
                $arte->creditLine        = $json[$x]->creditLine;
                $arte->accessionNumber   = $json[$x]->accessionNumber;
                $arte->classification    = $json[$x]->classification;
                $arte->department        = $json[$x]->department;
                $arte->dateAcquired      = $json[$x]->dateAcquired;
                $arte->cataloged         = $json[$x]->cataloged;
                $arte->url               = $json[$x]->url;
                $arte->thumbnailUrl      = $json[$x]->thumbnailUrl;
                $arte->circumference     = $json[$x]->circumference;
                $arte->depth             = $json[$x]->depth;
                $arte->diameter          = $json[$x]->diameter;
                $arte->height            = $json[$x]->height;
                $arte->length            = $json[$x]->length;
                $arte->weight            = $json[$x]->weight;
                $arte->width             = $json[$x]->width;
                $arte->seatHeight        = $json[$x]->seatHeight;
                $arte->duration          = $json[$x]->duration;
                $arte->save();
                    foreach($json[$x]->constituentID as $constituentID)
                    {
                        $arte->artistas()->attach($constituentID);
                    }
                $x = $x + 1;
            }
        }

        return('Artes salvas no banco de dados com sucesso!');
    }
}