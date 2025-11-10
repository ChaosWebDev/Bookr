<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $disk = Storage::disk('books');

        $hash = md5(strtolower(trim($user->email)));
        $chunks = str_split($hash, 3);
        $basePath = implode('/', array_slice($chunks, 0, 3));

        if (!$disk->exists($basePath)) {
            $disk->makeDirectory($basePath);
        }

        // Since info is a casted JSON object, just update the property
        $user->info = (object) array_merge((array) $user->info, [
            'path' => $disk->path($basePath),
            'books' => [],
        ]);

        // Use updateQuietly() to avoid recursion
        $user->updateQuietly([
            'info' => $user->info,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
