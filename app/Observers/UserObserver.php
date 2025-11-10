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

        $basePath = md5(strtolower(trim($user->email)));

        if (!$disk->exists($basePath)) {
            $disk->makeDirectory($basePath);
        }

        $user->info = (object) array_merge((array) $user->info, [
            'path' => $basePath, // store relative path, not absolute
            'books' => $user->info?->books ?? []
        ]);

        $user->updateQuietly(['info' => $user->info]);
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
