<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class SalesChart extends Component
{

    public $chartData = [];

    public function mount()
    {
        // Example data
        $this->chartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
            ],
        ];
    }


    public function render()
    {
        return view('livewire.dashboard.sales-chart');
    }
}
