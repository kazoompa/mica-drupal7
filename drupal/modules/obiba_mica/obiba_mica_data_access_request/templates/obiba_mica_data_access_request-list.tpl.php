<!--
  ~ Copyright (c) 2015 OBiBa. All rights reserved.
  ~
  ~ This program and the accompanying materials
  ~ are made available under the terms of the GNU Public License v3.0.
  ~
  ~ You should have received a copy of the GNU General Public License
  ~ along with this program.  If not, see <http://www.gnu.org/licenses/>.
  -->

<div ng-app="DataAccessRequest">

  <h2 class="voffset5">
    <?php print t('Data Access Request'); ?>
  </h2>
  <a ng-href="{{drupalBaseUrl}}data-access-request/new" class="btn btn-info">
    <i class="fa fa-plus"></i> <?php print t('Add Data Access Request'); ?>
  </a>

  <p class="voffset3" ng-hide="requests.length > 0">
    <?php print t('None Data Access Request'); ?>
  </p>

  <div ng-hide="requests.length === 0">
    <div class="row voffset4">
      <div class="col-xs-4">
      <span class="input-group input-group-sm no-padding-top">
        <span class="input-group-addon" id="data-access-requests-search"><i
            class="glyphicon glyphicon-search"></i></span>
        <input ng-model="searchText" type="text" class="form-control width25"
          aria-describedby="data-access-requests-search">
      </span>
      </div>
      <div class="col-xs-8">
        <dir-pagination-controls class="pull-right"></dir-pagination-controls>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th translate><?php print t('Applicant'); ?></th>
          <th translate><?php print t('Title'); ?></th>
          <th></th>
        </tr>
        </thead>
        <tbody>

        <tr dir-paginate="request in requests| filter:searchText | itemsPerPage: 20">
          <td>
            {{request.applicant}}
          </td>
          <td>
            {{request.title}}
          </td>
          <td>
            <ul class="list-inline pull-right">
              <li ng-show="actions.canView(request)">
                <a ng-href="#/data-access-request/{{request.id}}" translate><i class="glyphicon glyphicon-eye-open"></i></a>
              </li>
              <li ng-show="actions.canEdit(request)">
                <a ng-href="{{drupalBaseUrl}}data-access-request/{{request.id}}/edit" translate><i
                    class="glyphicon glyphicon-pencil"></i></a>
              </li>
              <li>
                <a ng-show="actions.canDelete(request)" ng-click="deleteRequest(request)" translate><i
                    class="glyphicon glyphicon-trash"></i></a>
              </li>
            </ul>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>


</div>
