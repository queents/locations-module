<?php

namespace Modules\Locations\Vilt\Resources;

use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\Currency;

class CurrencyResource extends Resource
{
    public ?string $model = Currency::class;
    public string $icon = "bx bx-money";
    public string $group = "Locations";
    public ?bool $api = false;

    public function rows(): array
    {
        return [
            Text::make('id')->label(__('Id'))->create(false)->edit(false),

            Text::make('arabic')->validation("nullable|max:255")->label(__('Arabic')),

            Text::make('name')->validation("required|max:255")->label(__('Name')),

            Text::make('iso')->validation("required|max:255")->label(__('Iso')),
        ];
    }
}
