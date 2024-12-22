<?php

namespace Modules\SEOManager\App\Services\Front;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BaseSEOService
{
    // Cache TTL (Time-To-Live) in minutes
    protected const CACHE_TTL = 60; // Set to 60 minutes as an example

    /**
     * Set basic SEO meta tags (Title, Description, Canonical, Robots, Keywords)
     *
     * @param string|null $title
     * @param string|null $description
     * @param string|null $canonicalUrl
     * @param string $robots
     * @param array|Collection $keywords
     * @return void
     */
    protected function setBasicSEO(
        ?string $title = null,
        ?string $description = null,
        ?string $canonicalUrl = null,
        string $robots = 'index, follow',
        array|Collection $keywords = []
    ): void {
        SEOTools::setTitle($title ?? 'Default Title');
        SEOTools::setDescription($description ?? 'Default Description');
        SEOTools::setCanonical($canonicalUrl);
        SEOMeta::addMeta('robots', $robots);
        if (!empty($keywords)) {
            SEOMeta::addKeyword($keywords);
        }
    }

    /**
     * Set Open Graph SEO meta tags (URL, Type, Image, Locale)
     *
     * @param string $url
     * @param string $type
     * @param string|null $imageUrl
     * @param string|null $locale
     * @return void
     */
    protected function setOpenGraphSEO(
        string $url,
        string $type,
        ?string $imageUrl = null,
        ?string $locale = null
    ): void {
        SEOTools::opengraph()->setUrl($url);
        if ($imageUrl) {
            SEOTools::opengraph()->addImage($imageUrl, ['width' => 300]);
        }
        SEOTools::opengraph()->addProperty('type', $type);
        SEOTools::opengraph()->addProperty('locale', $locale ?? app()->getLocale()); // Default to app's locale
    }

    /**
     * Set Twitter SEO meta tags (Title, Image)
     *
     * @param string|null $title
     * @param string|null $imageUrl
     * @return void
     */
    protected function setTwitterSEO(?string $title = null, ?string $imageUrl = null): void
    {
        SEOTools::twitter()->setTitle($title ?? 'Default Title');
        if ($imageUrl) {
            SEOTools::twitter()->setImage($imageUrl);
        }
    }

    /**
     * Set JSON-LD SEO meta tags (Title, Description, Type, Image)
     *
     * @param string|null $title
     * @param string|null $description
     * @param string|null $type
     * @param string|null $imageUrl
     * @return void
     */
    protected function setJsonLdSEO(
        ?string $title = null,
        ?string $description = null,
        ?string $type = null,
        ?string $imageUrl = null
    ): void {
        SEOTools::jsonLd()->setType($type ?? 'WebPage'); // Default to WebPage if no type provided
        SEOTools::jsonLd()->setTitle($title ?? 'Default Title');
        SEOTools::jsonLd()->setDescription($description ?? 'Default Description');
        if ($imageUrl) {
            SEOTools::jsonLd()->addImage($imageUrl);
        }
    }

    /**
     * Cache SEO data for a specified TTL (Time-To-Live)
     *
     * @param string $key
     * @param mixed $data
     * @return void
     */
    protected function cacheSEOData(string $key, $data): void
    {
        Cache::put($key, $data, self::CACHE_TTL);
    }

    /**
     * Retrieve cached SEO data
     *
     * @param string $key
     * @return mixed
     */
    protected function getCachedSEOData(string $key)
    {
        return Cache::get($key);
    }
}
