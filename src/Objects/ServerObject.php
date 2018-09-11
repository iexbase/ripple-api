<?php
namespace IEXBase\RippleAPI\Objects;

class ServerObject extends AbstractObject
{
    /**
     * Открытый ключ, используемый этим сервером для подписи своих одноранговых сообщений,
     * не считая валидаций.
     *
     * @return string
    */
    public function getNodePublicKey()
    {
        return $this->getField('node_public_key');
    }

    /**
     * Версия этого сервера, когда его последний раз спрашивали.
     *
     * @return string
    */
    public function getVersion()
    {
        return $this->getField('version');
    }

    /**
     * Количество секунд, которые этот сервер был подключен к сети.
     *
     * @return integer
    */
    public function getUptime()
    {
        return $this->getField('uptime');
    }

    /**
     * IP-адрес узла (может быть опущен).
     *
     * @return string
    */
    public function getIp()
    {
        return $this->getField('ip');
    }

    /**
     * Порт, которой этот сервер использует
     *
     * @return integer
    */
    public function getPort()
    {
        return $this->getField('port');
    }

    /**
     * Количество входящих одноранговых соединений с этим сервером.
     *
     * @return integer
    */
    public function getInboundCount()
    {
        return $this->getField('inbound_count');
    }

    /**
     * Количество новых входящих одноранговых соединений с момента последнего измерения.
     *
     * @return string
    */
    public function getInboundAdded()
    {
        return $this->getField('inbound_added');
    }

    /**
     * Количество входящих одноранговых соединений,
     * сброшенных с момента последнего измерения.
     *
     * @return string
    */
    public function getInboundDropped()
    {
        return $this->getField('inbound_dropped');
    }

    /**
     * Количество исходящих одноранговых соединений с этим сервером.
     *
     * @return integer
    */
    public function getOutboundCount()
    {
        return $this->getField('outbound_count');
    }

    /**
     * Количество новых исходящих одноранговых соединений с момента последнего измерения.
     *
     * @return string
    */
    public function getOutboundAdded()
    {
        return $this->getField('outbound_added');
    }

    /**
     * Количество исходящих одноранговых соединений,
     * сброшенных с момента последнего измерения.
     *
     * @return string
    */
    public function getOutboundDropped()
    {
        return $this->getField('outbound_dropped');
    }

    /**
     * Город, в котором находится этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getCity()
    {
        return $this->getField('city');
    }

    /**
     * Область, в которой находится этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getRegion()
    {
        return $this->getField('region');
    }

    /**
     * Страна, в которой находится этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getCountry()
    {
        return $this->getField('country');
    }

    /**
     * Код ISO для региона, в котором расположен этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getRegionCode()
    {
        return $this->getField('region_code');
    }

    /**
     * Код ISO для страны, где расположен этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getCountryCode()
    {
        return $this->getField('country_code');
    }

    /**
     * Почтовый код, где расположен этот сервер, в соответствии с географической географией IP.
     *
     * @return string
    */
    public function getPostalCode()
    {
        return $this->getField('postal_code');
    }

    /**
     * The ISO timezone where this server is located, according to IP geolocation.
     *
     * @return string
    */
    public function getTimezone()
    {
        return $this->getField('timezone');
    }

    /**
     * Широта, на которой расположен этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getLat()
    {
        return $this->getField('lat');
    }

    /**
     * Долгота, где находится этот сервер, согласно геолокации IP.
     *
     * @return string
    */
    public function getLong()
    {
        return $this->getField('long');
    }

    /**
     * Поставщик интернет-услуг, на котором размещен общедоступный IP-адрес этого сервера.
     *
     * @return string
    */
    public function getIsp()
    {
        return $this->getField('isp');
    }

    /**
     * Организация, владеющая публичным IP-адресом этого сервера
     *
     * @return string
    */
    public function getOrg()
    {
        return $this->getField('org');
    }
}