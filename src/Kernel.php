<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getCacheDir(): string
    {
        if ($this->isVercelRuntime()) {
            return $this->getVercelDir('cache');
        }

        return parent::getCacheDir();
    }

    public function getBuildDir(): string
    {
        if ($this->isVercelRuntime()) {
            return $this->getVercelDir('build');
        }

        return parent::getBuildDir();
    }

    private function isVercelRuntime(): bool
    {
        return isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL']);
    }

    private function getVercelDir(string $type): string
    {
        $dir = sys_get_temp_dir().'/symfony/'.$type.'/'.$this->environment;

        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }

        return $dir;
    }
}
