<?php
/**
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace ShippingTutorial\Migrations;


use Plenty\Modules\Order\Shipping\ServiceProvider\Contracts\ShippingServiceProviderRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Migration to create shipping service provider.
 * Class CreateShippingServiceProvider
 *
 * @package Wayfair\Migrations
 */
class CreateShippingServiceProvider {
  use Loggable;
  const SHIPPING_TUTORIAL = 'ShippingTutorial';

  /**
   * @var ShippingServiceProviderRepositoryContract
   */
  private $shippingServiceProviderRepository;

  public function __construct(
      ShippingServiceProviderRepositoryContract $shippingServiceProviderRepository
  ) {
    $this->shippingServiceProviderRepository = $shippingServiceProviderRepository;
  }

  /**
   * @param KeyValueRepository $keyValueRepository
   */
  public function run() {
    try {
      $shippingServiceProvider = $this->shippingServiceProviderRepository->saveShippingServiceProvider(
          self::SHIPPING_TUTORIAL,
          self::SHIPPING_TUTORIAL
      );

    } catch (\Exception $exception) {
      $this->getLogger(self::SHIPPING_TUTORIAL)
          ->error(
              "Could not migrate/create new shipping provider: " . $exception->getMessage(),
              ['error' => $exception->getTrace()]
          );
    }
  }
}
