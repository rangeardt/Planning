<?php

namespace WebAv\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WebAvUserBundle extends Bundle
{

	 public function getParent()
    {
        return 'FOSUserBundle';
    }
}
