<?php

namespace Drupal\donation\Entity;

use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Donation entity entities.
 *
 * @ingroup donation
 */
interface DonationEntityInterface extends EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the Donation entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Donation entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Donation entity creation timestamp.
   *
   * @param int $timestamp
   *   The Donation entity creation timestamp.
   *
   * @return \Drupal\donation\Entity\DonationEntityInterface
   *   The called Donation entity entity.
   */
  public function setCreatedTime($timestamp);

}
