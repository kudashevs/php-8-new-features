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

/*
 * This RateRepository class contains an example of how to use the WeakMap class to organize objects caching.
 *
 * The method getRateByProduct() accepts an instance of the Product class and it tries to find an instance cache
 * in storage by using the instance as a key (the storage is based on the WeakMap class). If the cache of a product
 * does not exist in the storage the method will ask the Rate class to evaluate the rating for this product. After
 * evaluation, it will store the rating value under the product object key in the storage and return it. Otherwise,
 * if the cache of the product exists the cached rating value will be returned from the storage without any evaluations.
 */
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

/*
 * After the first request, a rating value for a ProductA instance should be evaluated and its value
 * should be cached in the WeakMap class storage. So, we are checking the number of cached items
 * in the storage and the equality of the values obtained from the first and second requests.
 */
$firstTimeRateForA = $repo->getRateByProduct($productA);
assert(1 === $repo->getCacheCount());
$cachedRateForA = $repo->getRateByProduct($productA);
assert($firstTimeRateForA === $cachedRateForA);

/*
 * After the first request, a rating value for a ProductB instance should be evaluated and its value
 * should be added in the WeakMap class storage. So, we are checking the number of cached items
 * in the storage and the equality of the values obtained from the first and second requests.
 */
$firstTimeRateForB = $repo->getRateByProduct($productB);
assert(2 === $repo->getCacheCount());
$cachedForB = $repo->getRateByProduct($productB);
assert($firstTimeRateForB === $cachedForB);

/*
 * The ProductA instance is unset because it is no longer in use (it could be any reason).
 */
unset($productA);

/*
 * Since the ProductA instance was unset the number of cached items is expected to decrease.
 */
assert(1 === $repo->getCacheCount());

echo 'The specific values were evaluated, cached, and destroyed as expected.' . PHP_EOL;
