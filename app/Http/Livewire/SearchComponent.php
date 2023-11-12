<?php

namespace App\Http\Livewire;

use App\Models\Detail;
use App\Models\Ship_type;
use Livewire\Component;

class SearchComponent extends Component
{
    public $searchTerm = '';
    public $Detail = [];
    public $shipType ;

    public function filterItems()
    {
        $this->Detail = Detail::where('ship_name', 'like', '%' . $this->searchTerm . '%')->get();
    }

    public function updatedSearchTerm()
    {
        $this->filterItems();
    }

    public function render()
    {
        // return view('livewire.search-component');
        $this->shipType = Ship_type::all();
        return view('livewire.search-component', [
            'Detail' => $this->Detail,
        ]);
    }
}
