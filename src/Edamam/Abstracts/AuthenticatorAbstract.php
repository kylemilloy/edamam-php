<?php

namespace Edamam\Abstracts;

abstract class AuthenticatorAbstract
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
     * Instantiate the object.
     *
     * @param string|null $appId
     * @param string|null $appKey
     */
    public function __construct(?string $appId = null, ?string $appKey = null)
    {
        if (2 === func_num_args()) {
            self::setApiCredentials($appId, $appKey);
        }
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
    public static function setApiCredentials(?string $appId = null, ?string $appKey = null)
    {
        self::$appId = $appId;
        self::$appKey = $appKey;
    }
}
