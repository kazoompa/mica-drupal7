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
?>

<?php
print render($population_content); ?>

<?php if (!empty($population['dce-tab'])): ?>
  <h4><?php print t('Data Collection Events') ?></h4>
  <div class="scroll-content-tab">
    <?php print $population['dce-tab']; ?>
  </div>
<?php endif; ?>
