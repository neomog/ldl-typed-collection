<?php declare(strict_types=1);

namespace LDL\Type\Collection\Types\Double;

use LDL\Validators\DoubleValidator;
use LDL\Type\Collection\AbstractTypedCollection;
use LDL\Type\Collection\Interfaces\Type\DoubleCollectionInterface;
use LDL\Type\Collection\Traits\Validator\AppendValueValidatorChainTrait;
use LDL\Type\Collection\Types\Double\Traits\ToDoublePrimitiveArrayTrait;
use LDL\Type\Collection\Interfaces\Validation\HasAppendValueValidatorChainInterface;
use LDL\Type\Collection\Traits\Types\Double\FilterUniqueDoubleCollectionInterfaceTrait;

final class UnsignedDoubleCollection extends AbstractTypedCollection implements DoubleCollectionInterface
{
    use FilterUniqueDoubleCollectionInterfaceTrait;
    use ToDoublePrimitiveArrayTrait;

    public function __construct(iterable $items = null)
    {
        $this->getAppendValueValidatorChain()
            ->getChainItems()
            ->append(new DoubleValidator(false,null,true))
            ->lock();

        parent::__construct($items);
    }

}