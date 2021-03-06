<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\PhpUnit;

use Symfony\Bridge\PhpUnit\Legacy\SymfonyTestsListenerTrait;

trait ExpectDeprecationTrait
{
    /**
     * @param string $message
     *
     * @return void
     */
    protected function expectDeprecation($message)
    {
        if (!SymfonyTestsListenerTrait::$previousErrorHandler) {
            SymfonyTestsListenerTrait::$previousErrorHandler = set_error_handler([SymfonyTestsListenerTrait::class, 'handleError']);
        }

        SymfonyTestsListenerTrait::$expectedDeprecations[] = $message;
    }
}
