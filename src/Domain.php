<?php

namespace YangYiYi\MultipleDomain;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use YangYiYi\MultipleDomain\Exceptions\InvalidOption;

class Domain
{
    const MODE_PREFIX = 'prefix';
    const MODE_DOMAIN = 'domain';

    const TYPE_WEB = 'web';
    const TYPE_API = 'api';

    private string $mode;
    private Collection $domains;

    public function __construct()
    {
        $this->mode = config('app.domain_mode', self::MODE_PREFIX);

        $this->domains = collect(config('domain', []))
            ->sortBy('sequence');

        if ($this->domains->isEmpty()) {
            throw InvalidOption::missingDataFromConfigDomainFolder();
        }
    }

    public static function init(): self
    {
        return new static();
    }

    public function isPrefix(): bool
    {
        return $this->mode === self::MODE_PREFIX;
    }

    public function isDomain(): bool
    {
        return $this->mode === self::MODE_DOMAIN;
    }

    public function generate(?string $default_namespace)
    {
        $domains = $this->list;

        foreach ($domains as $domain) {
            [
                'namespace' => $namespace,
                'domain' => [
                    'url' => $url,
                    'prefix' => $prefix,
                ],
                'as' => $as,
                'filename' => $filename,
                'middleware' => $middleware,
            ] = $domain;

            $route = Route::middleware($middleware);

            if (!empty($$default_namespace)) {
                $namespace = $default_namespace . "\\" . $namespace;
            }

            $route = $route->namespace($namespace);

            if ($this->isPrefix() && !empty($prefix)) {
                $route = $route->prefix($prefix);
            }

            if ($this->isDomain() && !empty($url)) {
                $route = $route->domain($url);
            }

            if (!empty($as)) {
                $route = $route->name($as);
            }

            $route->group(base_path('routes/' . $filename));
        }
    }
}
