<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $sidebar = [
            'Dashboard' => '/',
            'Supplier' => '/bahan-baku/supplier',
            'Gudang' => '/gudang'
        ];


        return view('app-layout.sidebar', compact('sidebar'));
    }
}
