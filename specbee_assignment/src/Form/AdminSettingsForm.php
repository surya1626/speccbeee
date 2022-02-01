<?php
    namespace Drupal\specbee_assignment\Form;
    
    use Drupal\Core\Form\ConfigFormBase;
    use Drupal\Core\Form\FormStateInterface;
    
    /**
     * Class AdminSettingsForm.
     *
     * @package Drupal\specbee_assignment\Form
     */
    class AdminSettingsForm extends ConfigFormBase {
    
      /**
       * {@inheritdoc}
       */
      public function getFormId() {
        return 'custom_specbee_assignment_form';
      }
    
      /**
       * Gets the configuration names that will be editable.
       *
       * @return array
       *   An array of configuration object names that are editable if called in
       *   conjunction with the trait's config() method.
       */
      protected function getEditableConfigNames() {
        return [
          'specbee_assignment.settings',
        ];
      }
    
      /**
       * {@inheritdoc}
       */
      public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('specbee_assignment.settings');
    
        $form['country'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Country'),
          '#default_value' => $config->get('country'),
        ];
        $form['city'] = [
          '#type' => 'textfield',
          '#title' => $this->t('City'),
          '#default_value' => $config->get('city'),
        ];
        $form['timezone'] = [
          '#type' => 'select',
          '#title' => ('Select Gender:'),
          '#default_value' => $config->get('timezone'),
          '#options' => [
            'America/Chicago' => t('America/Chicago'),
            'America/New_York' => t('America/New_York'),
            'Asia/Tokyo' => t('Asia/Tokyo'),
            'Asia/Dubai' => t('Asia/Dubai'),
            'Asia/Kolkata' => t('Asia/Kolkata'),
            'Asia/Tokyo' => t('Asia/Tokyo'),
            'Europe/Amsterdam' => t('Europe/Amsterdam'),
            'Europe/Oslo' => t('Europe/Oslo'),
            'Europe/London' => t('Europe/London'),
          ],
        ];
        return parent::buildForm($form, $form_state);
      }
    
      /**
       * {@inheritdoc}
       */
      public function submitForm(array &$form, FormStateInterface $form_state) {
        $config = $this->config('specbee_assignment.settings');
        $config->set('country', $form_state->getValue('country'));
        $config->set('city', $form_state->getValue('city'));
        $config->set('timezone', $form_state->getValue('timezone'));
        
        $config->save();
        parent::submitForm($form, $form_state);
      }
    
    }