if (typeof jQuery === 'undefined') includeJQuery();

function includeJQuery() {
    let newjs = document.createElement('script');
    newjs.type = 'text/javascript';
    newjs.src = '//code.jquery.com/jquery-3.3.1.js';
    document.head.append(newjs);
}

function setFormAutoAJAX() {
    $(document).on('submit', 'form', function () {
        formajax($(this));
        return false;
    });
}

function sleep(millisecond = 0) {
    let start = new Date().getTime();
    while (new Date().getTime() - start < millisecond) {
    }
}

function formajax(form = '', callBack = defaultAjaxCallBack) {
    if (typeof form === 'string') form = $(form);
    let url = form.attr('action');
    let method = form.attr('method');
    let data = getFormData(form);
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: callBack
    });
}

function objToStr(obj) {
    let result = '';
    if (typeof obj === 'object') {
        let vararr = [];
        for (let i in obj) {
            vararr.push(i + '=' + obj[i]);
        }
        result = vararr.join('&');
    }
    return result;
}

function defaultAjaxCallBack(response) {
    let debug = false;
    try {
        let data = JSON.parse(response);
        if (typeof data.javascript !== 'undefined') eval(data.javascript);
        if (debug) console.log(data);
    } catch (e) {
        if (debug) console.log(response);
    }
}

function getFormData(form) {
    if (typeof form === 'string') form = $(form);
    let unindexed_array = form.serializeArray();
    let indexed_array = {};
    $.map(unindexed_array, function (n, i) {
        if (n['name'].indexOf('[]') !== -1) {
            let arrayName = n['name'].replace('[]','');
            if (typeof indexed_array[arrayName] === 'undefined') indexed_array[arrayName] = [];
            indexed_array[arrayName].push(n['value']);
        } else {
            indexed_array[n['name']] = n['value'];
        }
    });
    return indexed_array;
}

function refreshResultArea(msg) {
    document.getElementById('ResultArea').value += msg + "\n";
}