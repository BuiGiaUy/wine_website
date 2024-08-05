<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $menus = Menu::all();

            // Ensure menus is not empty
            if ($menus->isEmpty()) {
                $menuTree = [];
            } else {
                $menuTree = $this->buildTree($menus);
            }

            // Pass the menu tree to all views
            $view->with('menuTree', $menuTree);
        });
    }

    private function buildTree($menus, $parentId = null)
    {
        $branch = [];

        // Iterate over each menu item
        foreach ($menus as $menu) {
            // If the menu item's parent_id matches the current parentId, it's a child
            if ($menu->parent_id == $parentId) {
                // Recursively find children of this menu item
                $children = $this->buildTree($menus, $menu->id);

                // If children exist, add them to the current menu item
                if ($children) {
                    $menu->children = $children;
                }

                // Add the current menu item to the branch
                $branch[] = $menu;
            }
        }

        return $branch;
    }
}
