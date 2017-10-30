<?php

namespace Rix\RuleEngine;

use Rix\RuleEngine\Expression\EqualsExpression;
use Rix\RuleEngine\Expression\GreaterThenExpression;
use Rix\RuleEngine\Expression\GreaterThenOrEqualsExpression;
use Rix\RuleEngine\Expression\LessThenExpression;
use Rix\RuleEngine\Expression\LessThenOrEqualsExpression;

abstract class AbstractRule
{
    abstract  public function test();

    abstract function execute($context);
    /**
     * @return boolean
     */
    public function orX()
    {
        $args = func_get_args();
        if(count($args) === 0) return false;
        $init = array_shift($args);
        return array_reduce($args, function($carry, $item){
            return $carry || $item;
        }, $init);
    }
    /**
     * @return boolean
     */
    public function andX()
    {
        $args = func_get_args();
        if(count($args) === 0) return false;
        $init = array_shift($args);
        return array_reduce($args, function($carry, $item){
            return $carry && $item;
        }, $init);
    }
    /**
     * @param $val
     * @return GreaterThenExpression
     */
    public function greater($val)
    {
        return new GreaterThenExpression($val);
    }
    /**
     * @param $val
     * @return GreaterThenOrEqualsExpression
     */
    public function greaterOrEquals($val)
    {
        return new GreaterThenOrEqualsExpression($val);
    }
    /**
     * @param $val
     * @return LessThenExpression
     */
    public function less($val)
    {
        return new LessThenExpression($val);
    }
    /**
     * @param $val
     * @return LessThenOrEqualsExpression
     */
    public function lessOrEquals($val)
    {
        return new LessThenOrEqualsExpression($val);
    }
    /**
     * @param $val
     * @return EqualsExpression
     */
    public function equals($val)
    {
        return new EqualsExpression($val);
    }
}