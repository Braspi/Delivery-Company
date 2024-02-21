const notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
});

function _delete(url, body, callback) {
    (async () => {
        const res = await fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        callback(res)
    })();
}
function post(url, body, callback) {
    (async () => {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        })
        const data = await res.json();
        if (processError(data)) callback(data)
    })();
}
function put(url, body, callback) {
    (async () => {
        const res = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        })
        const data = await res.json();
        if (processError(data)) callback(data)
    })();
}
function get(url, callback) {
    (async () => {
        const res = await fetch(url, {
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const data = await res.json();
        callback(data)
    })();
}
function processError(data) {
    if(data.success === false) {
        if(data.message) {
            notyf.error(data.message);
        } else if(data.errors) {
            notyf.error(Object.values(data.errors)[0]);
        }
    }
    return data.success
}

function redirect(url, blank=false) {
    if (blank) window.open(url)
    else window.location.href = url
}

function refId(id) {
    if(document.getElementById(id) == null) return null
    return document.getElementById(id).value;
}
function value(id, value) {
    if(document.getElementById(id) != null) document.getElementById(id).value = value;
}
function getSelectValue(id) {
    if (document.getElementById(id) == null) return null
    const element = document.getElementById(id)
    return element.options[element.selectedIndex].value
}
function setSelectValue(id) {
    if (document.getElementById(id) == null) return null
    const element = document.getElementById(id)
    for(let i=0; i < element.options.length; i++) {
        element.options[0].selected = ''
        if(element.options[i].value == value) {
            element.selected = 'selected'
            break;
        }
    }
}
function onMount(callback) {
    window.addEventListener('load', (e) => {
        callback(e)
    })
}

function makeId(length) {
    const CHARACTERS = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    let result = '';
    for (let i = 0; i < length; i++){
        result += CHARACTERS.charAt(Math.floor(Math.random() * CHARACTERS.length));
    }
    return result;
}