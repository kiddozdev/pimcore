<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\DataObject\Import\Resolver;

/**
 * @deprecated since v6.9 and will be removed in Pimcore 10.
 */
abstract class AbstractResolver implements ResolverInterface
{
    protected function getIdColumn(\stdClass $config)
    {
        return $config->resolverSettings->column;
    }

    protected function setObjectType($config, $object, $rowData)
    {
        $objectType = $config->resolverSettings->objectType;

        if ($objectType == 'dynamic') {
            $typeColumn = $config->resolverSettings->columnObjectType;
            $objectType = $rowData[$typeColumn];
            $object->setType($objectType);
        } elseif ($objectType != 'keep') {
            $object->setType($objectType);
        }

        return $object;
    }
}
