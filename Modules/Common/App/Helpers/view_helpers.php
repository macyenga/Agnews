<?php

use Illuminate\Support\Facades\Route;

function active_menu($menu, $class = 'current'): string
{
    if (isset($menu['url']) && url()->current() === $menu['url']) {
        return $class;
    }
    if (! array_key_exists('active_routes', $menu)) {
        return '';
    }
    foreach ($menu['active_routes'] as $url) {
        if (Route::currentRouteName() === $url) {
            return $class;
        }
    }

    return '';
}

// Removed JalalianHelper and jalalian() function

function status_class($status): string
{
    return ($status) ? 'text-success' : 'text-danger';
}

function status_message($status): string
{
    return ($status) ? __('active') : __('inactive');
}

function nullable_value($value): string
{
    return $value ?: __('have_not');
}

// Replace the Jalali date formatting with standard Gregorian date format
function front_date_format($date): string
{
    return \Carbon\Carbon::parse($date)->format(config('common.front_date_format'));
}

function front_active_menu($url, $class = 'active'): string
{
    return request()->url() === $url ? $class : '';
}
