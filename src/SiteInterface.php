<?php
/**
 */

namespace Thoth;

/**
 * The SiteInterface holds everything related to the Site. This includes pages,
 * posts, and related configuration data.
 */
interface SiteInterface
{
    /**
     * Returns the known pages for the site
     *
     * @return PageInterface[]
     */
    public function getPages();

    /**
     * Adds a page to the site
     *
     * @param PageInterface $page
     *
     * @throws Exception
     *   An exception will be thrown if a page at this permalink already exists
     *
     * @return self
     */
    public function addPage(PageInterface $page);

    /**
     * @return PostInterface
     */
    //public function getPosts();
}
