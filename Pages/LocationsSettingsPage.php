<?php

namespace Modules\Locations\Pages;

use Illuminate\Support\Str;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\Country;
use Modules\Locations\Entities\Currency;
use Modules\Locations\Entities\Language;
use Modules\Locations\Settings\LocationsSettings;
use Modules\Settings\Services\Setting;
use Modules\Settings\Settings\SitesSettings;

class LocationsSettingsPage extends Setting {

    public ?string $setting = LocationsSettings::class;
    public ?bool $api = true;
    public ?string $path = "locations_settings";
    public ?string $group = "Locations";
    public ?string $icon = "bx bx-cog";

    public  function rows(): array
    {
        return [
            Text::make('local_country')->label(__('Country')),
            Text::make('local_lang')->label(__('Language')),
            Text::make('local_currency')->label(__('Currency')),
            Text::make('local_phone')->label(__('Phone Code')),
            Text::make('local_lat')->label(__('Lat')),
            Text::make('local_lng')->label(__('Lng')),
        ];
    }
}
