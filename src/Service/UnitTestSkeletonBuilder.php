<?php

namespace App\Service;

class UnitTestSkeletonBuilder
{
    protected ?UnitTestSkeleton $unitTestSkeleton;

    public function create(string $className): self
    {
        $this->unitTestSkeleton = (new UnitTestSkeleton($className))->initialize();

        return $this;
    }

    public function withVariablesBlock(): self
    {
        return $this;
    }

    public function withTearDownBlock(): self
    {
        return $this;
    }

    public function withSetUpBlock(): self
    {
        return $this;
    }

    public function build(): void
    {

    }
}