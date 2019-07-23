<?php

namespace Edamam\Interfaces;

interface AuthenticatorInterface
{
    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getApiCredentials(): array;

    /**
     * Set the App Id and App Key.
     *
     * @param string $appId
     * @param string $appKey
     */
    public static function setApiCredentials(?string $appId = null, ?string $appKey = null): void;
}
