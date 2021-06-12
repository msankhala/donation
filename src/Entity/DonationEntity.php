<?php

namespace Drupal\donation\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
// use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Donation entity.
 *
 * @ingroup donation
 *
 * @ContentEntityType(
 *   id = "donation",
 *   label = @Translation("Donation"),
 *   bundle_label = @Translation("Donation type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\donation\ListBuilder\DonationEntityListBuilder",
 *     "views_data" = "Drupal\donation\Entity\DonationEntityViewsData",
 *     "translation" = "Drupal\donation\Translation\DonationEntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\donation\Form\DonationEntityForm",
 *       "add" = "Drupal\donation\Form\DonationEntityForm",
 *       "edit" = "Drupal\donation\Form\DonationEntityForm",
 *       "delete" = "Drupal\donation\Form\DonationEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\donation\Routing\DonationEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\donation\Access\DonationEntityAccessControlHandler",
 *   },
 *   base_table = "donation",
 *   data_table = "donation_field_data",
 *   translatable = TRUE,
 *   permission_granularity = "bundle",
 *   admin_permission = "administer donation entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "bundle" = "type",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/donations/donation/{donation}",
 *     "add-page" = "/admin/donations/donation/add",
 *     "add-form" = "/admin/donations/donation/add/{donation_type}",
 *     "edit-form" = "/admin/donations/donation/{donation}/edit",
 *     "delete-form" = "/admin/donations/donation/{donation}/delete",
 *     "collection" = "/admin/donations/donation",
 *   },
 *   bundle_entity_type = "donation_type",
 *   field_ui_base_route = "entity.donation_type.edit_form"
 * )
 */
class DonationEntity extends ContentEntityBase implements DonationEntityInterface {

  use EntityChangedTrait;
  // use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Donation entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Donation is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
