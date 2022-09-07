/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if (document.getElementById('flash-message')) {
    const thisAlert = document.getElementById('flash-message');
    thisAlert.addEventListener('click', function () {
        thisAlert.classList.add('d-none');
    })
}

if (document.getElementById('delete-btn')) {
    const thisBtn = document.getElementById('delete-btn');
    thisBtn.addEventListener('click', function () {
        const thisBox = document.getElementById('delete-box');
        thisBox.classList.remove('d-none');
    })

    const notDelete = document.getElementById('not-delete');
    notDelete.addEventListener('click', function() {
        const thisBox = document.getElementById('delete-box');
        thisBox.classList.add('d-none');
    })
}

