<?php

namespace Magyarjeti\MimeTypes;

use IteratorAggregate;

class MimeTypeDictionary implements IteratorAggregate
{
    /**
     * @var FileReader
     */
    protected $reader;

    /**
     * Create new class instance.
     *
     * @param FileReader $reader
     */
    public function __construct(FileReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Get the mime type definitions.
     *
     * @return MimeType
     */
    public function getIterator()
    {
        foreach ($this->reader as $line) {
            if ($this->isComment($line)) {
                continue;
            }

            yield new MimeType($line);
        }
    }

    /**
     * Determine if the line is a comment.
     *
     * @param FileLine $line
     * @return boolean
     */
    protected function isComment(FileLine $line)
    {
        return $line->startsWith('#');
    }
}
