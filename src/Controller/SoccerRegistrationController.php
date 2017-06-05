<?php

namespace Drupal\soccer_registration\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for DBTNG Example.
 */
class SoccerRegistrationController extends ControllerBase {

  /**
   * Render a list of entries in the database.
   */
  public function listing() {
    $content = array();

    $content['message'] = array(
      '#markup' => $this->t('Generate a list of all entries in the database. There is no filter in the query.'),
    );

    $rows = array();
    $headers = array(t('First Name'), t('Last Name'), t('Age'), t('View'));


    $select = db_select('soccer_registration', 'sr');
    $select->fields('sr', array('first_name', 'last_name', 'age'));

    // Add each field and value as a condition to this query.
    foreach ($entry as $field => $value) {
      $select->condition($field, $value);
    }
    // Return the result in object format.
    $result = $select->execute()->fetchAll();

    foreach ($result as $entry) {
      // Sanitize each entry.

      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', (array) $entry);
    }
    $content['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
    );
    // Don't cache this page.
    $content['#cache']['max-age'] = 0;

    return $content;
  }

  /**
   * Export data from database.
   */
  public function exportcsv() {

//    header("Content-Type: text/csv");
//    header("Content-Disposition: attachment; filename=file.csv");
//
//    function outputCSV($data) {
//      $output = fopen("php://output", "w");
//      foreach ($data as $row)
//        fputcsv($output, $row); // here you can change delimiter/enclosure
//      fclose($output);
//    }
//
//    outputCSV(array(
//      array("name 1", "age 1", "city 1"),
//      array("name 2", "age 2", "city 2"),
//      array("name 3", "age 3", "city 3")
//    ));
  }

}
