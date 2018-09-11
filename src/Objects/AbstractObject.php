<?php
namespace IEXBase\RippleAPI\Objects;

use IEXBase\RippleAPI\Support\Collection;

abstract class AbstractObject extends Collection
{
    /**
     * Имена ключей объектов
     *
     * @var array
     */
    protected static $objectMap = [];

    /**
     * Создаем новый абстрактный класс AbstractObject
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($this->castItems($data));
    }

    /**
     * Возвращает все элементы в виде массива.
     *
     * @param array $data
     * @return array
     */
    public function castItems(array $data)
    {
        $items = [];
        foreach ($data as $k => $v) {
            $items[$k] = $v;
        }
        return $items;
    }

    /**
     * Отключает любые автоматические типы данных.
     * В основном обратная сторона castItems().
     *
     * @return array
     */
    public function uncastItems()
    {
        $items = $this->asArray();

        return array_map(function ($v) {
            if ($v instanceof \DateTime) {
                return $v->format(\DateTime::ISO8601);
            }

            return $v;
        }, $items);
    }

    /**
     * Получите коллекцию предметов как JSON.
     *
     * @param int $options
     * @return string
     */
    public function asJson($options = 0)
    {
        return json_encode($this->uncastItems(), $options);
    }

    /**
     * Обнаруживает форматированную строку ISO 8601.
     *
     * @param string $string
     * @return boolean
     *
     * @see http://www.cl.cam.ac.uk/~mgk25/iso-time.html
     * @see http://en.wikipedia.org/wiki/ISO_8601
     */
    public function isIso8601DateString($string)
    {
        // Это безумное регулярное выражение было отнято отсюда:
        // http://www.pelagodesign.com/blog/2009/05/20/iso-8601-date-validation-that-doesnt-suck/
        // ...и мне все нравится:
        // http://thecodinglove.com/post/95378251969/when-code-works-and-i-dont-know-why
        $crazyInsaneRegexThatSomehowDetectsIso8601 = '/^([\+-]?\d{4}(?!\d{2}\b))'
            . '((-?)((0[1-9]|1[0-2])(\3([12]\d|0[1-9]|3[01]))?'
            . '|W([0-4]\d|5[0-2])(-?[1-7])?|(00[1-9]|0[1-9]\d'
            . '|[12]\d{2}|3([0-5]\d|6[1-6])))([T\s]((([01]\d|2[0-3])'
            . '((:?)[0-5]\d)?|24\:?00)([\.,]\d+(?!:))?)?(\17[0-5]\d'
            . '([\.,]\d+)?)?([zZ]|([\+-])([01]\d|2[0-3]):?([0-5]\d)?)?)?)?$/';

        return preg_match($crazyInsaneRegexThatSomehowDetectsIso8601, $string) === 1;
    }

    /**
     * Getter for $objectMap.
     *
     * @return array
     */
    public static function getObjectMap()
    {
        return static::$objectMap;
    }
}