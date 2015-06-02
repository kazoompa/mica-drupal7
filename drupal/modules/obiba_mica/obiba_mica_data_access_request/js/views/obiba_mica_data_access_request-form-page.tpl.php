<!--
  ~ Copyright (c) 2015 OBiBa. All rights reserved.
  ~
  ~ This program and the accompanying materials
  ~ are made available under the terms of the GNU Public License v3.0.
  ~
  ~ You should have received a copy of the GNU General Public License
  ~ along with this program.  If not, see <http://www.gnu.org/licenses/>.
  -->
<!--
  ~ Copyright (c) 2015 OBiBa. All rights reserved.
  ~
  ~ This program and the accompanying materials
  ~ are made available under the terms of the GNU Public License v3.0.
  ~
  ~ You should have received a copy of the GNU General Public License
  ~ along with this program.  If not, see <http://www.gnu.org/licenses/>.
  -->

<div>
  <h3>
    <ol class="mica-breadcrumb">
      <li><a href="#/data-access-requests" translate>data-access-requests</a></li>
      <li class="active">
        <span ng-if="newRequest" translate>add-sm</span>
        <span ng-if="!newRequest" translate>edit-sm</span>
        <small><span translate>or</span>
          <a ng-click="cancel()">
            <span translate>cancel-sm</span>
          </a></small>
      </li>
    </ol>
  </h3>

  <h3 ng-if="!newRequest && !canEdit" class="voffset2">{{dataAccessRequest.title}}</h3>

  <div>
    <obiba-alert id="DataAccessRequestEditController"></obiba-alert>

    <form name="requestForm" ng-submit="submit(requestForm)">
      <div ng-if="newRequest || canEdit" class="voffset2" form-input name="data-access-request.title"
        model="dataAccessRequest.title"
        label="data-access-request.title"
        help="data-access-request.title-help"></div>

      <tabset class="voffset5">
        <div class="pull-right">
        </div>
        <tab heading="{{'data-access-request.form' | translate}}">
          <div sf-model="form.model" sf-form="form.definition" sf-schema="form.schema" required="true"></div>
        </tab>
        <tab heading="{{'attachments' | translate}}">
          <div class="form-group">
            <attachment-input files="dataAccessRequest.attachments" multiple="true"></attachment-input>
          </div>
        </tab>
      </tabset>

      <a ng-click="cancel()" type="button" class="btn btn-default">
        <span translate>cancel</span>
      </a>

      <a ng-click="save()" type="button" class="btn btn-primary">
        <span translate>save</span>
      </a>

      <button type="submit" class="btn btn-info">
        <span translate>validate</span>
      </button>
    </form>

  </div>

</div>


