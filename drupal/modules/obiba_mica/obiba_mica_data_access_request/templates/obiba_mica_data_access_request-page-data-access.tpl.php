<!--
  ~ Copyright (c) 2015 OBiBa. All rights reserved.
  ~
  ~ This program and the accompanying materials
  ~ are made available under the terms of the GNU Public License v3.0.
  ~
  ~ You should have received a copy of the GNU General Public License
  ~ along with this program.  If not, see <http://www.gnu.org/licenses/>.
  -->

<?php print render($node_content); ?>

<?php if ($data_access_register_user) : ?>
<div class="text-center">
  <p>
    <a class='btn btn-primary' href='obiba_user/register'>
      <?php print t('Please Create an Account to Start Your Application') ?>
    </a>
  </p>

  <p><?php print t('Or') ?></p>

  <p>
    <?php
    print l('login', 'user/login', array(
      'query' => array(current_path()),
      'attributes' => array('class' => array('btn', 'btn-primary'))
    ));?>
  </p>
  <?php endif; ?>

  <?php if ($data_access_list_display) : ?>
    <p>

      <?php print l('My Data Access Requests', 'data-access-request-list',
        array(
          'attributes' => array('class' => array('btn', 'btn-primary'))
        )
      ); ?>

    </p>
  <?php endif; ?>
</div>


