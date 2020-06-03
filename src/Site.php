<?php

namespace Thoth;

class Site implements SiteInterface
{
    /**
     * @var PageInterface[]
     */
    protected $pages = [];

    /**
     * {@inheritdoc}
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * {@inheritdoc}
     */
    public function addPage(PageInterface $page)
    {
        $this->pages[$page->getPermalink()] = $page;
    }

    /**
     * @todo
     * Checks to see if the Page exists on the site
     *
     * @param PageInterface $page
     *
     * @return bool
     */
    public function hasPage(PageInterface $page)
    {
        return false;
    }
}
