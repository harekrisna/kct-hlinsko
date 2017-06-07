$(document).ready(function () {
   if (typeof jQuery.validator !== "undefined") {
      jQuery.extend(jQuery.validator.messages, {
          required: "Toto pole je povinné.",
      });
  }
});



function initFooTable(table, success_message = "Záznam byl smazán.", error_message = "Záznam se nepodařilo smazat.") {
    $(table).footable({
        'paging': {
            'enabled': true,
            'size': 40,
        },

        'sorting': {
            'enabled': true,
        },

        'filtering': {
            'enabled': true,
            'placeholder': "Vyhledat...",
            'dropdownTitle': "Hledat v:",
        },
        'empty': "žádné záznamy",
    });

    $(table).on('click', '.row-delete', function (event) {
        var invoker = this;
        var delete_name = $(invoker).data('delete_name');
        if(delete_name == undefined) {
            delete_name = " ";
        }
        else {
            delete_name = " \"" + delete_name + "\" ";
        }

        event.preventDefault();
        swal({
            title: "Opravdu si přejete záznam" + delete_name +"smazat?",
            text: "Tato operace je nevratná!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ano, smazat!",
            cancelButtonText: "Zrušit!",
            closeOnConfirm: false,
        }, function () {
            var row = $(invoker).parents('tr:first');
            row = FooTable.getRow(row);
            $.get(invoker.href, 
                function (payload) { 
                    $.nette.success(payload);
                    if(payload.success) {
                        row.delete();
                        swal("Smazáno!", success_message, "success");
                    }
                    else {
                        swal("Chyba!", error_message, "error");
                    }
                }
            );
        });
    });

    $(table).on("expand.ft.row", function (e, ft, row) {
        e.preventDefault();
        var row = $(row.$el);
        row.find(" > td span.footable-toggle").toggleClass("fooicon-plus fooicon-minus");
        var next = row.next();
        if(next.hasClass("footable-detail-row")) {
            if(next.is(":visible")) 
                next.hide(); // collapse
            else
                next.show(); // expand
        }
        else { // expand first
            row.after('<tr class="footable-detail-row"><td colspan="4"><img class="ajax-loading" src="../images/ajax-loader.png"/></td></tr>'); // add expanded row
            expand_td = row.next().find("td");
            var record_id = row.data('id');
            
            $.get({
                url: 'expand-row',
                data: {"record_id": record_id}, 
                dataType : "html",
                success: function (data) {
                    $.nette.success(data);
                    expand_td.html(data);
                }
            });
        }
    });
}
