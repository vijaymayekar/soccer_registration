<?php

/**
 * @file
 *
 */

namespace Drupal\soccer_registration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SoccerRegistrationForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'soccer_registration_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['information'] = array(
      '#type' => 'fieldset',
      '#title' => t('Information'),
    );
    $form['information']['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      '#required' => TRUE,
    );
    $form['information']['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      '#required' => TRUE,
    );
    $form['information']['age'] = array(
      '#type' => 'textfield',
      '#title' => t('Age'),
      '#required' => TRUE,
    );
    $form['information']['birth_date'] = array(
      '#type' => 'textfield',
      '#title' => t('Birth Date'),
      '#required' => TRUE,
    );
    $form['information']['school'] = array(
      '#type' => 'textfield',
      '#title' => t('School'),
      '#required' => TRUE,
    );
    $form['information']['gender'] = array(
      '#type' => 'radios',
      '#title' => ('Sex'),
      '#options' => array(
        'm' => t('M'),
        'f' => t('F')
      ),
    );
    $form['information']['dominate_foot'] = array(
      '#type' => 'radios',
      '#title' => ('Dominate Foot'),
      '#options' => array(
        'left' => t('Left'),
        'right' => t('Right'),
        'both' => t('Both')
      ),
    );
    $form['information']['fav_color'] = array(
      '#type' => 'textfield',
      '#title' => t('Favorite Color'),
      '#required' => TRUE,
    );
    $form['information']['home_address'] = array(
      '#type' => 'textfield',
      '#title' => t('Home Address'),
      '#required' => TRUE,
    );
    $form['information']['city'] = array(
      '#type' => 'textfield',
      '#title' => t('City'),
      '#required' => TRUE,
    );
    $form['information']['zip'] = array(
      '#type' => 'textfield',
      '#title' => t('Zip'),
      '#required' => TRUE,
    );
    $form['information']['home_phone'] = array(
      '#type' => 'textfield',
      '#title' => t('Home Phone'),
      '#required' => TRUE,
    );
    $form['information']['cell'] = array(
      '#type' => 'textfield',
      '#title' => t('Cell'),
      '#required' => TRUE,
    );
    $form['information']['other'] = array(
      '#type' => 'textfield',
      '#title' => t('Other'),
      '#required' => TRUE,
    );
    $form['information']['skill_level'] = array(
      '#type' => 'select',
      '#title' => ('Skill Level'),
      '#options' => array(
        'Beginner' => t('Beginner (1st year)'),
        'Intermediate' => t('Intermediate (2nd - 3rd year)'),
        'Seasoned' => t('Seasoned (4+ years)')
      ),
    );
    $form['information']['player_shirt_size'] = array(
      '#type' => 'select',
      '#title' => ('Player Shirt size'),
      '#options' => array('YS', 'YM', 'YL', 'AS', 'AM')
    );


    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }
}