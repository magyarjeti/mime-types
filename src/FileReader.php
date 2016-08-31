<?php

namespace Magyarjeti\MimeTypes;

use RuntimeException;
use SplFileObject;
use IteratorAggregate;

class FileReader implements IteratorAggregate
{
    /**
     * The wrapped file pointer.
     *
     * @var resource
     */
    protected $fp;

    /**
     * Create new file reader instance.
     *
     * @param string $source
     * @return void
     */
    public function __construct($source)
    {
        $this->fp = fopen($source, 'r');

        if ($this->fp === false) {
            throw new RuntimeException("Could not open file $source");
        }
    }

    /**
     * Tests for end-of-file on a file pointer.
     *
     * @return boolean
     */
    public function hasMore()
    {
        return !feof($this->fp);
    }

    /**
     * Read a single line from the file.
     *
     * @return FileLine
     */
    public function readLine()
    {
        return new FileLine(fgets($this->fp));
    }

    /**
     * Iterate over lines.
     *
     * @return FileLine
     */
    public function getIterator()
    {
        while ($this->hasMore()) {
            yield $this->readLine();
        }
    }
}
