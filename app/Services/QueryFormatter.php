<?php

namespace App\Services;

class QueryFormatter
{
    /**
     * Format order by query
     *
     * @param string $url
     * @return string
     */
    public static function formatOrderBy(string $url)
    {
        if (!strpos($url, '?')) {
            return $url . '?';
        }

        $result = strpos($url, 'page');

        if ($result) {
            $exploded = explode('page', $url);

            $urlWithoutPage = $exploded[0];

            if ((strpos($urlWithoutPage, 'oldest'))) {
                $exploded = explode('oldest', $urlWithoutPage);

                return $exploded[0];
            }

            if ((strpos($urlWithoutPage, 'newest'))) {
                $exploded = explode('newest', $urlWithoutPage);

                return $exploded[0];
            }

            return $exploded[0];
        }

        if ((strpos($url, 'oldest'))) {
            $exploded = explode('oldest', $url);

            return $exploded[0];
        }

        if ((strpos($url, 'newest'))) {
            $exploded = explode('newest', $url);

            return $exploded[0];
        }

        return $url . '&';
    }

    /**
     * Check if newest in query string
     *
     * @param string $url
     * @return bool
     */
    public static function checkNewest(string $url)
    {
        if (strpos($url, 'newest')) {
            return true;
        }

        return false;
    }
}
