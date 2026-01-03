<?php 

namespace App\Attributes;

use Illuminate\Contracts\Container\ContextualAttribute;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Storage;
use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
class Disk implements ContextualAttribute
{
    public function __construct(public string $disk)
    {
        //
    }

    public static function resolve(self $attribute, Container $container)
    {
        return Storage::disk($attribute->disk);
    }
}