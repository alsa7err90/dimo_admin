// import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;
import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import Push from 'push.js';

const inputElements = document.querySelectorAll('input[type="file"].filepond');
const filepondOneNoServes = document.querySelectorAll('input[type="file"].filepondOneNoServes');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

FilePond.registerPlugin(FilePondPluginImagePreview);

for (let i = 0; i < inputElements.length; i++) {
    FilePond.create(inputElements[i]).setOptions({
        server: {
            timeout: 7000,
            process: {
                url: '/media/process',
                method: 'POST',
                headers: {
                    'x-csrf-token': csrfToken,
                },
                withCredentials: false,
                onload: (response) => response.key,
                onerror: (response) => response.data,
                ondata: (formData) => {
                    formData.append('Hello', 'World');
                    return formData;
                },
            },
            revert: '/media/revert',
            restore: './restore/',
            load: './load/',
            fetch: './fetch/',
        },
        allowMultiple: true,

    });
    FilePond.create(filepondOneNoServes[i]);
}

import 'magnific-popup';

if ($('.video-link').length) {
    $('.video-link').magnificPopup({
        type: 'iframe'
    });
}

if ($('.popup-gallery').length) {

    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title') + `<small>by ${app_name}</small>`;

            }
        }

    });

}

function pushNotification(title, body = '', icon = '') {
    Push.create(title, {
    body: body,
    icon: icon,
    timeout: 4000,
    onClick: function () {
    window.focus();
    this.close();
    }
    });
    }
    window.pushNotification = pushNotification;

