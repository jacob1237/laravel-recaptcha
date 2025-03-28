<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 - present
 * LaravelGoogleRecaptcha - ReCaptchaLangTest.php
 * author: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 7/8/2019
 * MIT license: https://github.com/biscolab/laravel-recaptcha/blob/master/LICENSE
 */

namespace Biscolab\ReCaptcha\Tests;

use Biscolab\ReCaptcha\Facades\ReCaptcha;
use Biscolab\ReCaptcha\ReCaptchaBuilderInvisible;
use Biscolab\ReCaptcha\ReCaptchaBuilderV2;

class ReCaptchaLangTest extends TestCase
{
    /**
     * @var ReCaptchaBuilderInvisible
     */
    protected $recaptcha_invisible;

    /**
     * @var ReCaptchaBuilderV2
     */
    protected $recaptcha_v2;

    /**
     * @tests
     */
    public function testHtmlScriptTagJsApiGetHtmlScriptWithHlParam(): void
    {
        $r = ReCaptcha::htmlScriptTagJsApi();
        $this->assertEquals('<script src="https://www.google.com/recaptcha/api.js?hl=it" async defer></script>', $r);
    }

    /**
     * @tests
     */
    public function testHtmlScriptTagJsApiGetHtmlScriptOverridingHlParam(): void
    {
        $r = ReCaptcha::htmlScriptTagJsApi([
            'lang' => 'en',
        ]);
        $this->assertEquals('<script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>', $r);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('recaptcha.default_language', 'it');
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->recaptcha_invisible = new ReCaptchaBuilderInvisible('api_site_key', 'api_secret_key');
        $this->recaptcha_v2 = new ReCaptchaBuilderV2('api_site_key', 'api_secret_key');
    }
}
