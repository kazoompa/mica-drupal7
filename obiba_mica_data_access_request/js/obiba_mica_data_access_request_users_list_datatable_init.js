(function ($) {
  Drupal.behaviors.mica_data_access_request_datatable_init = {

    attach: function (context, settings) {
      console.log(settings.table_data);
      if (context === document) {


        var divUsers = $('#table-users');
        divUsers.dataTable(
          {
            "bAutoWidth": false,
            "responsive": true,
            "data": settings.table_data,
            "columns": settings.table_headers,
            "iDisplayLength": 25,
            "order": [[1, "asc"]],
            "sDom": '<"table-var-wrapper" <<"md-top-margin pull-left" i><"pull-right" f>><"clear-fix" ><"no-float-tab" r<"scroll-content-tab" t>><"clear-fix" ><"pull-left md-top-margin" l><"pull-right md-top-margin" p>>',
            "language": {
              "url": Drupal.settings.basePath + Drupal.settings.pathPrefix + 'mica/datatable-international'
            },
            "fnInitComplete": function () {
              $('a', this.fnGetNodes()).tooltip({
                "delay": 0,
                "track": true,
                "fade": 250
              });
            },
            "fnDrawCallback": function (oSettings) {
              if (oSettings._iDisplayLength > oSettings.aoData.length) {
                $('.dataTables_paginate').hide();
                $('.dataTables_length').hide();
              } else {
                $('.dataTables_paginate').show();
                $('.dataTables_length').show();
              }
            }
          }
        );


        /* Add events on view applicant profile */
        $("body").on("click", "#table-users tbody #applicantProfile", function (e) {
          e.preventDefault();
          $.ajax(Drupal.settings.basePath + Drupal.settings.pathPrefix +
            'mica/data_access/user/' + $(this).attr("data-id-applicant") + '/ws')
            .done(function (data) {
              modalProfile(this).find('#user-attributes').html(data.profile_html);
              return false;
            }.bind(this))
            .fail(function () {
              modalProfile(this);
              return false;
            }.bind(this));
        });
        function modalProfile(localProfile) {
          var modal = $('#UserDetailModal').modal('show');
          modal.find('#data-name-applicant').text($(localProfile).attr("data-name-applicant"));
          modal.find('span#data-email-applicant').text($(localProfile).attr("data-email-applicant"));
          modal.find('a#data-email-applicant').attr("href", 'mailto:' + $(localProfile).attr("data-email-applicant"));
          return modal;
        }
      }
    }
  }

}(jQuery));
