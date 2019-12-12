<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Shortcut;

class ShortcutRepository extends ModuleRepository
{
    use HandleTranslations, HandleMedias;

    public function __construct(Shortcut $model)
    {
        $this->model = $model;
    }
}
