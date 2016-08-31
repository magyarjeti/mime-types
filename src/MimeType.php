<?php

namespace Magyarjeti\MimeTypes;

class MimeType
{
    /**
     * @var string
     */
    public $mimeType;

    /**
     * @var array
     */
    public $fileExtensions = [];

    /**
     * Create new class instance.
     *
     * @param FileLine $line
     */
    public function __construct(FileLine $line)
    {
        $line = (string) $line;

        $this->fileExtensions = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);

        $this->mimeType = array_shift($this->fileExtensions);
    }
}
