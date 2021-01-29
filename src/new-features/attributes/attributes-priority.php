<?php
/**
 * An artificial example on how the attributes can be used for organizing a simple execution priority.
 */

/**
 * Attribute::TARGET_FUNCTION guarantees that this Attribute can be used only on function declarations.
 */
#[\Attribute(Attribute::TARGET_FUNCTION)]
class Priority
{
    public int $priority;

    public function __construct(int $priority)
    {
        $this->priority = $priority;
    }
}

#[Priority(5)]
function doSomethingWithMediumPriority()
{
    echo 'Do something with medium priority.' . PHP_EOL;
}

#[Priority(10)]
function doSomethingWithLowPriority()
{
    echo 'Do something with low priority.' . PHP_EOL;
}

#[Priority(1)]
function doSomethingWithHighPriority()
{
    echo 'Do something with high priority.' . PHP_EOL;
}

function doSomethingWithoutPriority()
{
    assert(false, 'This ' . __METHOD__ . ' must never be called.');
}

class PriorityManager
{
    private array $functions = [];

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        $functions = get_defined_functions()['user'] ?? [];

        foreach ($functions as $function) {
            try {
                $reflection = new \ReflectionFunction($function);
            } catch (ReflectionException $e) {
                die('Reflection error ' . $e->getMessage() . PHP_EOL);
            }

            /**
             * The getAttributes() on Reflection instance returns all available attributes.
             */
            $attributes = $reflection->getAttributes(Priority::class);

            if (count($attributes) > 0) {
                /**
                 * The newInstance() instantiates the Attribute class, then we get a priority value from it's public
                 * property. It is possible to get the Attribute class arguments without its instantiation.
                 * For more information feel free to see the attributes-basics.php example.
                 */
                $priority = $attributes[0]->newInstance()->priority;

                if (array_key_exists($priority, $this->functions)) {
                    die('The priority ' . $priority . ' on ' . $function . ' is duplicated. Priorities must be unique.' . PHP_EOL);
                }

                $this->functions[$priority] = $function;
            }
        }
    }

    public function handle(): int
    {
        ksort($this->functions);

        $executed = 0;
        foreach ($this->functions as $function) {
            $function();
            ++$executed;
        }

        return $executed;
    }
}

$handler = new PriorityManager();
$handled = $handler->handle();

assert(3 === $handled, 'The filtered array must contain 3 elements.');

echo 'The sequence was processed as expected.' . PHP_EOL;
