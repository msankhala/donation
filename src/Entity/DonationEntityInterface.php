<?php

namespace Drupal\donation\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Donation entities.
 *
 * @ingroup donation
 */
interface DonationEntityInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Donation name.
   *
   * @return string
   *   Name of the Donation.
   */
  public function getName();

  /**
   * Sets the Donation name.
   *
   * @param string $name
   *   The Donation name.
   *
   * @return \Drupal\donation\Entity\DonationEntityInterface
   *   The called Donation entity.
   */
  public function setName($name);

  /**
   * Gets the Donation creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Donation.
   */
  public function getCreatedTime();

  /**
   * Sets the Donation creation timestamp.
   *
   * @param int $timestamp
   *   The Donation creation timestamp.
   *
   * @return \Drupal\donation\Entity\DonationEntityInterface
   *   The called Donation entity.
   */
  public function setCreatedTime($timestamp);

}
