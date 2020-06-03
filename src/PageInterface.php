<?php
/**
 */

namespace Thoth;

/**
 */
interface PageInterface
{
    /**
     * Returns the permalink for this page.
     *
     * @return string
     */
    public function getPermalink();

    /**
     * Returns the path of the file used as the source for this page
     *
     * Example: /path/to/file.md
     *
     * @return string
     */
    public function getSource();

    /**
     * Returnst the path to the destination file
     *
     * Example: /path/to/file.html
     *
     * @return string
     */
    public function getDestination();
}
