/* Author: 

*/



// 
// String extensions
//

String.format = function () {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i = i + 1) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(reg, arguments[i + 1]);
    }

    return s;
};



















