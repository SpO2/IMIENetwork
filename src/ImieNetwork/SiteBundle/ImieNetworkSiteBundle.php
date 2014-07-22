<?php

namespace ImieNetwork\SiteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImieNetworkSiteBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}