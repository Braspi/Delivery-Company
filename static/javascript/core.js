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

function onMount(callback) {
    window.addEventListener('load', (e) => {
        callback(e)
    })
}