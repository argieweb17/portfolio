<?php

$bundles = [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\UX\StimulusBundle\StimulusBundle::class => ['all' => true],
    Symfony\UX\Turbo\TurboBundle::class => ['all' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfonycasts\TailwindBundle\SymfonycastsTailwindBundle::class => ['all' => true],
];

$debugBundle = 'Symfony\\Bundle\\DebugBundle\\DebugBundle';
if (class_exists($debugBundle)) {
    $bundles[$debugBundle] = ['dev' => true];
}

$webProfilerBundle = 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle';
if (class_exists($webProfilerBundle)) {
    $bundles[$webProfilerBundle] = ['dev' => true, 'test' => true];
}

$makerBundle = 'Symfony\\Bundle\\MakerBundle\\MakerBundle';
if (class_exists($makerBundle)) {
    $bundles[$makerBundle] = ['dev' => true];
}

return $bundles;
