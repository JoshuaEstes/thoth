<?php
/**
 */

namespace Thoth;

/**
 */
class Page implements PageInterface
{
    protected $permalink;
    protected $source;
    protected $destination;

    /**
     * {@inheritdoc}
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * {@inheritdoc}
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * {@inheritdoc}
     */
    public function getDestination()
    {
        return $this->destination;
    }
}
