<?php

namespace Drupal\items;

use Drupal\items\Entity\ItemsTypeEntity;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class ItemsPermissionsGenerator
 */
class ItemsPermissionsGenerator {

  use StringTranslationTrait;

  /**
   * Loop through all ItemsTypeEntity and build an array of permissions.
   *
   * @return array
   */
  public function itemsTypePermissions() {
    $perms = [];
    foreach (ItemsTypeEntity::loadMultiple() as $entity_type) {
      $perms += $this->buildPermissions($entity_type);
    }
    return $perms;
  }

  /**
   * Create the permissions desired for an individual entity type.
   *
   * @param ItemsTypeEntity $entity_type
   *
   * @return array
   */
  protected function buildPermissions(ItemsTypeEntity $entity_type) {
    $type_id = $entity_type->id();
    $bundle_of = $entity_type->getEntityType()->getBundleOf();
    $type_params = [
      '%type_name' => $entity_type->label(),
      '%bundle_of' => $bundle_of,
    ];

    return [
      "create $bundle_of $type_id" => [
        'title' => $this->t('%type_name: Create new %bundle_of', $type_params),
      ],
      "view any $bundle_of $type_id" => [
        'title' => $this->t('%type_name: View any %bundle_of', $type_params),
      ],
      "view own $bundle_of $type_id" => [
        'title' => $this->t('%type_name: View own %bundle_of', $type_params),
      ],
      "edit any $bundle_of $type_id" => [
        'title' => $this->t('%type_name: Edit any %bundle_of', $type_params),
      ],
      "edit own $bundle_of $type_id" => [
        'title' => $this->t('%type_name: Edit own %bundle_of', $type_params),
      ],
      "delete any $bundle_of $type_id" => [
        'title' => $this->t('%type_name: Delete any %bundle_of', $type_params),
      ],
      "delete own $bundle_of $type_id" => [
        'title' => $this->t('%type_name: Delete own %bundle_of', $type_params),
      ],
    ];
  }
}
