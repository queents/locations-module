<?php

namespace Modules\Locations\Vilt\Resources;

use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\HasOne;
use Modules\Base\Services\Rows\Number;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\City;
use Modules\Locations\Entities\Country;

class CityResource extends Resource
{
    public ?string $model = City::class;
    public string $icon = "bx bxs-circle";
    public string $group = "Locations";
    public ?bool $api = true;

    public function rows(): array
    {
        return [
            Text::make('id')->label(__('Id '))->create(false)->edit(false),

            Text::make('name')->validation([
                "created" => "required|max:255",
                "updated" => "required|max:255"
            ])->label(__('Name ')),

            Number::make('price')->label(__('Price ')),

            HasOne::make('country_id')->validation([
                "create" => "required",
                "update" => "required",
            ])->label(__('Country Id'))->model(Country::class)->relation('country'),

            Text::make('lat')->validation([
                "create" => "nullable|max:255",
                "update" => "nullable|max:255",
            ])->label(__('Lat ')),

            Text::make('lang')->validation([
                "create" => "nullable|max:255",
                "update" => "nullable|max:255",
            ])->label(__('Lang ')),

        ];
    }

    public function setFilters($query, $request): void
    {
        if ($request->has('country_id')) {
            $query->where('country_id', $request->get('country_id'));
        }
    }
}
