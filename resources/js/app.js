require('bootstrap');

require('./script');
document.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;
window.$=window.jQuery=require('jquery');
require("./announceImages");
require('./rps');
