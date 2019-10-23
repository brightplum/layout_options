<?php

namespace Drupal\layout_options\Plugin\LayoutOption;

use Drupal\Core\Form\FormStateInterface;
use Drupal\layout_options\OptionBase;

/**
 * Layout Option plugin to add one or more classes via select set.
 *
 * @LayoutOption(
 *   id = "layout_options_class_select",
 *   label = @Translation("Layout Class attribute option (Select)"),
 *   description = @Translation("A layout configuration option that adds an class attributes to layout and/or regions")
 * )
 */
class ClassAttributeSelect extends OptionBase {

  /**
   * {@inheritDoc}
   */
  public function validateFormOption(array &$form, FormStateInterface $formState) {
    $def = $this->getDefinition();
    $this->validateCssIdentifier($form, $formState, $def['multi']);
  }

  /**
   * {@inheritDoc}
   */
  public function processFormOption(string $region, array $form, FormStateInterface $formState, $default) {
    return $this->createSelectElement($region, $form, $formState, $default);
  }

  /**
   * {@inheritDoc}
   */
  public function processOptionBuild($regions, $build, $region, $value) {
    return $this->processAttributeOptionBuild('class', $regions, $build, $region, $value);
  }

}
