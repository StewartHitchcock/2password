import './bootstrap';

window.revealPassword = function (revealButton) {
    console.log('test');
    let x = document.getElementById(revealButton.id);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

window.copyPassword = function (field) {

    var copyText = document.getElementById(field.id);
    copyText.select();
    navigator.clipboard.writeText(copyText.value);
    alert("Password copied");
}
