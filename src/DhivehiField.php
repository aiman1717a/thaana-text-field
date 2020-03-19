<?php

namespace Aiman\DhivehiField;

use Laravel\Nova\Fields\Field;

class DhivehiField extends Field
{
    public $showOnIndex = false;
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'dhivehi-field';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->thaana(true);
        $this->type(true);
    }

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
