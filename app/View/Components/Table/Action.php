<?php

namespace App\View\Components\Table;

use App\Helpers\Components\Action as baseAction;
use Illuminate\View\Component;

class Action extends Component
{

    public $action;
    public $deleteSelectedClass;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(baseAction $action, $id)
    {
        $this->action = $action;
        if(empty($id)){
            $this->deleteSelectedClass = 'delete-selected-rows';
        }else{
            $this->deleteSelectedClass = $id.'-delete-selected-rows';
        }


    }




    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.action');
    }
}
