<?php

/*
 * This file is part of the BenGorUser package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BenGorUser\SymfonyRoutingBridge\Infrastructure\Routing;

use BenGorUser\User\Domain\Model\UserUrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Symfony user URL generator class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class SymfonyUserUrlGenerator implements UserUrlGenerator
{
    /**
     * The URL generator.
     *
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * The path name.
     *
     * @var string
     */
    private $pathName;

    /**
     * Constructor.
     *
     * @param UrlGeneratorInterface $anUrlGenerator The URL generator
     * @param string                $aPathName      The path name
     */
    public function __construct(UrlGeneratorInterface $anUrlGenerator, $aPathName)
    {
        $this->urlGenerator = $anUrlGenerator;
        $this->pathName = $aPathName;
    }

    /**
     * {@inheritdoc}
     */
    public function generate($aToken)
    {
        return $this->urlGenerator->generate(
            $this->pathName,
            ['token' => $aToken],
            UrlGeneratorInterface::ABSOLUTE_URL
        );
    }
}
