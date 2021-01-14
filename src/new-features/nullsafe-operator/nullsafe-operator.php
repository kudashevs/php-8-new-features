<?php
/**
 * An artificial example on how to use nullsafe operator in long calls/properties chains.
 */
class Product
{
    public function __construct(protected ReferenceGuide|null $guide = null)
    {
    }

    public function getFacts(): ReferenceGuide|null
    {
        return $this->guide;
    }
}

class ReferenceGuide
{
    public function getCreatedDate(): DateTime|null
    {
        return DateTime::createFromFormat('U', 805201200);
    }

    public function getExpiredDate(): DateTime|null
    {
        return null;
    }
}

$product = new Product(new ReferenceGuide());

/*
 * We should use the nullsafe operator at any place of the calls/properties chain where null might happen.
 * This helps us to avoid 'Attempt to read on property null'/'Call to a member function on null' errors.
 */
$createDate = $product->getFacts()?->getCreatedDate()?->format('\c\r\e\a\t\e\d \o\n d.m.Y') ?? 'not created yet';
$expiryDate = $product->getFacts()?->getExpiredDate()?->format('\e\x\p\i\r\e\d \o\n d.m.Y') ?? 'not expired yet';

assert(is_string($createDate), 'The create date was not assigned as expected.');
assert(is_string($expiryDate), 'The expiry date was not assigned as expected.');

echo 'The Product ' . $createDate . ' and ' . $expiryDate . '.' . PHP_EOL;
