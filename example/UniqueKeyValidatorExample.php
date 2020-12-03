<?php declare(strict_types=1);

require '../vendor/autoload.php';

use LDL\Type\Collection\AbstractCollection;
use LDL\Type\Collection\Interfaces\Validation\HasKeyValidatorChainInterface;
use LDL\Type\Collection\Traits\Validator\KeyValidatorChainTrait;
use LDL\Type\Collection\Validator\UniqueKeyValidator;
use LDL\Type\Collection\Exception\CollectionKeyException;

class UniqueKeyValidatorExample extends AbstractCollection implements HasKeyValidatorChainInterface
{
    use KeyValidatorChainTrait;

    public function __construct(iterable $items = null)
    {
        parent::__construct($items);

        $this->getKeyValidatorChain()
            ->append(new UniqueKeyValidator($strict=true));
    }
}

echo "Create collection instance\n";

$collection = new UniqueKeyValidatorExample();

echo "Add element test with key 213\n";

$collection->append('test', '213');

try {

    echo "Try to add element with key 213 AGAIN, Exception must be thrown\n";
    $collection['213'] = 'test';

}catch(CollectionKeyException $e){
    echo "EXCEPTION: {$e->getMessage()}\n";
}