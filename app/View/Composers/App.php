<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;


class App extends Composer
{
    use AcfFields;
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'fields' => collect($this->fields())->toArray(),
            'siteName' => $this->siteName(),
            'menus' => $this->getAllMenus(),
            'calendars' => $this->getAllCalendars(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function getAllMenus()
    {
        $args = [
            'post_type' => 'menu',
            'posts_per_page' => -1,
        ];

        $query = new \WP_Query( $args );

        return $query;
    }

    public function getAllCalendars()
    {
        $args = [
            'post_type' => 'kalendarz',
            'posts_per_page' => -1,
        ];

        $query = new \WP_Query( $args );

        return $query;
    }
}
