<?php

namespace Application\Events;

use Nishchay\Attributes\Event\Event as EventAttribute;
use Nishchay\Attributes\Event\EventConfig;

/**
 * Description of Event
 *
 * @author bhavik
 */
#[EventAttribute]
class Event
{

    #[EventConfig(type: 'context', name: 'Application', when: 'before')]
    public function testEvent()
    {
        
    }

}
