/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// constants 
const FormWizard = {}

// Data Tables

const DataTable = (element) => {
    const lastIndex = element.querySelectorAll('thead th').length - 1,
        lastColumnOption = {select: lastIndex, sortable: false}
    return new simpleDatatables.DataTable(element, {
        columns: [
            lastColumnOption
        ]
    });
}

// Modals

const InitModal     = (content) => {
    let dialog = document.createElement('div');
    dialog.className = 'modal fade';
    dialog.setAttribute('tabindex', '-1');
    dialog.innerHTML = `<div class="modal-dialog modal-dialog-centered">${content}</div>`;
    return dialog;
};

const CreateModal   = (url, data, callbacks = {yes: () => true, no: () => false}) => {
    fetch(`${url}?${data}`, {method: 'get'})
    .then(response => {
        if( response.ok ) return response.text();
        else {
            toastrs('Error', `${response.status}: ${response.statusText}`, 'error');
            response.text().then(data => {
                console.error(data);
            });
            return false;
        }
    }) .then (data => {
        if(data){
            let dialog = InitModal(data);
            document.body.append(dialog);
            dialog.querySelector('.dialog-yes').addEventListener('click', () => {
                callbacks.yes();
                $(dialog).modal('hide');
                setTimeout(() => dialog.parentNode.removeChild(dialog), 2000);
                
            });
            dialog.querySelector('.dialog-no').addEventListener('click', () => {
                callbacks.no();
                $(dialog).modal('hide');
                setTimeout(() => dialog.parentNode.removeChild(dialog), 2000);
            });
            $(dialog).modal('show');
        }
    }) .catch ( error => {
        
        console.error(error);
    });
}

const EmptyInputModal = (items, form) => {
    let parameters = [];
    items.forEach(item => {
        parameters.push(`item[]=${item}`);
    });
    parameters = parameters.join('&');

    parameters = `${parameters}&title=Empty Inputs`;
    let url         = window.location.href,
        pos         = url.indexOf('/app/'),
        destination = url.substring(0, pos + 5) + 'dialog-empty-input';
    
    CreateModal(destination, parameters, {
        yes: () => form.submit(), 
        no: () => false
    });
}

const ConfirmDeleteModal = (target) => {
    let parameter = `url=${target}`,
        url         = window.location.href,
        pos         = url.indexOf('/app/'),
        destination = url.substring(0, pos + 5) + 'dialog-confirm-delete';
    
    CreateModal(destination, parameter, {
        yes : () => document.querySelector('#confirm-delete-modal').submit(),
        no  : () => false
    });
}

const ConfirmStatusModal = (target, status) => {
    let parameter = `url=${target}&status=${status}`,
        url         = window.location.href,
        pos         = url.indexOf('/app/'),
        destination = url.substring(0, pos + 5) + 'dialog-status-update';
    
    CreateModal(destination, parameter, {
        yes : () => document.querySelector('#confirm-status-modal').submit(),
        no  : () => false
    });
}


// Modal Navigation

const openNext  = (prevSelector, nextSelector) => {
    const prev  = document.querySelector(prevSelector),
        next    = document.querySelector(nextSelector);
    
    $(prev).fadeOut(500);
    $(next).delay(500).fadeIn(500);
}

const CanNavigate = () => {
    document.addEventListener('click', event => {
        const target = event.target;
        if(target.hasAttribute('can-navigate') && (!target.disabled && !target.classList.contains('disabled'))){
            openNext(target.getAttribute('data-navigate-from'), target.getAttribute('data-navigate-to'));
        }
    });
}

// Tooltips

const toolTipsItem = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')),
    toolTips    = [];
toolTipsItem.forEach(item => {
    toolTips.push(new bootstrap.Tooltip(item, {
        boundary: document.body
    }));
})


// Forms

const CheckEmptyInputs = form => {
    const inputs    = form.querySelectorAll('input, select, textarea');
    let emptyInputs = [];
    inputs.forEach(input => { 
        if((!input.value || input.value == "") && input.hasAttribute('data-is-required') && input.getAttribute('type') != 'hidden') {
            emptyInputs.push(input.name);
        }
    });
    return {result: Boolean(emptyInputs.length), items: emptyInputs};
}

const ValidateForm = (event) => {
    event.preventDefault();
    const form = event.target;
    if(!ValidateCurrencyInput(form)) return false;
    let isEmpty = CheckEmptyInputs(form);
    
    if(isEmpty.result){
        EmptyInputModal(isEmpty.items, form);
    } else {
        return form.submit();
    }
}

// Dropzone

const dropzones = {}

// Inputs

