# thaana_field_nova
This Nova Package allow you to use Nova field with Thaana Keyboard

## Installation
```
composer require aiman/dhivehi-field
```

## Usage
In your Nova resource add the use declaration and use the NovaTinyMCE field:
```
use Aiman\DhivehiField\DhivehiField;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            DhivehiField::make('Content'),
        ];
    }
```

### Thaana
You can turn thaana translation. by default it is `true`.
```
DhivehiField::make('Content', 'content')->thaana()
```

### Keyboard Type
You can turn thaana keyboard type. by default it is `phonetic`.
```
DhivehiField::make('Content', 'content')->type()
```

## Important
This package is tested for **Nova Fields only**


## Credit
Huge Credit goes for [@Jawish Hameed](https://github.com/jawish) for his thaana translation plugin [Thaana Keyboard](https://github.com/jawish/jtk)
