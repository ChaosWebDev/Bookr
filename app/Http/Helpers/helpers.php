<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\{Auth, Cache, Storage};

function getPath(string $title): string
{
    $user = Auth::user();
    $disk = Storage::disk('books');

    $basePath = $user->info?->path ?? Cache::rememberForever("user.path.{$user->id}", function () use ($user) {
        $hash = md5(strtolower(trim($user->email)));
        $chunks = str_split($hash, 3);
        return implode('/', array_slice($chunks, 0, 3));
    });

    $filename = Str::slug($title, '-') . '.json';
    $relativePath = "{$basePath}/{$filename}";

    if (!$disk->exists($basePath)) {
        $disk->makeDirectory($basePath);
    }

    return $disk->path($relativePath);
}
