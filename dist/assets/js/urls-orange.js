"use strict";var wrapperList=document.querySelector("#wrapper-list"),cities=["leon","queretaro","nicolas-romero","toluca","veracruz","torreon","guadalajara","tepic","culiacan","tuxtla","puebla","morelia","hermosillo","durango","xalapa","mochis","mazatlan","obregon","guaymas"],orangeCamp=["display","fb-branding","fb-breach","fb-conversions","fb-trafico","video"];function renderList(a,r){a.forEach(function(o){var a=document.createElement("h5"),e=document.createTextNode(o);a.appendChild(e),wrapperList.appendChild(a),r.forEach(function(a){var e=document.createElement("a"),r=document.createTextNode("https://megacable-promociones.com.mx/mega-movil/?campaign=".concat(a,"&city=").concat(o,"&ag=or&page=entry"));e.appendChild(r),e.href="https://megacable-promociones.com.mx/mega-movil/?campaign=".concat(a,"&city=").concat(o,"&ag=or&page=entry"),e.target="_blank",wrapperList.appendChild(e)})})}renderList(cities,orangeCamp);