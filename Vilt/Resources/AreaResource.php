<?php

namespace Modules\Locations\Vilt\Resources;
use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\HasOne;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;

class AreaResource extends Resource
{
    public ?string $model = Area::class;
    public string $icon = "bx bx-map-pin";
    public string $group = "Locations";
    public ?bool $api = true;

    public function rows(): array
    {
        return [
            Text::make('id')->label(__('Id '))->create(false)->edit(false),

            Text::make('name')->validation([
                "create" => "required|max:255",
                "update" => "required|max:255"
            ])->label(__('Name ')),

            HasOne::make('city_id')->validation([
                "create" => "required|max:255",
                "update" => "required|max:255"
            ])->label(__('City Id'))->relation('city')->model(City::class),

            Text::make('lat')->validation([
                "create" => "nullable|max:255",
                "update" => "nullable|max:255"
            ])->label(__('Lat ')),

            Text::make('lang')->validation([
                "create" => "nullable|max:255",
                "update" => "nullable|max:255"
            ])->label(__('Lang ')),
       ];
    }

    public function setFilters($query, $request): void
    {
        if ($request->has('city_id')) {
            $query->where('city_id', $request->get('city_id'));
        }
    }
}
