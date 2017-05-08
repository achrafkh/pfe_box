      function showAlert(status, heading, body) {
          var icon = 'error';
          if (status == 'success') {
              icon = 'success';
          }
          $.toast({
              heading: heading,
              text: body,
              position: 'top-right',
              loaderBg: '#ff6849',
              icon: icon,
              hideAfter: 6000,
              stack: 6
          });
      };
      $("ul.nav a").removeClass('active');
      var e = window.location,
          i = $("ul.nav a").filter(function() {
              return (this.pathname == e.pathname);
          }).addClass("active").parent().parent().addClass("in").parent();
      i.is("li") && i.addClass("active");