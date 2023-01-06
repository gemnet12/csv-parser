<?php

namespace Programm\App\Services;

use Programm\App\Models\LoadedFiles;
use Programm\App\Models\Model;
use Programm\App\Services\Service;

/**
 * AppService
 */
class AppService extends Service
{
    /**
     * __construct
     *
     * @param Model $model
     * @return void
     */
    public function __construct(
        protected Model $model = new LoadedFiles()
    ) {}
}
