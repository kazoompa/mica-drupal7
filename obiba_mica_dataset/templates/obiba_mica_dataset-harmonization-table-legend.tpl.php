<?php
/**
 * Copyright (c) 2016 OBiBa. All rights reserved.
 *
 * This program and the accompanying materials
 * are made available under the terms of the GNU Public License v3.0.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @file
 * Code for the obiba_mica_dataset modules.
 */

?>

<div class="legend lg-bottom-margin pull-left">
  <?php if (!empty($clickable)): ?>
    <p>
      <?php print t('Click on each status icon to get more details on the corresponding harmonization results') ?>
      :
    </p>
  <?php endif ?>
  <div>
    <i class="glyphicon glyphicon-question-sign alert-warning"></i>
    <h6><?php print t('Undetermined') ?></h6>
    <?php print ' - ' . t('harmonization status not determined') ?>
  </div>
  <div>
    <i class="glyphicon glyphicon-ok alert-success"></i>
    <h6><?php print t('Complete') ?></h6>
    <?php print ' - ' . t('study-specific variable is the same as DataSchema variable (status = identical) or needs transformation to generate DataSchema variable (status = compatible)') ?>
  </div>
  <div>
    <i class="glyphicon <?php print ObibaDatasetConstants::getIcon(); ?> "></i>
    <h6><?php print variable_get_value('dataset_harmonization_impossible_label'); ?></h6>
    <?php print ' - ' . t('study does not collect DataSchema variable (status = unavailable) or cannot be used to generate DataSchema variable (status = incompatible)') ?>
  </div>
</div>
