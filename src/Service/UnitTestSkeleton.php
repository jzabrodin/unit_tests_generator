<?php

namespace App\Service;

use ReflectionParameter;

class UnitTestSkeleton
{
    /**
     * @var ReflectionParameter[]
     */
    protected array $dependenciesData = [];

    protected string $className;

    /**
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * @throws \ReflectionException
     */
    public function initialize(): UnitTestSkeleton
    {
        $reflection = new \ReflectionClass($this->className);
        $constructor = $reflection->getConstructor();
        $parameters = $constructor !== null ? $constructor->getParameters() : [];
        $this->setDependenciesData($parameters);

//        dd($parameters);
        return $this;
    }

    /**
     * @return array
     */
    public function getDependenciesData(): array
    {
        return $this->dependenciesData;
    }

    /**
     * @param array $dependenciesData
     * @return void
     */
    private function setDependenciesData(array $dependenciesData): void
    {
        $this->dependenciesData = $dependenciesData;
    }

    public function generateSetUpMethod(): string
    {

        $dependencies = [];

        foreach ($this->dependenciesData as $dependencyItem) {
            $name = $dependencyItem->getName();
            $reflectionType = $dependencyItem->getType();
            $type = $reflectionType === null ? '' : $reflectionType->getName();
            $dependencyTemplate = "\$this->$name = Mockery::mock($type::class)";
            $dependencies[] = $dependencyTemplate;
        }

        $dependenciesAsString = implode(";\n\t\t", $dependencies);

        return
            "protected function setUp(): void
    {
        parent::setUp();
        $dependenciesAsString
    }
        ";
    }
}