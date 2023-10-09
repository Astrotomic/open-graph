<?php

namespace Astrotomic\OpenGraph;

use Astrotomic\OpenGraph\StructuredProperties\Audio;
use Astrotomic\OpenGraph\StructuredProperties\Image;
use Astrotomic\OpenGraph\StructuredProperties\Video;

abstract class Type extends BaseObject
{
    /** @var string */
    protected $type;

    public function __construct(string $title = null)
    {
        $this->setProperty('og', 'type', $this->type);
        $this->when($title)->title($title);
    }

    public static function make(string $title = null)
    {
        return new static($title);
    }

    public function title(string $title)
    {
        $this->setProperty('og', 'title', $title);

        return $this;
    }

    public function url(string $url)
    {
        $this->setProperty('og', 'url', $url);

        return $this;
    }

    public function description(string $description)
    {
        $this->setProperty('og', 'description', $description);

        return $this;
    }

    public function determiner(string $determiner)
    {
        $this->setProperty('og', 'determiner', $determiner);

        return $this;
    }

    public function locale(string $locale)
    {
        $this->setProperty('og', 'locale', $locale);

        return $this;
    }

    public function siteName(string $locale)
    {
        $this->setProperty('og', 'site_name', $locale);

        return $this;
    }

    public function alternateLocale(string $locale)
    {
        $this->addProperty('og', 'locale:alternate', $locale);

        return $this;
    }

    /**
     * @param  Image|string  $image
     * @return $this
     */
    public function image($image)
    {
        if ($image instanceof Image) {
            $this->addStructuredProperty($image);

            return $this;
        }

        $this->addProperty('og', 'image', $image);

        return $this;
    }

    /**
     * @param  Video|string  $video
     * @return $this
     */
    public function video($video)
    {
        if ($video instanceof Video) {
            $this->addStructuredProperty($video);

            return $this;
        }

        $this->addProperty('og', 'video', $video);

        return $this;
    }

    /**
     * @param  Audio|string  $audio
     * @return $this
     */
    public function audio($audio)
    {
        if ($audio instanceof Audio) {
            $this->addStructuredProperty($audio);

            return $this;
        }

        $this->addProperty('og', 'audio', $audio);

        return $this;
    }

    public function addStructuredProperty(BaseObject $property)
    {
        $this->tags[] = $property;
    }
}
