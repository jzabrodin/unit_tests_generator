<?php

declare(strict_types=1);

namespace App\Service;

interface SectionGenerator
{
    public function generate(): Section;
}