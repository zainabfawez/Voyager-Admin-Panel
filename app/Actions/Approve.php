<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Approve extends AbstractAction
{
    public function getTitle()
    {
        return $this->data->{'approved'} == 0?'Approve':'Approved';
    }

    public function getIcon()
    {
        return $this->data->{'approved'} == 0 ?'voyager-x':'voyager-check';
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'items';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    // public function shouldActionDisplayOnRow($row)
    // {
    //     return $row->id = 1;
    // }

    public function getDefaultRoute()
    {
        return route('items.approve', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}