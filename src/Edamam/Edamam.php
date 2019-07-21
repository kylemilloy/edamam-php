<?php

namespace Edamam;

use Edamam\Api\Food;

class Edamam
{
    /**
     * The Edamam application ID.
     *
     * @var string
     */
    public static $appId;

    /**
     * The Edamam application key.
     *
     * @var string
     */
    public static $appKey;

    /**
     * Instantiate the instance.
     *
     * @param string|null $appId
     * @param string|null $appKey
     */
    public function __construct(?string $appId, ?string $appKey)
    {
        $this->setApiCredentials($appId, $appKey);
    }

    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getApiCredentials(): array
    {
        return [
            'app_id' => self::$appId,
            'app_key' => self::$appKey,
        ];
    }

    /**
     * Set the App Id and App Key.
     *
     * @param string $appId
     * @param string $appKey
     */
    public static function setApiCredentials(string $appId, string $appKey)
    {
        self::$appId = $appId;
        self::$appKey = $appKey;
    }

    /**
     * Return a Food API instance.
     *
     * @return \Edamam\Api\Food
     */
    public static function food()
    {
        return Food::instance();
    }
}
