<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10.03.19
 * Time: 20:15
 */

namespace Foundation\Generator\Events;


use Foundation\Generator\Abstracts\ResourceGeneratedEvent;

/**
 * Class JobGeneratedEvent
 * @package Foundation\Generator\Events
 */
class JobGeneratedEvent extends ResourceGeneratedEvent
{
    public function isSynchronous(): bool
    {
        return $this->getStubOption('sync');
    }
}
