<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 08:58
 */

namespace App\Entity;


class Test
{
    protected $test;

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }
}