<?php
namespace ShippingTutorial\Providers;

use Plenty\Modules\Order\Shipping\ServiceProvider\Services\ShippingServiceProviderService;
use Plenty\Plugin\ServiceProvider;

/**
 * Class ShippingTutorialServiceProvider
 * @package ShippingTutorial\Providers
 */
class ShippingTutorialServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 */
	public function register()
	{
	    // add REST routes by registering a RouteServiceProvider if necessary
//	     $this->getApplication()->register(ShippingTutorialRouteServiceProvider::class);
    }

    public function boot(ShippingServiceProviderService $shippingServiceProviderService)
    {

        $shippingServiceProviderService->registerShippingProvider(
            'ShippingTutorial',
            ['de' => '*** Plenty shipping tutorial ***', 'en' => '*** Plenty shipping tutorial ***'],
            [
                'ShippingTutorial\\Controllers\\ShippingController@registerShipments',
                'ShippingTutorial\\Controllers\\ShippingController@deleteShipments',
            ]);
    }
}
