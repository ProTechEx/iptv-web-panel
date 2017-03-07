var handleDataTableButtons = function () {
    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
        dom: "Bfrtip",
		"bProcessing": true,
    "iDisplayLength": 15,
        buttons: [{extend: "copy", className: "btn-sm"}, {extend: "csv", className: "btn-sm"}, {
            extend: "excel",
            className: "btn-sm"
        }, {extend: "pdf", className: "btn-sm"}, {extend: "print", className: "btn-sm"}
],
        responsive: !0
    })
},

TableManageButtons = function () {"use strict"; return { init: function () { handleDataTableButtons()  } }}();
TableManageButtons.init();
jQuery(document).ready(function() {
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
   console.log('Name: ' + profile.getName());
   console.log('Image URL: ' + profile.getImageUrl());
   console.log('Email: ' + profile.getEmail());
   }
});
