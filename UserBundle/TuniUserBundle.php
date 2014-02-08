<?php

namespace Tuni\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TuniUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
