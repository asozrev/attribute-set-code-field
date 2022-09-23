<?php

declare(strict_types=1);

namespace Ewave\AttributeSetCode\Model\Resolver;

use Magento\Catalog\Api\AttributeSetRepositoryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class AttributeSetCodeResolver implements ResolverInterface
{
    /**
     * @var AttributeSetRepositoryInterface
     */
    private $attributeSetRepository;

    public function __construct(
        AttributeSetRepositoryInterface $attributeSetRepository
    ) {
        $this->attributeSetRepository = $attributeSetRepository;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        return $this->attributeSetRepository->get($value['attribute_set_id'])->getAttributeSetName();
    }
}



