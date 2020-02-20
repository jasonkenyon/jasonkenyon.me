<?php

namespace App;

use Parsedown as BaseParsedown;

class CustomParsedown extends BaseParsedown
{
    protected $config;

    public function __construct()
    {
        $jigsawConfig = new GetJigsawConfig();
        $this->config = $jigsawConfig->get();
    }

    /**
     * Extra link handling
     *
     * @param  array  $Excerpt
     *
     * @return array
     */
    protected function inlineLink($Excerpt)
    {
        $Link = parent::inlineLink($Excerpt);
        if (!isset($Link)) {
            return null;
        }

        $isAnchorLink = false;
        $href = $Link['element']['attributes']['href'];
        $ext = strtolower(pathinfo($href, PATHINFO_EXTENSION));
        $isImage = in_array($ext, ['gif', 'jpg', 'jpeg', 'png', 'svg']);

        // 1. Add target and rel to external links
        if ($this->isExternalUrl($href) && !$isImage) {
            $Link['element']['attributes']['target'] = '_blank';
            $Link['element']['attributes']['rel'] = 'noopener';
        } else {

            // 2. Add scroll-to class to anchor links
            if (preg_match('/#(.+)/', $href, $matches)) {
                $Link['element']['attributes']['class'] = 'scroll-to';
                $isAnchorLink = true;
            }

            // 3. Correct relative paths based on build environment
            if (!$isImage && $this->config) {
                if (!$this->config->pretty) {
                    $Link['element']['attributes']['href'] = str_replace('/',
                        '.html', ltrim($href, '/'));
                } else {
                    // Set href depending on whether it's a link to some-other-page/#anchor or just an in-page #anchor
                    if (preg_match('/^(.+)?(?=#)/', $href, $hits)) {
                        $href = $hits[0] ? '../'.$href : $href;
                    }
                    $Link['element']['attributes']['href'] = $href;
                }
            }

        }

        return $Link;
    }

    /**
     * Check if a URL is internal or external
     *
     * @param  string  $url
     * @param  null  $internalHostName
     *
     * @return bool
     */
    protected function isExternalUrl($url, $internalHostName = null)
    {
        $components = parse_url($url);
        $internalHostName = !$internalHostName && isset($_SERVER['HTTP_HOST'])
            ? $_SERVER['HTTP_HOST'] : $internalHostName;
        // we will treat url like '/relative.php' as relative
        if (empty($components['host'])) {
            return false;
        }
        // url host looks exactly like the local host
        if (strcasecmp($components['host'], $internalHostName) === 0) {
            return false;
        }

        $isNotSubdomain = strrpos(strtolower($components['host']),
                '.'.$internalHostName) !== strlen($components['host'])
            - strlen('.'.$internalHostName);

        return $isNotSubdomain;
    }
}