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

namespace spec\BenGorUser\SymfonyRoutingBridge\Infrastructure\Routing;

use BenGorUser\SymfonyRoutingBridge\Infrastructure\Routing\SymfonyUserUrlGenerator;
use BenGorUser\User\Domain\Model\UserUrlGenerator;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Spec file of SymfonyUserUrlGenerator class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class SymfonyUserUrlGeneratorSpec extends ObjectBehavior
{
    function let(UrlGeneratorInterface $urlGenerator)
    {
        $this->beConstructedWith($urlGenerator, 'bengor_user_user_homepage');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SymfonyUserUrlGenerator::class);
    }

    function it_implements_user_url_generator()
    {
        $this->shouldImplement(UserUrlGenerator::class);
    }

    function it_generates(UrlGeneratorInterface $urlGenerator)
    {
        $urlGenerator->generate(
            'bengor_user_user_homepage',
            ['token' => 'the-token'],
            UrlGeneratorInterface::ABSOLUTE_URL
        )->shouldBeCalled()->willReturn('/');

        $this->generate('the-token')->shouldReturn('/');
    }
}
