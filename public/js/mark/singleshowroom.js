!function(e){function t(o){if(r[o])return r[o].exports;var a=r[o]={i:o,l:!1,exports:{}};return e[o].call(a.exports,a,a.exports,t),a.l=!0,a.exports}var r={};t.m=e,t.c=r,t.i=function(e){return e},t.d=function(e,r,o){t.o(e,r)||Object.defineProperty(e,r,{configurable:!1,enumerable:!0,get:o})},t.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(r,"a",r),r},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="./",t(t.s=135)}({121:function(e,t){for(donut[0].value||donut[1].value||donut[2].value?($("#pending").text(donut[2].value),$("#resc").text(donut[1].value),$("#done").text(donut[0].value),Morris.Donut({element:"morris-donut-chart",data:donut,resize:!0,colors:["#99d683","#FB9678","#6164c1"]})):$("#morris-donut-chart").html('<h1 style="margin-top:40%;">Not enough data to Render The Chart</h1>').addClass("text-center"),i=0;i<areadata.length;++i)areadata[i].week=moment().day("Monday").week(areadata[i].period).format("YYYY-MM-DD");Morris.Area({element:"morris-area-chart2",data:areadata,xkey:"week",ykeys:["total"],labels:["Sales Total"],pointSize:0,fillOpacity:.4,pointStrokeColors:["#01c0c8"],behaveLikeLine:!0,gridLineColor:"rgba(255, 255, 255, 0.1)",lineWidth:0,gridTextColor:"#96a2b4",smooth:!1,hideHover:"auto",lineColors:["#01c0c8"],resize:!0})},135:function(e,t,r){e.exports=r(121)}});