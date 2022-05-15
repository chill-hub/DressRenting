require('./bootstrap');
const feather = require('feather-icons');

feather.replace();
window.classicEditor = require('@ckeditor/ckeditor5-build-classic');
window.select2= require('select2');
window.slugify = function(text){
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
}
