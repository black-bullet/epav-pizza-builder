<?php

namespace AppBundle\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * StatusType class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class StatusType extends AbstractEnumType
{
    const PREPARING   = 'PR';
    const COOKING     = 'CO';
    const DONE        = 'DO';
    const IN_CUSTOMER = 'IN';
    const CANCELED    = 'CA';

    protected static $choices = [
        self::PREPARING   => 'Preparing order',
        self::COOKING     => 'Cooking order',
        self::DONE        => 'Done order',
        self::IN_CUSTOMER => 'In customer order',
        self::CANCELED    => 'Canceled order',
    ];
}
