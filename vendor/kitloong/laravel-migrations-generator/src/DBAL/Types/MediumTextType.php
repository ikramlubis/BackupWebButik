<?php

namespace KitLoong\MigrationsGenerator\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class MediumTextType extends Type
{
    /**
     * Implement to respect the contract. Generator is not using this method.
     * Can safely ignore.
     *
     * @codeCoverageIgnore
     * @inheritDoc
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'MEDIUMTEXT';
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return '';
    }
}
