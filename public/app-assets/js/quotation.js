$(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
    $('#item-info').popover('toggle');
});

var count = 0;

function addQuotation() {
    var item_id = $('#item_id');
    var qty = $('#qty');
    var sell_price = $('#sell_price');

    let table = `<tr id="row${count}" class="border-0">
                  <td class="border-0 pl-0">
                     <input type="hidden" class="form-control form-sm" name="item_id[]" id="item_id${count}" value="${item_id.val()}">
                     ${$(item_id).find('option:selected').text()}
                  </td>
                  <td class="border-0 pl-0">
                     <input type="text" class="form-control text-right form-sm money" name="sell_price[]" id="sell_price${count}" value="${sell_price.val()}" onblur="countRowTotal(${count})">
                  </td>
                  <td class="border-0 pl-0">
                    <input type="text" class="form-control text-right form-sm money" name="qty[]" id="qty${count}" value="${qty.val()}" onblur="countRowTotal(${count})">
                  </td>
                  <td class="border-0 pl-0 text-right valign-middle">
                     <div class="btn-group">
                     <button type="button" class="btn btn-danger"
                     onclick="deleteItem(${count})">
                        <i class="fa fa-minus"></i>
                     </button>
                     </div>
                  </td>
               </tr>`;

    $('#data-detail').append(table);

    item_id.val('').trigger('change');
    qty.val(0);
    sell_price.val(0);
    total.val(0);

    count++;

    $('.money').mask("000.000.000.000", {
        reverse: true,
    });


}

function deleteItem(id) {
    $(`#row${id}`).remove();
}