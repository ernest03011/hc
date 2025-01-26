<?php

declare(strict_types = 1);

namespace App\Core;

Use App\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if($this->has($id)) {
            $entry = $this->entries[$id];

            if(is_callable($entry)) {
                return $entry($this);
            }

            $id = $entry;
        }

        return $this->resolve($id);
    }

    public function has(string $id) : bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    // Autowriting with Reflection API
    public function resolve(string $id)
    {
        // 1. Inspect the classs that we are trying to get from the container. 

        $reflectionClasss = new \ReflectionClass($id);

        if(! $reflectionClasss->isInstantiable()) {
            throw new ContainerException('Class "' . $id . '" is not instantiable');
        }

        // 2. Inspect the constructor of the class

        $constructor = $reflectionClasss->getConstructor();

        if(! $constructor) {
            return new $id;
        }


        // 3. Inspect the constructor parameters (dependencies)

        $parameters = $constructor->getParameters();

        if(! $parameters) {
            return new $id;
        }  

        // 4. If the constructor parameters is a class then try to resolve the class using the container. 

        $dependencies = array_map(
            function (\ReflectionParameter $param) use ($id) {
                $name = $param->getName();
                $type = $param->getType();

                if (! $type) {
                    throw new ContainerException(
                        'Failed to resolve class "' . $id . '" because param "' . $name . '" is missing a type hint'
                    );
                }

                if ($type instanceof \ReflectionUnionType) {
                    throw new ContainerException(
                        'Failed to resolve class "' . $id . '" because of union type for param "' . $name . '"'
                    );
                }

                if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {

                    return $this->get($type->getName());
                }

                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" because invalid param "' . $name . '"'
                );
            },
            $parameters
        );

        return $reflectionClasss->newInstanceArgs($dependencies);

    }


}
