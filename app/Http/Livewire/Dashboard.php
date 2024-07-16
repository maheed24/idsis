<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Detail;
use Livewire\Component;
use App\Models\Certificate_license;
use App\Models\Ship_classification;

class Dashboard extends Component
{

    public $validCount;
    public $expiredCount;
    public $shipTypePercentage;
    public $totalPassenger;
    public $totalVessel;
    public $shipClassification;
    
    public function render()
    {
       // Get the current date
       $currentDate = Carbon::now();

       // Fetch records where the 'validity' date is less than the current date (expired)
       $expired_licenses = Certificate_license::where('validity', '<', $currentDate)->get();

       // Count the number of expired records
       $expired = $expired_licenses->count();

       // Assign the value to $expiredCount
       $this->expiredCount = $expired;

       // Fetch records where the 'validity' date is greater than or equal to the current date (valid)
       $valid_licenses = Certificate_license::where('validity', '>=', $currentDate)->get();

       // Count the number of valid records
       $valid = $valid_licenses->count();

       // Assign the value to $validCount
       $this->validCount = $valid;
    
       $Detail = Detail::all();
       //$vessel = $Detail->sum('ship_name');
       $vessel = $Detail->count();
       $this->totalVessel = $vessel;

       $this->shipClassification = Ship_classification::all();

       return view('livewire.dashboard');
    }
}
