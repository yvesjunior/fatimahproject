<?php

namespace App\Services;

use ImageKit\ImageKit;
use RuntimeException;

class ImageKitService
{
    protected ImageKit $client;

    protected string $folder;

    public function __construct()
    {
        $public = config('services.imagekit.public_key');
        $private = config('services.imagekit.private_key');
        $endpoint = config('services.imagekit.url_endpoint');

        if (empty($public) || empty($private) || empty($endpoint)) {
            throw new RuntimeException('ImageKit is not configured. Set IMAGEKIT_PUBLIC_KEY, IMAGEKIT_PRIVATE_KEY and IMAGEKIT_URL_ENDPOINT.');
        }

        $this->client = new ImageKit($public, $private, $endpoint);
        $this->folder = config('services.imagekit.folder', '/portfolio');
    }

    public function configured(): bool
    {
        return true;
    }

    /**
     * Upload raw file contents to ImageKit and return ['url' => ..., 'fileId' => ...].
     */
    public function upload(string $contents, string $fileName): array
    {
        $response = $this->client->upload([
            'file' => base64_encode($contents),
            'fileName' => $fileName,
            'folder' => $this->folder,
            'useUniqueFileName' => true,
        ]);

        if (! empty($response->error)) {
            $message = $response->error->message ?? json_encode($response->error);
            throw new RuntimeException("ImageKit upload failed: {$message}");
        }

        return [
            'url' => $response->result->url,
            'fileId' => $response->result->fileId,
        ];
    }

    /**
     * Upload a local file path to ImageKit.
     */
    public function uploadPath(string $path, ?string $fileName = null): array
    {
        if (! is_file($path)) {
            throw new RuntimeException("File not found for ImageKit upload: {$path}");
        }

        return $this->upload(file_get_contents($path), $fileName ?? basename($path));
    }

    /**
     * Delete a file from ImageKit by its fileId. Silently ignores empty ids.
     */
    public function delete(?string $fileId): void
    {
        if (empty($fileId)) {
            return;
        }

        $this->client->deleteFile($fileId);
    }
}
