<?php
namespace Rix\RuleEngine\Expression;
/**
 * Created by PhpStorm.
 * User: nauman
 * Date: 10/30/17
 * Time: 2:53 PM
 */

class EqualsExpression
{
    private $val;

    public function __construct($val)
    {
        $this->val = $val;
    }
    public function to($val)
    {
        return $this->val  === $val;
    }

}