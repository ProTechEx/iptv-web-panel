var handleDataTableButtons = function () {
    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
		"ajax": {
            "url": "http://greektv.upg.gr/api/?type=greekchannels",
            "dataSrc": "data"

        },
		"columns": [
            {"data": "id", "title": "ID"},
			      {"data": "title", "title": "Title"},
            {"data": "region", "title": "Region"},
			      {"data": "type", "title": "Type"},
            {"data": "description", "title": "Description"},
            {"data": "sd_image", "title": "SD img"},
            {"data": "hd_image", "title": "HD img"},
            {"data": "channel_order", "title": "Order"},
            {"data": null, "title": "Actions"}

        ],
        colReorder: true,
        dom: "Bfrtip",
        "columnDefs": [ {
            "targets": [ 5 ],
            "render": function ( data, type, full, meta ) {
            return '<a href="http://greektv.upg.gr/img/'+data+'" target="blank">'+data+'</a>';
            }
        },
        {
            "targets": [ 6 ],
            "render": function ( data, type, full, meta ) {
            return '<a href="http://greektv.upg.gr/img/'+data+'" target="blank">'+data+'</a>';
            }
        },
        {
            "targets": [8],
            render: function ( row ) {
              return '<a href="#" class="formedit" channelid="'+row.id+'" title="'+row.title+'" region="'+row.region+'" type="'+row.type+'" description="'+row.description+'" sdimage="'+row.sd_image+'" hdimage="'+row.hd_image+'" order="'+row.channel_order+'">Edit</a> - <a onclick="return confirm(\'Are you sure you want to delete this channel?\');" href="../api/?type=deletechannel&channelid='+row.id+'">Delete</a>';

          }
        } ],
		"bProcessing": true,
    "iDisplayLength": 15,
		"order": [[ 7, "desc" ]],
        buttons: [{extend: "copy", className: "btn-sm"}, {extend: "csv", className: "btn-sm"}, {
            extend: "excel",
            className: "btn-sm"
        }, {extend: "pdf", className: "btn-sm"}, {extend: "print", className: "btn-sm"},
        {text: 'Add a new channel',className: "btn-sm",action: function ( e, dt, node, config ) {
          $('#add-the-channel').modal('show');
          e.preventDefault();
        }}
],
        responsive: !0
    })
},

TableManageButtons = function () {"use strict"; return { init: function () { handleDataTableButtons()  } }}();
TableManageButtons.init();
jQuery(document).ready(function() {


  $('#datatable-buttons').on('click', '.formedit', function(e){
    e.preventDefault();
       $('#edit-the-channel').modal('show');
       $('#field-id-e').val($(this).attr('channelid'));
       $('#field-title-e').val($(this).attr('title'));
       $('#field-region-e').val($(this).attr('region'));
       $('#field-type-e').val($(this).attr('type'));
       $('#field-description-e').val($(this).attr('description'));
       $('#field-sdimage-e').val($(this).attr('sdimage'));
       $('#field-hdimage-e').val($(this).attr('hdimage'));
       $('#field-order-e').val($(this).attr('order'));
  });

  $("#formedit").submit(function(e){
      e.preventDefault();
      var channelid = $('#field-id-e').val();
      var title = $('#field-title-e').val();
      var region = $('#field-region-e').val();
      var type = $('#field-type-e').val();
      var description = $('#field-description-e').val();
      var sdimage = $('#field-sdimage-e').val();
      var hdimage = $('#field-hdimage-e').val();
      var order = $('#field-order-e').val();
      var suburl = '../api/?type=editchannel&title='+title+'&region='+region+'&thetype='+type+'&description='+description+'&sdimage='+sdimage+'&hdimage='+hdimage+'&order='+order+'&channelid='+channelid;
      console.log(suburl);
      location.href = suburl;
  });

  $("#formadd").submit(function(e){
      e.preventDefault();

      var title = $('#field-title').val();
      var region = $('#field-region').val();
      var type = $('#field-type').val();
      var description = $('#field-description').val();
      var sdimage = $('#field-sdimage').val();
      var hdimage = $('#field-hdimage').val();
      var order = $('#field-order').val();

      var suburl = '../api/?type=addchannel&title='+title+'&region='+region+'&thetype='+type+'&description='+description+'&sdimage='+sdimage+'&hdimage='+hdimage+'&order='+order;
      console.log(suburl);
      location.href = suburl;
  });


});
