<?php declare(strict_types=1);

namespace LDL\Type\Collection\Types\String;

use LDL\Type\Collection\AbstractCollection;
use LDL\Type\Collection\Interfaces\Validation\HasAppendValidatorChainInterface;
use LDL\Type\Collection\Traits\Validator\AppendValidatorChainTrait;
use LDL\Type\Collection\Validator\UniqueValidator;
use LDL\Validators\StringValidator;

class UniqueStringCollection extends AbstractCollection implements HasAppendValidatorChainInterface
{
    use AppendValidatorChainTrait;

    public function __construct(iterable $items = null)
    {
        parent::__construct($items);

        $this->getAppendValidatorChain()
            ->appendMany([new StringValidator(true), new UniqueValidator(true)])
            ->lock();
    }
}