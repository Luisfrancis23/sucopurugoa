<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    public bool $csrfProtection = true;
    public bool $tokenRandomize = true;
    public string $tokenName = 'csrf_sucos';
    public string $headerName = 'X-CSRF-TOKEN';
    public string $cookieName = 'csrf_cookie_name';
    public int $expires = 7200;
    public bool $regenerate = true;
    public ?string $redirect = null;
    public bool $sessid = false;
    public array $excludeURIs = [];
}
