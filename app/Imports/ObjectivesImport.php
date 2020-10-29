<?php

namespace App\Imports;

// use App\Objective;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ObjectivesImport implements ToCollection, WithHeadingRow
{   
    public function collection(Collection $rows){
        
    }
    
}
