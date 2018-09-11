<?php
namespace IEXBase\RippleAPI\Support;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

class Collection implements ArrayAccess, Countable, IteratorAggregate
{
    /**
     * Элементы, содержащиеся в коллекции.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Создайте новую коллекцию.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Возвращает значение поля из узла.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getField($name, $default = null)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }

        return $default;
    }

    /**
     * Возвращает значение именованного свойства
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getProperty($name, $default = null)
    {
        return $this->getField($name, $default);
    }

    /**
     * Возвращает список всех полей, заданных на объекте.
     *
     * @return array
     */
    public function getFieldNames()
    {
        return array_keys($this->items);
    }

    /**
     * Возвращает список всех свойств, заданных на объекте.
     *
     * @return array
     */
    public function getPropertyNames()
    {
        return $this->getFieldNames();
    }

    /**
     * Получите все предметы в коллекции.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Получите коллекцию элементов как простой массив.
     *
     * @return array
     */
    public function asArray()
    {
        return array_map(function ($value) {
            return $value instanceof Collection ? $value->asArray() : $value;
        }, $this->items);
    }

    /**
     * Запустите карту по каждому из элементов.
     *
     * @param \Closure $callback
     * @return static
     */
    public function map(\Closure $callback)
    {
        return new static(array_map($callback, $this->items, array_keys($this->items)));
    }

    /**
     * Получить первый элемент из коллекции.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function first(callable $callback = null, $default = null)
    {
        return Arr::first($this->items, $callback, $default);
    }


    /**
     * Запускаем фильтр по каждому из элементов.
     *
     * @param  callable|null  $callback
     * @return static
     */
    public function filter(callable $callback = null)
    {
        if ($callback) {
            return new static(Arr::where($this->items, $callback));
        }
        return new static(array_filter($this->items));
    }

    /**
     * Получите коллекцию предметов как JSON.
     *
     * @param int $options
     * @return string
     */
    public function asJson($options = 0)
    {
        return json_encode($this->asArray(), $options);
    }

    /**
     * Подсчитайте количество элементов в коллекции.
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Получите итератор для элементов.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Определите, существует ли элемент в смещении.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Получить элемент с заданным смещением.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * Установите элемент с заданным смещением.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Отсоедините элемент при заданном смещении.
     *
     * @param string $key
     *
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }

    /**
     * Преобразуйте коллекцию в ее строковое представление.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->asJson();
    }
}