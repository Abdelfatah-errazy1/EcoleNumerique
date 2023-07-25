(function () {
    window.mrx = {
        tools: {
            generateDataTable(elm) {
                const configs = {
                    "language": {
                        'url': localStorage.getItem('dt_language_url'),
                    },
                    "info": false,
                    "bLengthChange": false, //thought this line could hide the LengthMenu
                    "bInfo": false,
                    'order': [],
                    'pageLength': 10,
                    "lengthMenu": [5, 10, 15, 20],
                    "columnDefs": [
                        {
                            targets: 'no-sort', orderable: false, "order": []
                        }

                    ]
                };
                if (elm instanceof jQuery) {
                    return elm.DataTable(configs);
                } else {
                    return $(elm).DataTable(configs);
                }
            },
            jsDataTable(
                elm ,
                inputSearchEl,
                inputCheckAllId ,
                inputCheck,
                deleteRowClass,
                deleteAllRowsClass,
            ){
                const datatable = window.mrx.tools.generateDataTable(elm);
                $(inputSearchEl).keyup(function () {
                    datatable.search($(this).val()).draw();
                });
                $(inputCheckAllId).on('click' , function () {
                    $(this).closest('table').find('tbody '+inputCheck).prop("checked", $(this).prop("checked"));
                });


                $(deleteRowClass).on('click', function (e) {
                    e.preventDefault();
                    console.log($(deleteRowClass))
                    var href = $(this).attr('href');
                    Swal.fire({
                        title: Lang.get('messages.sure_message'),
                        text: Lang.get('messages.confirm_delete_message'),
                        icon: 'warning',

                        showCancelButton: true,
                        cancelButtonText: Lang.get('app.close'),
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: Lang.get('app.confirm'),
                    })
                        .then(function (result) {
                            if (result.value) {
                                location.href = href;
                            }
                        });
                });
                $(deleteAllRowsClass).on('click' , function (e) {
                    e.preventDefault();
                    window.ids = [];

                    window.href = $(this).attr("app-dt-action-href");


                    $(inputCheck+":checked").each(function () {
                            window.ids.push($(this).prop("value"));
                        }
                    );


                    if (window.ids.length) {
                        Swal.fire({
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            title: Lang.get('messages.sure_message'),
                            text: Lang.get('messages.confirm_delete_message'),
                            icon: 'warning',
                            cancelButtonText: Lang.get('app.close'),
                            showCancelButton: true,
                            confirmButtonText: Lang.get('app.confirm'),
                        })
                            .then(function (result) {
                                if (result.value) {
                                    axios.post(window.href, {
                                        'ids': window.ids,
                                    })
                                        .then(function (response) {
                                            location.reload();
                                        })
                                        .catch(function (error) {
                                            console.log(error.response.data)
                                        });
                                }
                            });
                    }
                });

            }
        }
    };

})();
