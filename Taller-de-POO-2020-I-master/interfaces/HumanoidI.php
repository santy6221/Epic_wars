<?php

namespace interfaces;

use entities\Character;
use entities\Skills\Skill;

interface HumanoidI{
    public function getStats() : Array;
}
