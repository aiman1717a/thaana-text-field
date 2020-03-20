<?php

namespace Aiman\ThaanaTextField;

use Laravel\Nova\Fields\Field;

class ThaanaTextField extends Field
{
    public $showOnIndex = false;
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thaana-text-field';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->thaana(true);
        $this->type();
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
