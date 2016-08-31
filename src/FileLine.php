<?php

namespace Magyarjeti\MimeTypes;

class FileLine
{
    /**
     * The wrapped line.
     *
     * @var string
     */
    protected $line;

    /**
     * Create new line instance.
     *
     * @param string $line
     * @return void
     */
    public function __construct($line)
    {
        $this->line = trim($line);
    }

    /**
     * Determine if the line starts with the given string.
     *
     * @param string $string
     * @return boolean
     */
    public function startsWith($string)
    {
        return substr($this->line, 0, strlen($string)) === $string;
    }

    /**
     * Convert object to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->line;
    }
}
