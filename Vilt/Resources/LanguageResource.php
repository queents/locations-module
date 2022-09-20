<?php

namespace Modules\Locations\Vilt\Resources;
use Modules\Base\Services\Resource\Resource;
use Modules\Base\Services\Rows\Text;
use Modules\Locations\Entities\Language;

class LanguageResource extends Resource
{
    public ?string $model = Language::class;
    public string $icon = "bx bx-blanket";
    public string $group = "Locations";
    public ?bool $api = false;

    public function rows(): array
    {
        return [
            Text::make('id')->label(__('Id '))->create(false)->edit(false),

            Text::make('iso')->unique(true)->validation("required|max:255")->label(__('Iso ')),

            Text::make('name')->validation("required|max:255")->label(__('Name ')),

            Text::make('arabic')->validation("nullable|max:255")->label(__('Arabic ')),

        ];
    }
}
