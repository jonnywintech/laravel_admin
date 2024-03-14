<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchComponent extends Component
{
    public string $wrapperClass;
    public string $name;
    public string $inputClass;
    public string $placeholder;
    /**
     * Create a new component instance.
     */
    /**
     * Method __construct
     *
     * @param $wrapper_class $wrapper_class div that wrap component controls the width and height in case that is not passed it will be used default which is 'inline w-4/12 ms-4'
     * @param $name $name it is name of the component default is 'search'
     * @param $input_class $input_class class that is hook for js that controls the input default class is 'admin__search'
     * @param $placeholder $placeholder placeholder of the input field
     *
     * @return void
     */
    public function __construct($wrapperClass , $name, $inputClass, $placeholder)
    {
        $this->wrapperClass = $wrapperClass;
        $this->name = $name;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-component');
    }
}
