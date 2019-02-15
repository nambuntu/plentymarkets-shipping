<?php
namespace ShippingTutorial\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class ShippingTutorialRouteServiceProvider
 * @package ShippingTutorial\Providers
 */
class ShippingTutorialRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->post('shipment/plenty_tutorial/register_shipments', [
            'middleware' => 'oauth',
            'uses'       => 'ShippingTutorial\Controllers\ShipmentController@registerShipments'
        ]);
  	}

}
