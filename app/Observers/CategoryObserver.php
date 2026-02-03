<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use Webkul\Category\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "saved" event.
     * Fires on both create and update.
     */
    public function saved(Category $category): void
    {
        $this->clearCategoryCache();
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $this->clearCategoryCache();
    }

    /**
     * Clear category cache for all channels and locales.
     * Targets specific keys to avoid flushing entire Redis database.
     */
    protected function clearCategoryCache(): void
    {
        foreach (core()->getAllChannels() as $channel) {
            foreach (core()->getAllLocales() as $locale) {
                Cache::forget('category_tree_' . $channel->id . '_' . $locale->code);
            }
        }
    }
}
