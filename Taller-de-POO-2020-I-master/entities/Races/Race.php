<?php


namespace entities\Races;

/**
 * Description of Race
 *
 * @author pabhoz
 */
abstract class Race implements \interfaces\HumanoidI
{

    public static function getRaceName()
    {
        $nameArray = explode('\\', get_called_class());
        return $nameArray[sizeof($nameArray) - 1];
    }

    public abstract function getStats(): array;
}
