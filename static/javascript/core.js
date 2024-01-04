const notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
});

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
function get(url, callback) {
    (async () => {
        const res = await fetch(url)
        const data = await res.json();
        if (processError(data)) callback(data)
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
    return document.getElementById(id).value;
}