const ReadableToProcessable = input => parseFloat(input.replace(/\./g, '').replace(/,/g, '.'));
const ProcessableToReadable = input => input.toFixed(2).toString().replace(/\./g, ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');

const UpdateSubTotal        = () => {
    let inputs = document.querySelectorAll(".amount"),
        subTotal = 0;
    inputs.forEach(input => {
        subTotal = parseFloat(subTotal) + parseFloat(ReadableToProcessable(input.innerHTML));
    });
    
    subTotal = ProcessableToReadable(subTotal);
    document.querySelector('.subTotal').innerHTML = subTotal;
    document.querySelector('.totalAmount').innerHTML = subTotal;
}

const UpdateInvoiceAndBillItemData  = (target, additionalData = null) => {
    let element = target;
    while(!element.getAttribute('data-is-item') && element.nodeName != 'BODY') element = element.parentNode;

    if(element.nodeName == 'BODY') return;

    let quantity    = ReadableToProcessable(element.querySelector('.quantity').value),
        price       = ReadableToProcessable(element.querySelector('.price').value),
        tax         = ReadableToProcessable(element.querySelector('.tax').value),
        discount    = ReadableToProcessable(element.querySelector('.discount').value),
        totalPrice  = (quantity * price),
        taxPrice    = (tax / 100) * (totalPrice),
        amount      = (totalPrice + taxPrice) - discount;

    amount  = ProcessableToReadable(amount);

    if(additionalData.products) {
        const id    = element.querySelector('.item').value,
            product = additionalData.products[id];

        if(quantity > product.stock) {
            toastrs('Error', 'Not enough stock', 'error');
            element.querySelector('.quantity').value = ProcessableToReadable(product.stock);
        }
    }

    if(additionalData.discount.amount) {
        const CustomerDiscount = additionalData.discount;
        if(CustomerDiscount.amount > 1 && CustomerDiscount.amount > discount) {
            discount = CustomerDiscount.amount;
        } else if(CustomerDiscount.amount <= 1) {
            let tempDiscount = price * CustomerDiscount.amount;
            if(tempDiscount > CustomerDiscount.max && CustomerDiscount.max > 0) {
                tempDiscount = CustomerDiscount.max;
            }

            if(tempDiscount > discount) {
                discount = tempDiscount;
            }
        }
        element.querySelector('.discount').value = ProcessableToReadable(discount);
    }
    
    element.querySelector('.amount').innerHTML = amount;

    UpdateSubTotal();
}

const UpdateAllItemData = (additionalData) => {
    const items = document.querySelectorAll('.item');

    if(items) {
        items.forEach(item => {
            UpdateInvoiceAndBillItemData(item, additionalData);
        });
    }
}

const OnlyAllowNumber   = () => {
    const events = ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"];
    events.forEach(event => {
        document.addEventListener(event, event => {
            let target = event.target;
            if(target.nodeName == 'INPUT' && target.hasAttribute('data-is-number')){
                let filtered = /^\-?[0-9\.]*\,?[0-9]*$/.test(target.value);
                if(filtered) {
                    target.oldValue             = target.value;
                    target.oldSelectionStart    = target.selectionStart;
                    target.oldSelectionEnd      = target.selectionEnd;
                } else if(target.hasOwnProperty('oldValue')) {
                    target.value    = target.oldValue;
                    target.setSelectionRange(target.oldSelectionStart, target.oldSelectionEnd);
                } else {
                    target.value = "";
                }
                if(target.value != "" && target.value != "-" && !(/^[0-9\.]*\,$/).test(target.value)) target.value = AddNumberSeparator(target.value);
            }

            if(target.nodeName == 'INPUT' || target.nodeName == 'SELECT' || target.nodeName == 'TEXTAREA') { WatchChange(target, true); }
        });
    });
}

OnlyAllowNumber();

const AddNumberSeparator    = number => parseFloat(number.replace(/\./g, '').replace(/,/g, '.')).toLocaleString('id', {maximumFractionDigits: 6});

const ValidateCurrencyInput = (form) => {        
    const inputs = form.querySelectorAll('input[data-is-number]');
    let error = false;
    if(inputs){
        inputs.forEach(input => {
            let pattern = /^\-?[0-9\.]*,?[0-9]*$/;   
            if(!pattern.test(input.value)  && input.value !== null) error = true;
        });
        if(error){
            toastrs('Error', '"Invalid number format."', 'error');
            return false;
        }
    }
    return true;
}

const WatchChange = (input, testOtherInput = false) => {
    if(
        (!input.value || input.value == '' || (input.nodeName == 'SELECT' && input.value == '0')) 
        && 
        ((input.hasAttribute('data-is-required') && !input.hasAttribute('data-is-not-highlighted')) || input.hasAttribute('required'))
    ){
        if(input.nodeName == 'SELECT' && input.classList.contains('selectric')) {
            input.parentNode.parentNode.querySelector('div.selectric').classList.add('is-invalid');
        } else {
            input.classList.add('is-invalid');
        }
        
    } else {
        if(input.nodeName == 'SELECT' && input.classList.contains('selectric')) {
            input.parentNode.parentNode.querySelector('div.selectric').classList.remove('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    }
    if(testOtherInput){
        let form    = input.parentNode,
            isInput = true;
        while(form.nodeName != 'FORM'){
            if(form.nodeName == 'BODY'){
                isInput = false;
                break;
            }
            form = form.parentNode;
        }

        if(isInput){
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(item => WatchChange(item));
        }
    }
}

const CopyFromInput = (InputSelector, ButtonSelector) => {
    const input = document.querySelector(InputSelector),
        btn     = document.querySelector(ButtonSelector);

    btn.addEventListener('click', event => {
        input.select();
        input.setSelectionRange(0, 99999);

        navigator.clipboard.writeText(input.value);

        toastrs('Copied', 'code copied', 'success');
    });
}

// Selectric 
const SelectricChangeCallbacks = [
    (event) => {
        if(event.target.value.includes('new')){
            let url     = window.location.href,
                pos     = url.indexOf('/app/'),
                target  = event.target.value.split('.')[1],
                destination = url.substring(0, pos + 5) + target;

            window.location.href = destination;
        }
        WatchChange(event.target, true);
    }
];

// Dashboard chart dropdowns

const underlineDropdowns = document.querySelectorAll('.underline-dropdown');
if(underlineDropdowns.length) {
    underlineDropdowns.forEach(element => {
        element.addEventListener('click', event => {
            if(event.target.nodeName == 'SELECT'){
                if(!event.currentTarget.hasAttribute('disable-update')){
                    if(!event.currentTarget.classList.contains('is-active')){
                        event.currentTarget.classList.add('is-active');
                    } else {
                        event.currentTarget.classList.remove('is-active');
                    }
                }
            }
        });
        document.addEventListener('mouseup', event => {
            if(element.classList.contains('is-active')){
                element.classList.remove('is-active');
                element.setAttribute('disable-update', true);
                setTimeout(() => {
                    element.removeAttribute('disable-update');
                }, 300);
            }
        })
    })
}

// Data logging

window.onerror = (msg, url, lineNo, columnNo, error) => {
    let data = `Message: ${msg} \n ${url} (${lineNo}:${columnNo}) \n ${error ? error.stack : ''}`;
    let formData = new FormData();
    formData.append('error', data);
    fetch(`${window.location.protocol}//${window.location.hostname}/app/error/frontend`, {
        method: 'post',
        headers: {
            'X-Requested-With'  : 'XMLHttpRequest',
            'X-CSRF-TOKEN'      : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        credentials: 'same-origin',
        body: formData
    }).then( response => {
        if( response.ok ) return;
        else console.error('Error cannot be uploaded');
    });
}

let userActivities = {
    interval : 0,
    user     : null,
    focus    : 1,
}

const loginUser = user => {
    if(!sessionStorage.getItem('user')) {
        sessionStorage.setItem('user', user);
        userActivities.user = user;
    }
}

const logoutUser = () => {
    if(sessionStorage.getItem('user')) {
        sessionStorage.clear();
        clearInterval(userActivities.interval);
        userActivities.user = null;
    }
}

const userActivity = () => {
    checkActivity();
    userActivities.interval = setInterval(checkActivity, 60000);
}

const checkActivity = () => {
    if(document.hasFocus()){
        if(!sessionStorage.getItem('last-active') || !userActivities.focus) {
            getActivity();
        } else {
            const now   = moment(new Date()),
                db      = moment(new Date(sessionStorage.getItem('db-active'))),
                stored  = moment(new Date(sessionStorage.getItem('last-active'))),
                time    = parseFloat(sessionStorage.getItem('active-time'));

            if(now.diff(stored, 'minute') < 5){    
                sessionStorage.setItem('active-time', time + now.diff(stored, 'second') / 60);
                sessionStorage.setItem('last-active', now.format("YYYY-MM-DD HH:mm:ss"));
                
                if(now.diff(db, 'minute') >= 1){
                    sendActivity();
                }
            } else {
                getActivity();
            }
        }
        userActivities.focus = 1;
    } else {
        userActivities.focus = 0;
    }
}

const getActivity = () => {
    const user = sessionStorage.getItem('user');
    fetch(`${window.location.protocol}//${window.location.host}/app/users/${user}/activity`, {method: 'get'})
    .then(response => {
        if(response.ok) {
            return response.json();
        } else {
            console.error(response.status, response.statusText);
        }
    }).then(data => {
        const today = moment(new Date()),
            before  = moment(new Date(data.last_active));

        if(data.last_active && today.diff(before, 'minute') < 5) {
            sessionStorage.setItem('last-active', data.last_active);
            sessionStorage.setItem('db-active', data.last_active);
        } else {
            const string    = today.format("YYYY-MM-DD HH:mm:ss");
            sessionStorage.setItem('last-active', string);
        }
        
        sessionStorage.setItem('active-time', data.active_time);
    }).catch( error => console.error(error));
}

const sendActivity = () => {
    const data = new FormData();
    data.append('last_active', sessionStorage.getItem('last-active'));
    data.append('active_time', Math.round(sessionStorage.getItem('active-time')));
    data.append('_method', 'put');
    const user = sessionStorage.getItem('user');
    fetch(
        `${window.location.protocol}//${window.location.host}/app/users/${user}/activity`, 
        {
            method: 'post',
            headers: {
                'X-Requested-With'  : 'XMLHttpRequest',
                'X-CSRF-TOKEN'      : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            credentials: 'same-origin',
            body: data
        }
    ).then(response => {
        if(response.ok) {
            return response.json();
        } else {
            console.error(response.status, response.statusText)
        }
    }).then(data => {
        if(data.error) {
            console.error(data.message);
        } else {
            sessionStorage.setItem('db-active', sessionStorage.getItem('last-active'));
        }
    }).catch(error => console.error(error));
}

// return button

const returnBack = (target) => {
    let back = 1;
    if(target.hasAttribute('href')) {
        back = 2;
    }

    history.back(-back);
}

const returnBtn = document.querySelectorAll('.return-btn');
if(returnBtn.length) {
    returnBtn.forEach(element => {
        element.addEventListener('click', event => returnBack(event.target));
    });
}


// Document event listener
document.addEventListener('click', event => {
    let target = event.target;
    if(target.hasAttribute('data-is-delete')) {
        const url = target.getAttribute('data-delete-url');
        ConfirmDeleteModal(url);
    } else if (target.parentNode.hasAttribute('data-is-delete')){
        target = target.parentNode;
        const url = target.getAttribute('data-delete-url');
        ConfirmDeleteModal(url);
    }
    if(target.hasAttribute('data-status-update')) {
        const url   = target.getAttribute('data-status-url'),
            status  = target.getAttribute('data-status-update');
        ConfirmStatusModal(url, status);
    } else if(target.parentNode.hasAttribute('data-status-update')){
        target = target.parentNode;
        const url   = target.getAttribute('data-status-url'),
            status  = target.getAttribute('data-status-update');
        ConfirmStatusModal(url, status);
    }
});

// ChartJS defaults
const ChartsConstant = {
    colors : {
        gray: {
            100: '#f6f9fc',
            200: '#e9ecef',
            300: '#dee2e6',
            400: '#ced4da',
            500: '#adb5bd',
            600: '#8898aa',
            700: '#525f7f',
            800: '#32325d',
            900: '#212529'
        },
        theme: {
            default     : '#172b4d',
            primary     : '#0087f8',
            secondary   : '#f4f5f7',
            info        : '#11cdef',
            success     : '#2dce89',
            danger      : '#f5365c',
            warning     : '#fb6340'
        },
        black: '#12263F',
        white: '#FFFFFF',
        transparent: 'transparent',
    }, 
    locale : 'id',
    Callbacks : {
        ticks : (label, index, labels) => new Intl.NumberFormat(ChartsConstant.locale, { maximumSignificantDigits: 2 }).format(label),
        tooltipsLabel : (context) => {
            let label = context.dataset.label || '';
            if(label) { label += ' : '; }
            if(context.parsed.y !== null) { label += new Intl.NumberFormat(ChartsConstant.locale, { maximumSignificantDigits: 2 }).format(context.parsed.y)}
            return label;
        },
        tooltipsDoughnut: (context) => {
            let label = context.label || '';
            if(label) { label += ' : ' }
            if(context.parsed !== null) { label += new Intl.NumberFormat(ChartsConstant.locale, { maximumSignificantDigits: 2 }).format(context.parsed)}
            return label;
        }
    }
};

if(window.Chart) {
    // Fonts

    Chart.defaults.font.family  = "'Poppins', 'Segoe UI', 'Arial'";
    Chart.defaults.font.size    = 11;
    Chart.defaults.font.weight  = '500';
    Chart.defaults.font.color   = '#999';

    Chart.defaults.responsive           = true;
    Chart.defaults.maintainAspectRatio  = false;

    // Axis

    Chart.defaults.scale.grid.borderDash = [2];
    Chart.defaults.scale.grid.borderDashOffset = [2];
    Chart.defaults.scale.grid.color = ChartsConstant.colors.gray[300];
    Chart.defaults.scale.grid.drawBorder = false;
    Chart.defaults.scale.grid.drawTicks = false;
    Chart.defaults.scale.grid.drawOnChartArea = true;

    Chart.defaults.scale.beginsAtZero   = true;

    Chart.defaults.scale.ticks.padding  = 10;
    Chart.defaults.scale.ticks.callback= value => {
        if(!(value % 10)) {
            return value;
        }
    }

    // Interaction
    Chart.defaults.interaction.intersect = false;

    // Elements

    Chart.defaults.elements.line.tension = .4;
    Chart.defaults.elements.line.borderWidth = 4;
    Chart.defaults.elements.line.borderCapStyle = 'rounded';

    // Legend

    Chart.defaults.plugins.legend.display = false;

    // Tooltip

    Chart.defaults.plugins.tooltip.backgroundColor  = '#000';
    Chart.defaults.plugins.tooltip.titleFont = {
        family : "'Poppins', 'Segoe UI', 'Arial'",
        color  : '#fff',
        size   : 20,
        weight : 'bold'
    }
    Chart.defaults.plugins.tooltip.padding          = 10;
    Chart.defaults.plugins.tooltip.cornerRadius     = 3;

}

// Template default programs below (a bit modified tho)

$(function () {
    $(".custom-scroll").niceScroll();
    $(".custom-scroll-horizontal").niceScroll();
    $(".activity-wrap").niceScroll();
});

$(document).ready(function () {
    if($("#float-btn").length){
        $('#float-btn').on('click', () => {
            $('#float-btn').toggleClass('open');
        });
    }
    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }

    if ($(".datepicker-range").length) {
        $('.datepicker-range').daterangepicker({
            rangeDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }

    let dataTables = document.querySelectorAll('table.dataTable');
    if(dataTables.length) {
        dataTables.forEach(table => {
            if(!table.classList.contains('no-paginate')) {
                DataTable(table);
            }
        });
    }
    dataTables = document.querySelector('#dataTable');
    if(dataTables) {
        DataTable(dataTables);
    }
});


function toastrs(title, message, status) {

    toastr[status](message, title)
}

$(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {
    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');
    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);
    $.ajax({
        url: url,
        success: function (data) {
            $('#commonModal .modal-body').html(data);
            $("#commonModal").modal('show');
            taskCheckbox();
            common_bind("#commonModal");
            common_bind_select("#commonModal");

        },
        error: function (data) {
            data = data.responseJSON;
            toastrs('Error', data.error, 'error')
        }
    });

});

$(document).on('click', 'a[data-ajax-popup-over="true"], button[data-ajax-popup-over="true"], div[data-ajax-popup-over="true"]', function () {

    var validate = $(this).attr('data-validate');
    var id = '';
    if (validate) {
        id = $(validate).val();
    }

    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');

    $("#commonModalOver .modal-title").html(title);
    $("#commonModalOver .modal-dialog").addClass('modal-' + size);

    $.ajax({
        url: url + '?id=' + id,
        success: function (data) {
            $('#commonModalOver .modal-body').html(data);
            $("#commonModalOver").modal('show');
            taskCheckbox();
        },
        error: function (data) {
            data = data.responseJSON;
            toastrs('Error', data.error, 'error')
        }
    });

});

function arrayToJson(form) {
    var data = $(form).serializeArray();
    var indexed_array = {};

    $.map(data, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

$(document).on("submit", "#commonModalOver form", function (e) {
    e.preventDefault();
    var data = arrayToJson($(this));
    data.ajax = true;

    var url = $(this).attr('action');
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (data) {
            toastrs('Success', data.success, 'success');
            $(data.target).append('<option value="' + data.record.id + '">' + data.record.name + '</option>');
            $(data.target).val(data.record.id);
            $(data.target).trigger('change');
            $("#commonModalOver").modal('hide');

            $(".selectric").selectric({
                disableOnMobile: false,
                nativeOnMobile: false
            });

        },
        error: function (data) {
            data = data.responseJSON;
            toastrs('Error', data.error, 'error')
        }
    });
});

function common_bind(selector = "body") {
    var $datepicker = $(selector + ' .datepicker');
    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });

    }
    if ($(".custom-datepicker").length) {
        $('.custom-datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'Y-MM',
            locale: {
                format: 'Y-MM'
            }
        });

    }
}

function common_bind_select(selector = "body") {
    if (jQuery().selectric) {
        $(".selectric").selectric({
            disableOnMobile: false,
            nativeOnMobile: false,
        }).on('change', event => {
            SelectricChangeCallbacks.forEach(callback => {
                callback(event);
            });
        });
    }
    if ($(".jscolor").length) {
        jscolor.installByClassName("jscolor");
    }
}

function common_bind_confirmation() {

    $('[data-confirm]').each(function () {
        var me = $(this),
            me_data = me.data('confirm');

        me_data = me_data.split("|");
        me.fireModal({
            title: me_data[0],
            body: me_data[1],
            buttons: [
                {
                    text: me.data('confirm-text-yes') || 'Yes',
                    class: 'btn btn-danger btn-shadow',
                    handler: function () {
                        eval(me.data('confirm-yes'));
                    }
                },
                {
                    text: me.data('confirm-text-cancel') || 'Cancel',
                    class: 'btn btn-secondary',
                    handler: function (modal) {
                        $.destroyModal(modal);
                        eval(me.data('confirm-no'));
                    }
                }
            ]
        })
    });
}

function taskCheckbox() {
    var checked = 0;
    var count = 0;
    var percentage = 0;

    count = $("#check-list input[type=checkbox]").length;
    checked = $("#check-list input[type=checkbox]:checked").length;
    percentage = parseInt(((checked / count) * 100), 10);
    if (isNaN(percentage)) {
        percentage = 0;
    }
    $(".custom-label").text(percentage + "%");
    $('#taskProgress').css('width', percentage + '%');


    $('#taskProgress').removeClass('bg-warning');
    $('#taskProgress').removeClass('bg-primary');
    $('#taskProgress').removeClass('bg-success');
    $('#taskProgress').removeClass('bg-danger');

    if (percentage <= 15) {
        $('#taskProgress').addClass('bg-danger');
    } else if (percentage > 15 && percentage <= 33) {
        $('#taskProgress').addClass('bg-warning');
    } else if (percentage > 33 && percentage <= 70) {
        $('#taskProgress').addClass('bg-primary');
    } else {
        $('#taskProgress').addClass('bg-success');
    }
}

(function ($, window, i) {


    // Bootstrap 4 Modal
    $.fn.fireModal = function (options) {
        var options = $.extend({
            size: 'modal-md',
            center: false,
            animation: true,
            title: 'Modal Title',
            closeButton: true,
            header: true,
            bodyClass: '',
            footerClass: '',
            body: '',
            buttons: [],
            autoFocus: true,
            created: function () {
            },
            appended: function () {
            },
            onFormSubmit: function () {
            },
            modal: {}
        }, options);

        this.each(function () {
            i++;
            var id = 'fire-modal-' + i,
                trigger_class = 'trigger--' + id,
                trigger_button = $('.' + trigger_class);

            $(this).addClass(trigger_class);

            // Get modal body
            let body = options.body;

            if (typeof body == 'object') {
                if (body.length) {
                    let part = body;
                    body = body.removeAttr('id').clone().removeClass('modal-part');
                    part.remove();
                } else {
                    body = '<div class="text-danger">Modal part element not found!</div>';
                }
            }

            // Modal base template
            var modal_template = '   <div class="modal' + (options.animation == true ? ' fade' : '') + '" tabindex="-1" role="dialog" id="' + id + '">  ' +
                '     <div class="modal-dialog ' + options.size + (options.center ? ' modal-dialog-centered' : '') + '" role="document">  ' +
                '       <div class="modal-content">  ' +
                ((options.header == true) ?
                    '         <div class="modal-header">  ' +
                    '           <h5 class="modal-title">' + options.title + '</h5>  ' +
                    ((options.closeButton == true) ?
                        '           <button type="button" class="close" data-dismiss="modal" aria-label="Close">  ' +
                        '             <span aria-hidden="true">&times;</span>  ' +
                        '           </button>  '
                        : '') +
                    '         </div>  '
                    : '') +
                '         <div class="modal-body">  ' +
                '         </div>  ' +
                (options.buttons.length > 0 ?
                    '         <div class="modal-footer">  ' +
                    '         </div>  '
                    : '') +
                '       </div>  ' +
                '     </div>  ' +
                '  </div>  ';

            // Convert modal to object
            var modal_template = $(modal_template);

            // Start creating buttons from 'buttons' option
            var this_button;
            options.buttons.forEach(function (item) {
                // get option 'id'
                let id = "id" in item ? item.id : '';

                // Button template
                this_button = '<button type="' + ("submit" in item && item.submit == true ? 'submit' : 'button') + '" class="' + item.class + '" id="' + id + '">' + item.text + '</button>';

                // add click event to the button
                this_button = $(this_button).off('click').on("click", function () {
                    // execute function from 'handler' option
                    item.handler.call(this, modal_template);
                });
                // append generated buttons to the modal footer
                $(modal_template).find('.modal-footer').append(this_button);
            });

            // append a given body to the modal
            $(modal_template).find('.modal-body').append(body);

            // add additional body class
            if (options.bodyClass) $(modal_template).find('.modal-body').addClass(options.bodyClass);

            // add footer body class
            if (options.footerClass) $(modal_template).find('.modal-footer').addClass(options.footerClass);

            // execute 'created' callback
            options.created.call(this, modal_template, options);

            // modal form and submit form button
            let modal_form = $(modal_template).find('.modal-body form'),
                form_submit_btn = modal_template.find('button[type=submit]');

            // append generated modal to the body
            $("body").append(modal_template);

            // execute 'appended' callback
            options.appended.call(this, $('#' + id), modal_form, options);

            // if modal contains form elements
            if (modal_form.length) {
                // if `autoFocus` option is true
                if (options.autoFocus) {
                    // when modal is shown
                    $(modal_template).on('shown.bs.modal', function () {
                        // if type of `autoFocus` option is `boolean`
                        if (typeof options.autoFocus == 'boolean')
                            modal_form.find('input:eq(0)').focus(); // the first input element will be focused
                        // if type of `autoFocus` option is `string` and `autoFocus` option is an HTML element
                        else if (typeof options.autoFocus == 'string' && modal_form.find(options.autoFocus).length)
                            modal_form.find(options.autoFocus).focus(); // find elements and focus on that
                    });
                }

                // form object
                let form_object = {
                    startProgress: function () {
                        modal_template.addClass('modal-progress');
                    },
                    stopProgress: function () {
                        modal_template.removeClass('modal-progress');
                    }
                };

                // if form is not contains button element
                if (!modal_form.find('button').length) $(modal_form).append('<button class="d-none" id="' + id + '-submit"></button>');

                // add click event
                form_submit_btn.on('click', function () {
                    modal_form.submit();
                });

                // add submit event
                modal_form.submit(function (e) {
                    // start form progress
                    form_object.startProgress();

                    // execute `onFormSubmit` callback
                    options.onFormSubmit.call(this, modal_template, e, form_object);
                });
            }

            $(document).on("click", '.' + trigger_class, function () {
                $('#' + id).modal(options.modal);

                return false;
            });
        });
    }

    // Bootstrap Modal Destroyer
    $.destroyModal = function (modal) {
        modal.modal('hide');
        modal.on('hidden.bs.modal', function () {
        });
    }
})(jQuery, this, 0);

// var Charts = (function () {

//     // Variable

//     var $toggle = $('[data-toggle="chart"]');
//     var mode = 'light';//(themeMode) ? themeMode : 'light';
//     var fonts = {
//         base: 'Open Sans'
//     }

//     // Colors
//     var colors = {
//         gray: {
//             100: '#f6f9fc',
//             200: '#e9ecef',
//             300: '#dee2e6',
//             400: '#ced4da',
//             500: '#adb5bd',
//             600: '#8898aa',
//             700: '#525f7f',
//             800: '#32325d',
//             900: '#212529'
//         },
//         theme: {
//             'default': '#172b4d',
//             'primary': '#5e72e4',
//             'secondary': '#f4f5f7',
//             'info': '#11cdef',
//             'success': '#2dce89',
//             'danger': '#f5365c',
//             'warning': '#fb6340'
//         },
//         black: '#12263F',
//         white: '#FFFFFF',
//         transparent: 'transparent',
//     };


//     // Methods

//     // Chart.js global options
//     // function chartOptions() {

//     //     // Options
//     //     var options = {
//     //         defaults: {
//     //             responsive: true,
//     //             maintainAspectRatio: false,
//     //             defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
//     //             defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
//     //             defaultFontFamily: fonts.base,
//     //             defaultFontSize: 13,
//     //             layout: {
//     //                 padding: 0
//     //             },
//     //             elements: {
//     //                 point: {
//     //                     radius: 0,
//     //                     backgroundColor: colors.theme['primary']
//     //                 },
//     //                 line: {
//     //                     tension: .4,
//     //                     borderWidth: 4,
//     //                     borderColor: colors.theme['primary'],
//     //                     backgroundColor: colors.transparent,
//     //                     borderCapStyle: 'rounded'
//     //                 },
//     //                 bar: {
//     //                     backgroundColor: colors.theme['warning']
//     //                 },
//     //                 arc: {
//     //                     backgroundColor: colors.theme['primary'],
//     //                     borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
//     //                     borderWidth: 4
//     //                 }
//     //             },
//     //             plugins: {
//     //                 legend: {
//     //                     display: false,
//     //                     position: 'bottom',
//     //                     labels: {
//     //                         usePointStyle: true,
//     //                         padding: 16
//     //                     }
//     //                 },
//     //                 tooltip: {
//     //                     enabled: true,
//     //                     mode: 'index',
//     //                     intersect: false,
//     //                 }
//     //             }
//     //         },
//     //         overrides: {
//     //             doughnut: {
//     //                 cutoutPercentage: 83,
//     //                 legendCallback: function (chart) {
//     //                     var data = chart.data;
//     //                     var content = '';

//     //                     data.labels.forEach(function (label, index) {
//     //                         var bgColor = data.datasets[0].backgroundColor[index];

//     //                         content += '<span class="chart-legend-item">';
//     //                         content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
//     //                         content += label;
//     //                         content += '</span>';
//     //                     });

//     //                     return content;
//     //                 }
//     //             }
//     //         }
//     //     }

//     //     // Axes
//     //     // Chart.defaults.scale.grid = {
//     //     //     borderDash: [2],
//     //     //     borderDashOffset: [2],
//     //     //     color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
//     //     //     drawBorder: false,
//     //     //     drawTicks: false,
//     //     //     drawOnChartArea: true,
//     //     //     zeroLineWidth: 0,
//     //     //     zeroLineColor: 'rgba(0,0,0,0)',
//     //     //     zeroLineBorderDash: [2],
//     //     //     zeroLineBorderDashOffset: [2]
//     //     // };
//     //     // Chart.defaults.scale.ticks= {
//     //     //     beginAtZero: true,
//     //     //     padding: 10,
//     //     //     callback: function (value) {
//     //     //         if (!(value % 10)) {
//     //     //             return value
//     //     //         }
//     //     //     }
//     //     // };

//     //     return options;

//     // }

//     // Parse global options
//     function parseOptions(parent, options) {
//         for (var item in options) {
//             if (typeof options[item] !== 'object') {
//                 parent[item] = options[item];
//             } else {
//                 parseOptions(parent[item], options[item]);
//             }
//         }
//     }

//     // Push options
//     function pushOptions(parent, options) {
//         for (var item in options) {
//             if (Array.isArray(options[item])) {
//                 options[item].forEach(function (data) {
//                     parent[item].push(data);
//                 });
//             } else {
//                 pushOptions(parent[item], options[item]);
//             }
//         }
//     }

//     // Pop options
//     function popOptions(parent, options) {
//         for (var item in options) {
//             if (Array.isArray(options[item])) {
//                 options[item].forEach(function (data) {
//                     parent[item].pop();
//                 });
//             } else {
//                 popOptions(parent[item], options[item]);
//             }
//         }
//     }

//     // Toggle options
//     function toggleOptions(elem) {
//         var options = elem.data('add');
//         var $target = $(elem.data('target'));
//         var $chart = $target.data('chart');

//         if (elem.is(':checked')) {

//             // Add options
//             pushOptions($chart, options);

//             // Update chart
//             $chart.update();
//         } else {

//             // Remove options
//             popOptions($chart, options);

//             // Update chart
//             $chart.update();
//         }
//     }

//     // Update options
//     function updateOptions(elem) {
//         var options = elem.data('update');
//         var $target = $(elem.data('target'));
//         var $chart = $target.data('chart');

//         // Parse options
//         parseOptions($chart, options);

//         // Toggle ticks
//         toggleTicks(elem, $chart);

//         // Update chart
//         $chart.update();
//     }

//     // Toggle ticks
//     function toggleTicks(elem, $chart) {

//         if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
//             var prefix = elem.data('prefix') ? elem.data('prefix') : '';
//             var suffix = elem.data('suffix') ? elem.data('suffix') : '';

//             // Update ticks
//             $chart.options.scales.yAxes[0].ticks.callback = function (value) {
//                 if (!(value % 10)) {
//                     return prefix + value + suffix;
//                 }
//             }

//             // Update tooltips
//             $chart.options.tooltips.callbacks.label = function (item, data) {
//                 var label = data.datasets[item.datasetIndex].label || '';
//                 var yLabel = item.yLabel;
//                 var content = '';

//                 if (data.datasets.length > 1) {
//                     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
//                 }

//                 content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
//                 return content;
//             }

//         }
//     }


//     // Events

//     // Parse global options
//     if (window.Chart) {
//         parseOptions(Chart, chartOptions());
//     }

//     // Toggle options
//     $toggle.on({
//         'change': function () {
//             var $this = $(this);

//             if ($this.is('[data-add]')) {
//                 toggleOptions($this);
//             }
//         },
//         'click': function () {
//             var $this = $(this);

//             if ($this.is('[data-update]')) {
//                 updateOptions($this);
//             }
//         }
//     });


//     // Return

//     return {
//         colors: colors,
//         fonts: fonts,
//         mode: mode
//     };

// })();
