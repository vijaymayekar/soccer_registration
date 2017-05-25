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
      '#type' => 'details',
      '#title' => t('Information'),
      '#open' => TRUE,
    );
    $form['information']['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      //'#required' => TRUE,
    );
    $form['information']['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      //'#required' => TRUE,
    );
    $form['information']['age'] = array(
      '#type' => 'textfield',
      '#title' => t('Age'),
      //'#required' => TRUE,
    );
    $form['information']['birth_date'] = array(
      '#type' => 'textfield',
      '#title' => t('Birth Date'),
      //'#required' => TRUE,
    );
    $form['information']['school'] = array(
      '#type' => 'textfield',
      '#title' => t('School'),
      //'#required' => TRUE,
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
      //'#required' => TRUE,
    );
    $form['information']['home_address'] = array(
      '#type' => 'textfield',
      '#title' => t('Home Address'),
      //'#required' => TRUE,
    );
    $form['information']['city'] = array(
      '#type' => 'textfield',
      '#title' => t('City'),
      //'#required' => TRUE,
    );
    $form['information']['zip'] = array(
      '#type' => 'textfield',
      '#title' => t('Zip'),
      //'#required' => TRUE,
    );
    $form['information']['home_phone'] = array(
      '#type' => 'textfield',
      '#title' => t('Home Phone'),
      //'#required' => TRUE,
    );
    $form['information']['cell'] = array(
      '#type' => 'textfield',
      '#title' => t('Cell'),
      //'#required' => TRUE,
    );
    $form['information']['other'] = array(
      '#type' => 'textfield',
      '#title' => t('Other'),
      //'#required' => TRUE,
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


    $form['parent_information'] = array(
      '#type' => 'details',
      '#title' => t('Parent / Guardian Information'),
      '#open' => FALSE,
    );
    $form['parent_information']['parent_first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      //'#required' => TRUE,
    );
    $form['parent_information']['parent_last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      //'#required' => TRUE,
    );
    $form['parent_information']['parent_phone'] = array(
      '#type' => 'textfield',
      '#title' => t('Phone'),
      //'#required' => TRUE,
    );
    $form['parent_information']['parent_email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email'),
      //'#required' => TRUE,
    );

    $form['emergency_contact'] = array(
      '#type' => 'details',
      '#title' => t('Emergency Contact'),
      '#open' => FALSE,
    );
    $form['emergency_contact']['emergency_contact_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
      //'#required' => TRUE,
    );
    $form['emergency_contact']['emergency_contact_relationship'] = array(
      '#type' => 'textfield',
      '#title' => t('Relationship'),
      //'#required' => TRUE,
    );
    $form['emergency_contact']['emergency_contact_phone'] = array(
      '#type' => 'textfield',
      '#title' => t('Phone'),
      //'#required' => TRUE,
    );
    $form['emergency_contact']['medical_concern'] = array(
      '#type' => 'radios',
      '#title' => ('Any Medical Concern?'),
      '#options' => array(
        'no' => t('No'),
        'yes' => t('Yes')
      ),
    );
    $form['emergency_contact']['emergency_contact_comment'] = array(
      '#type' => 'textfield',
      '#title' => t('Comment'),
      //'#required' => TRUE,
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
    $account = $this->currentUser();
    // Save the submitted entry.
    $entry = array(
      'first_name',
      'last_name',
      'school',
      'gender',
      'dominate_foot',
      'fav_color',
      'home_address',
      'city',
      'zip',
      'home_phone',
      'cell',
      'skill_level',
      'player_shirt_size',
      'parent_first_name',
      'parent_last_name',
      'parent_phone',
      'parent_email',
      'emergency_contact_name',
      'emergency_contact_phone',
      'medical_concern',
      'emergency_contact_comment',
    );
    $int_fields = array('age', 'birth_date');

    $data = array();
    foreach ($entry as $key => $value) {
      $data[$value] = $form_state->getValue($value);
    }

    foreach ($int_fields as $key => $value) {
      if ($form_state->getValue($value)) {
        $data[$value] = $form_state->getValue($value);
      }
    }

    $data['created'] = strtotime('now');
    db_insert('soccer_registration')
      ->fields($data)
      ->execute();

    $url = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => 1]);
    return $form_state->setRedirectUrl($url);

  }
}
