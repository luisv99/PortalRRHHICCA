!function(n){"use strict";function t(n){for(var t=n+"=",e=decodeURIComponent(document.cookie).split(";"),a=0;a<e.length;a++){for(var o=e[a];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return""}function e(n,t){document.cookie=n+"="+t+";expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/"}document.addEventListener("wpcf7mailsent",function(a){var o=t("wp-pdf_path"),p=t("wp-enable_pdf_link"),r=t("wp-pdf_download_link_txt");"true"==p&&o&&setTimeout(function(){n(".wpcf7").hasClass("wpcf7-mail-sent-ok")?(n(".wpcf7-mail-sent-ok").append('<br><a class="download-lnk-pdf" href="'+o+'" target="_blank">'+r+"</a>"),e("pdf_path","")):(n(".wpcf7-response-output").append('<br><a class="download-lnk-pdf" href="'+o+'" target="_blank">'+r+"</a>"),e("pdf_path",""))},250)},!1)}(jQuery);