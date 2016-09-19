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
$dce_name = obiba_mica_commons_get_localized_field($dce, 'name');
?>

<div id="dce-<?php print $dce_id_target ?>" class="modal fade" xmlns="http://www.w3.org/1999/html">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title"><?php print $dce_name ?></h3>
      </div>
      <div class="modal-body">
        <section>
          <div>
            <?php if (!empty($dce->description)): ?>
              <p>
                <?php print obiba_mica_commons_get_localized_field($dce, 'description'); ?>
              </p>
            <?php endif; ?>
          </div>

          <div class="clearfix"></div>

          <table class="table table-striped">
            <tbody>
            <?php if (!empty($dce->startYear)): ?>
              <tr>
                <th><?php print t('Start Year') ?></th>
                <td><p><?php print obiba_mica_commons_format_year($dce->startYear, !empty($dce->startMonth) ? $dce->startMonth : NULL); ?></p></td>
              </tr>
            <?php endif; ?>

            <?php if (!empty($dce->endYear)): ?>
              <tr>
                <th><?php print t('End Year') ?></th>
                <td><p><?php print obiba_mica_commons_format_year($dce->endYear, !empty($dce->endMonth) ? $dce->endMonth : NULL); ?></p></td>
              </tr>
            <?php endif; ?>

            <?php if (!empty($dce->dataSources)): ?>
              <tr>
                <th><?php print t('Data Sources') ?></th>
                <td>
                  <ul>
                    <?php foreach ($dce->dataSources as $dataSource): ?>
                      <?php if ($dataSource !== 'others'): ?>
                      <li>
                        <?php print obiba_mica_commons_clean_string($dataSource); ?>
                      </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!empty($dce->otherDataSources)): ?>
                      <li>
                        <?php print obiba_mica_commons_get_localized_field($dce, 'otherDataSources'); ?>
                      </li>
                    <?php endif; ?>
                  </ul>
                </td>
              </tr>
            <?php endif; ?>

            <?php if (!empty($dce->administrativeDatabases)): ?>
              <tr>
                <th><?php print t('Administrative Databases') ?></th>
                <td>
                  <ul>
                    <?php foreach ($dce->administrativeDatabases as $database): ?>
                      <li>
                        <?php print obiba_mica_commons_clean_string($database); ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </td>
              </tr>
            <?php endif; ?>

            <?php if (!empty($dce->bioSamples)): ?>
              <tr>
                <th><?php print t('Biological Samples') ?></th>
                <td>
                  <ul>
                    <?php foreach ($dce->bioSamples as $samples): ?>
                      <?php if ($samples !== 'others'): ?>
                      <li>
                        <?php print obiba_mica_commons_clean_string($samples); ?>
                      </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!empty($dce->otherBioSamples)): ?>
                      <li>
                        <?php print obiba_mica_commons_get_localized_field($dce, 'otherBioSamples'); ?>
                      </li>
                    <?php endif; ?>
                  </ul>
                </td>
              </tr>
            <?php endif; ?>

            <?php if (!empty($dce->tissueTypes)): ?>
              <tr>
                <th><?php print t('Tissue Types') ?></th>
                <td><p><?php print obiba_mica_commons_get_localized_field($dce, 'tissueTypes'); ?></p></td>
              </tr>
            <?php endif; ?>
            </tbody>
          </table>
        </section>
        <?php if (!empty($attachments)): ?>
              <h4><?php print variable_get_value('files_documents_label'); ?></h4>
          <?php print $attachments; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
