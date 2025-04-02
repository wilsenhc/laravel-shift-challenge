<?php

if (! function_exists('service_url')) {
    /**
     * Get the service_url.
     */
    function service_url(?string $service, string $repository): string
    {
        return 'https://github.com/'.$repository;
    }
}

if (! function_exists('pr_name')) {
    /**
     * Get the pr_name.
     */
    function pr_name(?string $service): string
    {
        return \Faker\Factory::create()->sentence();
    }
}
