/**
 * @file
 * JScript code for dealing with collapsible blocks
 */

(function ($) {

  Drupal.behaviors.obiba_mica_facet_search_collapse_block = {
    attach: function (context, settings) {
      var newst = {};
      var newst1 = {};
      var st = $.getCookieDataTabs('activeAccordionGroup');

      $('.block-content').each(function (id, state) {
        var current_id = this.id;

        if (!current_id || current_id === "collapse-block-obiba-mica-search-facet-search") {
          return true;
        }

        if (st[current_id]) {
          $("#" + current_id).collapse("show");
          newst1[current_id] = 'in';
        }
        else {
          $("#" + current_id).collapse("hide");
          addCollapsedIcon(current_id, 'collapsed');
          delete newst1[current_id];
        }
      });

      $.saveCookieDataTabs(newst1, 'activeAccordionGroup');

      updateExpandCollapsecon(newst1);

      if (context === document) { //We don't attach event when calling from an ajax triggered context
        $('#facets-expand-collapse', context).on('click', function (e) {
          e.preventDefault();
          $(this).blur();
          var st = $.getCookieDataTabs('activeAccordionGroup');
          if ($.isEmptyObject(st)) {
            expandAll();
          } else {
            collapseAll();
          }
        });

        $('.block', context).on('shown.bs.collapse', function () {
          $(".block-content").each(function (id, state) {
            //var id_active = $(".panel-collapse .in").attr('id');
            var current_id = this.id;

            if ($("#" + current_id).hasClass("in")) {
              newst[current_id] = 'in';
            }
            else {
              delete newst[current_id];
            }
          });

          $.saveCookieDataTabs(newst, 'activeAccordionGroup');
          updateExpandCollapsecon(newst);
        });

        $('.block', context).on('hidden.bs.collapse', function () {
          $('.block-content').each(function (id, state) {
            //var id_active = $(".panel-collapse .in").attr('id');
            var current_id = this.id;

            if ($("#" + current_id).hasClass("in")) {
              newst[current_id] = 'in';
            }
            else {
              delete newst[current_id];
            }
          });

          $.saveCookieDataTabs(newst, 'activeAccordionGroup');
          updateExpandCollapsecon(newst);
        });
      }

      /********** Show more show less on search page********/
      $('.charts', context).on('shown.bs.collapse', function () {
        $('.text-button-field').html(Drupal.t('Show less'));
      });

      $('.charts', context).on('hidden.bs.collapse', function () {
        $('.text-button-field').html(Drupal.t('Show all'));
      });

      /********* More/Less in search block ********/
      $(".expand-control").each(function () {
        var controlSelector = '.expand-control-div-' + $(this).attr('id');
        var linkSelector = '.expand-control-link-' + $(this).attr('id');

        $(controlSelector).on('shown.bs.collapse', function () {
          console.log($(this).attr('id'));
          $(linkSelector).html(Drupal.t('Less'));
        });

        $(controlSelector).on('hidden.bs.collapse', function () {
          $(linkSelector).html(Drupal.t('More'));
        });
      });

      /*******************************************/
      function updateExpandCollapsecon(data) {
        $("#facets-expand-collapse").text((jQuery.isEmptyObject(data)) ? "[+]" : "[-]");
      }

      function expandAll() {
        var newst1 = {};
        $(".block-content").each(function (id, state) {
          var current_id = this.id;
          if (!current_id || current_id === "collapse-block-obiba-mica-search-facet-search") return true;
          $("#" + current_id).collapse("show");
          newst1[current_id] = 'in';
          removeCollapsedIcon(current_id, "collapsed");
        });

        $.saveCookieDataTabs(newst1, 'activeAccordionGroup');
        updateExpandCollapsecon(newst1);
      }

      function collapseAll() {

        $(".block-content").each(function (id, state) {
          var current_id = this.id;
          if (!current_id || current_id === "collapse-block-obiba-mica-search-facet-search") return true;
          $("#" + current_id).collapse("hide");
          addCollapsedIcon(current_id, 'collapsed');
        });

        $.saveCookieDataTabs({}, 'activeAccordionGroup');
        updateExpandCollapsecon({});
      }

      function removeCollapsedIcon(current_id, collapse) {
        if (collapse && current_id) {
          sectionid = current_id.replace("collapse-", "");
          $("a[data-parent=" + sectionid + "]").removeClass(collapse);
        }
      }

      function addCollapsedIcon(current_id, collapse) {
        if (collapse && current_id) {
          sectionid = current_id.replace("collapse-", "");
          $("a[data-parent=" + sectionid + "]").addClass(collapse);
        }
      }
    }
  }
}(jQuery));