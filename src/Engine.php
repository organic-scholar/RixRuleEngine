<?php

namespace Rix\RuleEngine;


use Psr\Container\ContainerInterface;

class Engine
{
    protected $container;

    protected $rules = [];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function addRule(AbstractRule $rule)
    {
        $this->rules[] = $rule;
    }
    public function addRules($rules)
    {
        foreach ($rules as $rule)
        {
            $this->rules[] = $rule;
        }
    }
    public function execute($context=null)
    {
        $args = func_get_args();
        foreach ($this->rules as $rule)
        {
            $rule = $this->container->get($rule);
            $passes = call_user_func_array([$rule, 'test'], $args);
            if($passes){
                return $rule->execute($context);
            }
        }
    }
}