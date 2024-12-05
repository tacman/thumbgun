<?php

declare(strict_types=1);

namespace App\Core\Source;

use App\Core\Image\ImageInterface;
use App\Core\Image\ImmutableImage;
use Aws\S3\S3Client;
use Psr\Http\Message\StreamInterface;

final class AWSS3ImageSource implements ImageSourceInterface
{
    public function __construct(private readonly S3Client $s3Client, private readonly string $s3Bucket)
    {
    }

    /** {@inheritDoc} */
    public function __invoke(string $imageId, string $imageFormat): ImageInterface
    {
        return new ImmutableImage($imageId, $imageFormat, function () use ($imageId): string {
            $object = $this->s3Client->getObject([
                'Key' => $imageId,
                'Bucket' => $this->s3Bucket,
            ]);

            /** @var StreamInterface $body */
            $body = $object['Body'];

            return $body->getContents();
        });
    }
}
