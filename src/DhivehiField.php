<?php

namespace Aiman\DhivehiField;

use Laravel\Nova\Fields\Field;

class DhivehiField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'dhivehi-field';

    public $showOnIndex = false;

    public function thaana($thaana = true){
        if($thaana){
            return $this->withMeta([
                'status' => 'enable',
            ]);
        }else{
            return $this->withMeta([
                'status' => 'disable',
            ]);
        }
    }

    public function type($type = 'phonetic'){
        return $this->withMeta([
            'type' => $type,
        ]);
    }
}
