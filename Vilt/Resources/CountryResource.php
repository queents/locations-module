<?php

namespace Modules\Locations\Vilt\Resources;

use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\Country;

class CountryResource extends Resource
{
    public ?string $model = Country::class;
    public string $icon = "bx bxs-circle";
    public string $group = "Locations";
    public ?bool $api = true;

    public function rows(): array
    {
        return [
            Text::make('id')->label(__('Id '))->create(false)->edit(false),

            Text::make('name')->searchable()->unique()->validation("required|max:255")->label(__('Name ')),

            Text::make('code')->unique(true)->validation("required|max:255")->label(__('Code ')),

            Text::make('phone')->label(__('Phone '))->type('text'),

            Text::make('lat')->validation("nullable|max:255")->label(__('Lat ')),

            Text::make('lang')->validation("nullable|max:255")->label(__('Lang ')),

        ];
    }
}
