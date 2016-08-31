<?php

namespace Magyarjeti\MimeTypes;

use InvalidArgumentException;

class MimeTypeConverter
{
    /**
     * A file extension => mime type dictionary.
     *
     * @var array
     */
    protected $dict = [];

    /**
     * Create a new instance.
     *
     * @param string $data_source
     */
    public function __construct($data_source = null)
    {
        $default_source = __DIR__ . '/../resources/mime.types';

        $this->load($data_source ?: $default_source);
    }

    /**
     * Convert a mime type to the proper file extension.
     *
     * @param string $mime_type
     * @return string|null
     */
    public function toExtension($mime_type)
    {
        $mime_type = strtolower($mime_type);

        return array_search($mime_type, $this->dict) ?: null;
    }

    /**
     * Convert a file extension to the proper mime type.
     *
     * @param string $extension
     * @return string|null
     */
    public function toMimeType($extension)
    {
        $extension = strtolower($extension);

        if (array_key_exists($extension, $this->dict)) {
            return $this->dict[$extension];
        }
    }

    /**
     * Load the Apache mime.types file.
     *
     * @param string $source Local or remote location of the mime.types file.
     * @return void
     */
    protected function load($source)
    {
        $reader = new FileReader($source);

        $dictionary = new MimeTypeDictionary($reader);

        foreach ($dictionary as $entry) {
            $this->dict += array_fill_keys(
                $entry->fileExtensions,
                $entry->mimeType
            );
        }
    }
}
