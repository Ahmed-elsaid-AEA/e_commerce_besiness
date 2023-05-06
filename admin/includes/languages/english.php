<?php
function lang($phrase)
{
    static $lang = array(
        //Dashboard  page
        'HOME_ADMIN'     => 'Home',
        'CATOGRIES'      => 'Categories',
        'ITEMS'          => 'Items',
        'MEMBERS'        => 'Members',
        'STATISTICS'     => 'Statistics',
        'LOGS'           => 'logs'
    );
    return $lang[$phrase];
}
