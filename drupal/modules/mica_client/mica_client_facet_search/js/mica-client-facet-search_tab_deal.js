(function ($) {
  Drupal.behaviors.mica_client_facet_search_collapse_tab = {
    attach: function (context, settings) {
      /***Here we deal with facet tab that is retrieved from cookies *******************/
      //get active facet tab from cooki
      var activeTabCooki = $.getCookieDataTabs('activeFacetTab');

      //if empty cookie save current facet tab state
      if (jQuery.isEmptyObject(activeTabCooki)) {
        $(".facets-tab>li").each(function (id, state) {
          //   var current_id = this.firstChild().attr('href');
          console.log($(this).attr('class'));
          if ($(this).attr('class') == 'active') {
            console.log($(this).find('a').attr('href'));
            activeTabCooki['active'] = $(this).find('a').attr('href');
          }
        });
        //save current facet tab state
        $.saveCookieDataTabs(activeTabCooki, 'activeFacetTab');
      }
      else {
        //open active facet tab (retrived from cookies)
        $('#facet-search a[href$="' + activeTabCooki["active"] + '"]').tab('show');
        console.log($(this).attr('class'));
      }
      //save current stat of facet tab in cookie
      $("div#search-facets").find('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // e.target // activated tab
        // e.relatedTarget // previous tab
        e.preventDefault();
        var targetPanel = e.target.hash;
        $.saveCookieDataTabs('', 'activeFacetTab');
        activeTabCooki['active'] = targetPanel;
        $.saveCookieDataTabs(activeTabCooki, 'activeFacetTab');
      });

      /***Here we deal with result search tab that is retrieved from url *******************/
      if ($.urlParam('type')) {
        var div = $("div.search-result").find("div.tab-pane");
        div.removeClass("active");
        $("div#" + $.urlParam('type')).addClass("active");
        $('#result-search a[href$="#' + $.urlParam('type') + '"]').tab('show');
      }

      $("div#search-result").find('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //TODO we need to stop show tab and refresh  the page
        // e.target // activated tab
        // e.relatedTarget // previous tab
        e.preventDefault();
        var targetPanel = e.target.hash;
        window.location = '?' + 'type=' + targetPanel.replace('#', '') + '&' + $.urlParamToAdd();
      });

    }
  }
}(jQuery));