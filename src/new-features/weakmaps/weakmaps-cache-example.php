<?php
/**
 * An artificial example on how to use the WeakMap class to organize some caching.
 */
abstract class Product
{
}

class ProductA extends Product
{
}

class ProductB extends Product
{
}

class Rate
{
    /**
     * @param Product $product
     * @return int
     */
    public function getRate(Product $product): int
    {
        return $this->evaluateRate();
    }

    /**
     * Returns a random rating value.
     */
    private function evaluateRate(): int
    {
        return rand(1, 10);
    }
}

class RateRepository
{
    private Rate $rate;

    private WeakMap $cache;

    public function __construct(Rate $rate)
    {
        $this->cache = new WeakMap();
        $this->rate = $rate;
    }

    /**
     * @param Product $product
     * @return int
     */
    public function getRateByProduct(Product $product): int
    {
        if (!isset($this->cache[$product])) {
            $this->cache[$product] = $this->rate->getRate($product);
        }

        return $this->cache[$product];
    }

    /**
     * @return int
     */
    public function getCacheCount(): int
    {
        return count($this->cache);
    }
}

$repo = new RateRepository(new Rate());
$productA = new ProductA();
$productB = new ProductB();

$firstTimeRateForA = $repo->getRateByProduct($productA);
assert(1 === $repo->getCacheCount());
$cachedRateForA = $repo->getRateByProduct($productA);
assert($firstTimeRateForA === $cachedRateForA);
echo 'The number of cached items ' . $repo->getCacheCount() . PHP_EOL;

$firstTimeRateForB = $repo->getRateByProduct($productB);
assert(2 === $repo->getCacheCount());
$cachedForB = $repo->getRateByProduct($productB);
assert($firstTimeRateForB === $cachedForB);
echo 'The number of cached items ' . $repo->getCacheCount() . PHP_EOL;

unset($productA);

assert(1 === $repo->getCacheCount());
echo 'The number of cached items ' . $repo->getCacheCount() . PHP_EOL;
