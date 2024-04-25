<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->route('user');
        $store = $request->route('store');

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
            ],
            'current' => $store ? [
                'store' => $store,
                'categories' => $store->storeCategory->categories ?? []
            ] : null,
            'routes' => [
                'home' => [
                    'user' =>  $user ? $user->username : null,
                    'store' => $store ? $store->slug : null
                ],
            ],
        ];
    }
}
