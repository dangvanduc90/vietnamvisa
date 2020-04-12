//function validation
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validName(name) {
    var rexName = /^[a-zA-Z0-9\á\à\?\ã\?\a\?\?\?\?\?\â\?\?\?\?\?\d\é\è\?\?\?\ê\?\?\?\?\?\í\ì\?\i\?\ó\ò\?\õ\?\ô\?\?\?\?\?\o\?\?\?\?\?\ú\ù\?\u\?\u\?\?\?\?\ý\?\?\?\?\Á\À\?\Ã\?\A\?\?\?\?\?\Â\?\?\?\?\?\Ð\É\È\?\?\?\Ê\?\?\?\?\?\Í\Ì\?\I\?\Ó\Ò\?\Õ\?\Ô\?\?\?\?\?\O\?\?\?\?\?\Ú\Ù\?\U\?\U\?\?\?\?\Ý\?\?\?\?\.\-\_\s]+$/;
    return rexName.test(name); 
}
function checkInputEmpty(fieldValue){
    if (typeof fieldValue !== 'undefined' && fieldValue !== null && fieldValue.search(/[^\n\s]/) !== -1 ){
        return false;
    } else {
        return true;
    }
}

// Expect input as d/m/y: check valid date
function isValidDate(s) {
  var bits = s.split('/');
  var d = new Date(bits[2], bits[1] - 1, bits[0]);
  return d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]);
}

function isValidDateTime(d) {
    if ( Object.prototype.toString.call(d) === "[object Date]" ) {
      // it is a date
      if ( isNaN( d.getTime() ) ) {  // d.valueOf() could also work
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
}

// Format curerency
function currencyFormat (num, unit) {
    if (typeof unit === 'undefined') {
        unit = 'VNĐ';
    }
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + " "+unit;
}

//hide phone number
function hidePhone(phoneNumber) {
    return phoneNumber.replace(/(\d{3})\d{4}/,"$1xxxx");
}


//leading zero number
function padNumber(n) {
    n = parseInt(n);
    return (n < 10) ? ("0" + n) : n.toString();
}

//unique array()
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}
function arrayUnique(arr){
    return arr.filter(onlyUnique);
}

Array.prototype.removeElement = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};

// set get cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

$(function(){
    $.fn.scrollTo = function(speed){
        if (!speed) {
            speed = 1000;
        }
        $('html, body').animate({
            scrollTop: this.offset().top - 150
        }, speed);
    }
});

function getUrlVars(url,name)
{
    var vars = [], hash;
    var hashes = url.slice(url.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars[hash[0]] = hash[1];
    }
    if (name) {
        if (vars[name]) {
            return vars[name];    
        }
    }
    return vars;
}