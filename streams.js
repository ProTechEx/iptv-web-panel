var handleDataTableButtons = function() {
        0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
            "ajax": {
                "url": "/api/?type=streams",
                "dataSrc": "data"

            },
            "columns": [{
                    "data": "id",
                    "title": "ID"
                },
                {
                    "data": "channel",
                    "title": "Channel"
                },
                {
                    "data": "streamurl",
                    "title": "URL"
                },
                {
                    "data": "streamformat",
                    "title": "Format"
                },
                {
                    "data": "active",
                    "title": "Active"
                },
                {
                    "data": "ishd",
                    "title": "HD"
                },
                {
                    "data": "user",
                    "title": "Added by"
                },
                {
                    "data": null,
                    "title": "Actions"
                },
                {
                    "data": "channelid",
                    "title": "Channelid"
                },

            ],
            colReorder: true,
            dom: "Bfrtip",
            "columnDefs": [

                {
                    "targets": [8],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [7],
                    render: function(row) {
                        return '<a href="#" class="formedit" streamid="' + row.id + '" channel="' + row.channelid + '" streamurl="' + row.streamurl + '" streamformat="' + row.streamformat + '" active="' + row.active + '" ishd="' + row.ishd + '" id="' + row.id + '">Edit</a> - <a onclick="return confirm(\'Are you sure you want to delete this stream?\');" href="../api/?type=deletestream&streamid=' + row.id + '">Delete</a>';
                    }
                }
            ],
            "bProcessing": true,
            "iDisplayLength": 15,
            "order": [
                [1, "desc"]
            ],
            buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdf",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                },
                {
                    text: 'Add a new stream',
                    className: "btn-sm",
                    action: function(e, dt, node, config) {
                        $('#add-the-stream').modal('show');
                        e.preventDefault();
                        $.getJSON("../api/?type=channelnames", function(json) {
                            $('#field-channel').empty();
                            $.each(json, function(i, obj) {
                                $('#field-channel').append($('<option>').text(obj.title).attr('value', obj.id));
                            });
                        });
                    }
                }
            ],
            responsive: !0
        })
    },

    TableManageButtons = function() {
        "use strict";
        return {
            init: function() {
                handleDataTableButtons()
            }
        }
    }();
TableManageButtons.init();



jQuery(document).ready(function() {
    function onSignIn(googleUser) {
        var table = $('#datatable-buttons').DataTable();
        var ajaxurl = table.ajax.url();
    }

    $('#datatable-buttons').on('click', '.formedit', function(e) {
        e.preventDefault();
        $('#edit-the-stream').modal('show');
        var thechannelid = $(this).attr('channel');
        $.getJSON("../api/?type=channelnames", function(json) {
            $('#field-channel-e').empty();
            $.each(json, function(i, obj) {
                $('#field-channel-e').append($('<option>').text(obj.title).attr('value', obj.id));
            });
            $('#field-channel-e').val(thechannelid);
        });
        $('#field-streamid-e').val($(this).attr('streamid'));
        //   $('#field-channel-e').val($(this).attr('channel'));
        $('#field-streamurl-e').val($(this).attr('streamurl'));
        $('#field-format-e').val($(this).attr('streamformat'));
        $('#field-active-e').val($(this).attr('active'));
        $('#field-hd-e').val($(this).attr('ishd'));
    });

    $("#formadd").submit(function(e) {
        e.preventDefault();

        var channelid = $('#field-channel').val();
        var streamurl = $('#field-streamurl').val();
        var format = $('#field-format').val();
        var active = $('#field-active').val();
        var hd = $('#field-hd').val();
        var user = 'user';
        var suburl = '../api/?type=addstream&channelid=' + channelid + '&streamurl=' + streamurl + '&streamformat=' + format + '&active=' + active + '&ishd=' + hd + '&user=' + user;
        console.log(suburl);
        location.href = suburl;
    });


    $("#formedit").submit(function(e) {
        e.preventDefault();
        var streamid = $('#field-streamid-e').val();
        var channelid = $('#field-channel-e').val();
        var streamurl = $('#field-streamurl-e').val();
        var format = $('#field-format-e').val();
        var active = $('#field-active-e').val();
        var hd = $('#field-hd-e').val();
        var user = 'user';
        var suburl = '../api/?type=editstream&streamid=' + streamid + '&channelid=' + channelid + '&streamurl=' + streamurl + '&streamformat=' + format + '&active=' + active + '&ishd=' + hd + '&user=' + user;
        console.log(suburl);
        location.href = suburl;
    });

});
