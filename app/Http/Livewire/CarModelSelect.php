<?php

namespace Asantibanez\LivewireSelect;

use Illuminate\Support\Collection;
// use Asantibanez\LivewireSelect\LivewireSelect;

class CarModelSelect extends LivewireSelect
{
    public function options($searchTerm = null) : Collection 
        {
            return collect([
                [
                    'value' => 'honda',
                    'description' => 'Honda',
                ],
                [
                    'value' => 'mazda',
                    'description' => 'Mazda',
                ],
                [
                    'value' => 'tesla',
                    'description' => 'Tesla',
                ],       
            ]);
        }    
    
    public function render()
    {
        
    }
}

