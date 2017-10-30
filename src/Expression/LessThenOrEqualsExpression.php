<?php
namespace Rix\RuleEngine\Expression;

class LessThenOrEqualsExpression
{
    private $val;

    public function __construct($val)
    {
        $this->val = $val;
    }
    public function to($val)
    {
        return $this->val <= $val;
    }

}