<?php

/*
 * This file is part of the DunglasApiBundle package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dunglas\ApiBundle\Doctrine\Orm\Extension;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\QueryCollectionExtensionInterface;

/**
 * Apply selected ordering while querying resource collection.
 *
 * @author Samuel ROZE <samuel.roze@gmail.com>
 */
class OrderExtension implements QueryCollectionExtensionInterface
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @param string|null $order
     */
    public function __construct($order = null)
    {
        $this->order = $order;
    }

    /**
     * {@inheritdoc}
     */
    public function applyToCollection(ResourceInterface $resource, QueryBuilder $queryBuilder)
    {
        if (null !== $this->order) {
            $queryBuilder->addOrderBy('o.id', $this->order);
        }
    }
}
