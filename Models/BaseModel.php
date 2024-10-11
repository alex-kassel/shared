<?php

declare(strict_types=1);

namespace Shared\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use HasFactory;
    protected $attributeMapping = [];

    public function getAttribute($key): mixed
    {
        return parent::getAttribute($this->normalizeKey($key));
    }

    public function setAttribute($key, $value): void
    {
        parent::setAttribute($this->normalizeKey($key), $value);
    }

    public function normalizeKey(string $key): string
    {
        return $this->attributeMapping[$key] ?? Str::snake($key);
    }

    public function scopeWithLogging(Builder $query): Builder
    {
        return log_query($query);
    }
}
