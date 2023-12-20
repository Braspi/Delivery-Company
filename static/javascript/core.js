const notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
});

async function post(url, body, callback) {
    const res = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(body)
    })
    const data = await res.json();
    if (processError(data)) callback()
}
async function get(url, callback) {
    const res = await fetch(url)
    const data = await res.json();
    if (processError(data)) callback()
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