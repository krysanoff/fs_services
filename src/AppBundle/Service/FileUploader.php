<?php
/**
 * @license MIT
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 *
 */
class FileUploader
{
    /**
     * Upload directory
     *
     * @var $targetDir
     */
    private $targetDir;

    /**
     * FileUploader constructor.
     *
     * @param string $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     *
     * @return null|string
     */
    public function upload(UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();

        $file->move($this->getTargetDir(), $filename);

        return $filename;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}