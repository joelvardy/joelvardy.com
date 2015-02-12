"function"!=typeof String.prototype.startsWith&&(String.prototype.startsWith=function(e){return 0===this.indexOf(e)}),window.addEventListener("load",function(){ga(function(){for(var e=document.getElementsByTagName("a"),t=0;t<e.length;t++)e[t].addEventListener("click",function(e){if(this.dataset.analytics){var t=this;e.preventDefault(),ga("send","event","External","Exit Website",this.dataset.analytics,{hitCallback:function(){document.location.href=t.href}})}},!1)});var e=function(){if(document.querySelector("section[page=projects]")){var e=document.querySelector("section[page=projects] a.filter"),t="#contract"!==window.location.hash,n={hide:{href:"/projects#contract",title:"Hide all side and personal projects",text:"show only contract work"},show:{href:"/projects",title:"Show all projects",text:"show all projects"}},a=function(){window.history.replaceState(null,null,t?n.show.href:n.hide.href),t=!t;var a=t?n.show:n.hide;e.setAttribute("href",a.href),e.setAttribute("title",a.title),e.innerHTML=a.text;for(var r=document.querySelectorAll("section[page=projects] div.project"),i=0;i<r.length;++i){var o=r[i];if(t){if(o.classList.contains("contract"))continue;o.style.display="none"}else o.style.display="block"}};e.addEventListener("click",function(e){e.preventDefault(),a()}),a()}};e();var t=function(e){for(var t=document.querySelectorAll("div.photo.full-width"),n=0;n<t.length;++n){var a=t[n],r=a.querySelector("img");null==e&&(a.style.backgroundImage="url("+r.src+")",r.parentNode.removeChild(r));var i=(document.querySelector("body"),Math.ceil((document.documentElement.clientWidth-parseFloat(window.getComputedStyle(document.body).width))/2));a.style.marginLeft=-i+"px",a.style.marginRight=-i+"px"}};t(),window.addEventListener("resize",t,!1);var n=function(){for(var e=document.querySelectorAll("div.gallery"),t=0;t<e.length;++t)for(var n=e[t],a=n.querySelectorAll("div.photo"),t=0;t<a.length;++t){var r=a[t].querySelector("img");a[t].style.backgroundImage="url("+r.src+")",r.parentNode.removeChild(r)}};n();var a=function(e){for(var t=document.getElementsByTagName("a"),n=0;n<t.length;n++)t[n].getAttribute("href").startsWith("#")&&t[n].addEventListener("click",function(t){t.preventDefault();var n=document.getElementById(t.target.getAttribute("href").substring(1)).offsetTop,a=(new window.Scroller).easing(window.Scroller.easing.easeInOutQuad);a.to(0,n,e)},!1)};a(250),window.applicationCache.addEventListener("updateready",function(){window.applicationCache.status==window.applicationCache.UPDATEREADY&&window.location.reload()},!1)}),function(){var e=/\blang(?:uage)?-(?!\*)(\w+)\b/i,t=self.Prism={util:{type:function(e){return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1]},clone:function(e){var n=t.util.type(e);switch(n){case"Object":var a={};for(var r in e)e.hasOwnProperty(r)&&(a[r]=t.util.clone(e[r]));return a;case"Array":return e.slice()}return e}},languages:{extend:function(e,n){var a=t.util.clone(t.languages[e]);for(var r in n)a[r]=n[r];return a},insertBefore:function(e,n,a,r){r=r||t.languages;var i=r[e],o={};for(var s in i)if(i.hasOwnProperty(s)){if(s==n)for(var l in a)a.hasOwnProperty(l)&&(o[l]=a[l]);o[s]=i[s]}return r[e]=o},DFS:function(e,n){for(var a in e)n.call(e,a,e[a]),"Object"===t.util.type(e)&&t.languages.DFS(e[a],n)}},highlightAll:function(e,n){for(var a,r=document.querySelectorAll('code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'),i=0;a=r[i++];)t.highlightElement(a,e===!0,n)},highlightElement:function(a,r,i){for(var o,s,l=a;l&&!e.test(l.className);)l=l.parentNode;if(l&&(o=(l.className.match(e)||[,""])[1],s=t.languages[o]),s){a.className=a.className.replace(e,"").replace(/\s+/g," ")+" language-"+o,l=a.parentNode,/pre/i.test(l.nodeName)&&(l.className=l.className.replace(e,"").replace(/\s+/g," ")+" language-"+o);var c=a.textContent;if(c){c=c.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/\u00a0/g," ");var u={element:a,language:o,grammar:s,code:c};if(t.hooks.run("before-highlight",u),r&&self.Worker){var g=new Worker(t.filename);g.onmessage=function(e){u.highlightedCode=n.stringify(JSON.parse(e.data),o),t.hooks.run("before-insert",u),u.element.innerHTML=u.highlightedCode,i&&i.call(u.element),t.hooks.run("after-highlight",u)},g.postMessage(JSON.stringify({language:u.language,code:u.code}))}else u.highlightedCode=t.highlight(u.code,u.grammar,u.language),t.hooks.run("before-insert",u),u.element.innerHTML=u.highlightedCode,i&&i.call(a),t.hooks.run("after-highlight",u)}}},highlight:function(e,a,r){return n.stringify(t.tokenize(e,a),r)},tokenize:function(e,n){var a=t.Token,r=[e],i=n.rest;if(i){for(var o in i)n[o]=i[o];delete n.rest}e:for(var o in n)if(n.hasOwnProperty(o)&&n[o]){var s=n[o],l=s.inside,c=!!s.lookbehind,u=0;s=s.pattern||s;for(var g=0;g<r.length;g++){var d=r[g];if(r.length>e.length)break e;if(!(d instanceof a)){s.lastIndex=0;var p=s.exec(d);if(p){c&&(u=p[1].length);var f=p.index-1+u,p=p[0].slice(u),h=p.length,m=f+h,w=d.slice(0,f+1),y=d.slice(m+1),v=[g,1];w&&v.push(w);var b=new a(o,l?t.tokenize(p,l):p);v.push(b),y&&v.push(y),Array.prototype.splice.apply(r,v)}}}}return r},hooks:{all:{},add:function(e,n){var a=t.hooks.all;a[e]=a[e]||[],a[e].push(n)},run:function(e,n){var a=t.hooks.all[e];if(a&&a.length)for(var r,i=0;r=a[i++];)r(n)}}},n=t.Token=function(e,t){this.type=e,this.content=t};if(n.stringify=function(e,a,r){if("string"==typeof e)return e;if("[object Array]"==Object.prototype.toString.call(e))return e.map(function(t){return n.stringify(t,a,e)}).join("");var i={type:e.type,content:n.stringify(e.content,a,r),tag:"span",classes:["token",e.type],attributes:{},language:a,parent:r};"comment"==i.type&&(i.attributes.spellcheck="true"),t.hooks.run("wrap",i);var o="";for(var s in i.attributes)o+=s+'="'+(i.attributes[s]||"")+'"';return"<"+i.tag+' class="'+i.classes.join(" ")+'" '+o+">"+i.content+"</"+i.tag+">"},!self.document)return void self.addEventListener("message",function(e){var n=JSON.parse(e.data),a=n.language,r=n.code;self.postMessage(JSON.stringify(t.tokenize(r,t.languages[a]))),self.close()},!1);var a=document.getElementsByTagName("script");a=a[a.length-1],a&&(t.filename=a.src,document.addEventListener&&!a.hasAttribute("data-manual")&&document.addEventListener("DOMContentLoaded",t.highlightAll))}(),Prism.languages.markup={comment:/&lt;!--[\w\W]*?-->/g,prolog:/&lt;\?.+?\?>/,doctype:/&lt;!DOCTYPE.+?>/,cdata:/&lt;!\[CDATA\[[\w\W]*?]]>/i,tag:{pattern:/&lt;\/?[\w:-]+\s*(?:\s+[\w:-]+(?:=(?:("|')(\\?[\w\W])*?\1|\w+))?\s*)*\/?>/gi,inside:{tag:{pattern:/^&lt;\/?[\w:-]+/i,inside:{punctuation:/^&lt;\/?/,namespace:/^[\w-]+?:/}},"attr-value":{pattern:/=(?:('|")[\w\W]*?(\1)|[^\s>]+)/gi,inside:{punctuation:/=|>|"/g}},punctuation:/\/?>/g,"attr-name":{pattern:/[\w:-]+/g,inside:{namespace:/^[\w-]+?:/}}}},entity:/&amp;#?[\da-z]{1,8};/gi},Prism.hooks.add("wrap",function(e){"entity"===e.type&&(e.attributes.title=e.content.replace(/&amp;/,"&"))}),Prism.languages.css={comment:/\/\*[\w\W]*?\*\//g,atrule:{pattern:/@[\w-]+?.*?(;|(?=\s*{))/gi,inside:{punctuation:/[;:]/g}},url:/url\((["']?).*?\1\)/gi,selector:/[^\{\}\s][^\{\};]*(?=\s*\{)/g,property:/(\b|\B)[\w-]+(?=\s*:)/gi,string:/("|')(\\?.)*?\1/g,important:/\B!important\b/gi,ignore:/&(lt|gt|amp);/gi,punctuation:/[\{\};:]/g},Prism.languages.markup&&Prism.languages.insertBefore("markup","tag",{style:{pattern:/(&lt;|<)style[\w\W]*?(>|&gt;)[\w\W]*?(&lt;|<)\/style(>|&gt;)/gi,inside:{tag:{pattern:/(&lt;|<)style[\w\W]*?(>|&gt;)|(&lt;|<)\/style(>|&gt;)/gi,inside:Prism.languages.markup.tag.inside},rest:Prism.languages.css}}}),Prism.languages.clike={comment:{pattern:/(^|[^\\])(\/\*[\w\W]*?\*\/|(^|[^:])\/\/.*?(\r?\n|$))/g,lookbehind:!0},string:/("|')(\\?.)*?\1/g,"class-name":{pattern:/((?:class|interface|extends|implements|trait|instanceof|new)\s+)[a-z0-9_\.\\]+/gi,lookbehind:!0,inside:{punctuation:/(\.|\\)/}},keyword:/\b(if|else|while|do|for|return|in|instanceof|function|new|try|catch|finally|null|break|continue)\b/g,"boolean":/\b(true|false)\b/g,"function":{pattern:/[a-z0-9_]+\(/gi,inside:{punctuation:/\(/}},number:/\b-?(0x[\dA-Fa-f]+|\d*\.?\d+([Ee]-?\d+)?)\b/g,operator:/[-+]{1,2}|!|=?&lt;|=?&gt;|={1,2}|(&amp;){1,2}|\|?\||\?|\*|\/|\~|\^|\%/g,ignore:/&(lt|gt|amp);/gi,punctuation:/[{}[\];(),.:]/g},Prism.languages.javascript=Prism.languages.extend("clike",{keyword:/\b(var|let|if|else|while|do|for|return|in|instanceof|function|new|with|typeof|try|catch|finally|null|break|continue)\b/g,number:/\b-?(0x[\dA-Fa-f]+|\d*\.?\d+([Ee]-?\d+)?|NaN|-?Infinity)\b/g}),Prism.languages.insertBefore("javascript","keyword",{regex:{pattern:/(^|[^/])\/(?!\/)(\[.+?]|\\.|[^/\r\n])+\/[gim]{0,3}(?=\s*($|[\r\n,.;})]))/g,lookbehind:!0}}),Prism.languages.markup&&Prism.languages.insertBefore("markup","tag",{script:{pattern:/(&lt;|<)script[\w\W]*?(>|&gt;)[\w\W]*?(&lt;|<)\/script(>|&gt;)/gi,inside:{tag:{pattern:/(&lt;|<)script[\w\W]*?(>|&gt;)|(&lt;|<)\/script(>|&gt;)/gi,inside:Prism.languages.markup.tag.inside},rest:Prism.languages.javascript}}}),Prism.languages.php=Prism.languages.extend("clike",{keyword:/\b(and|or|xor|array|as|break|case|cfunction|class|const|continue|declare|default|die|do|else|elseif|enddeclare|endfor|endforeach|endif|endswitch|endwhile|extends|for|foreach|function|include|include_once|global|if|new|return|static|switch|use|require|require_once|var|while|abstract|interface|public|implements|extends|private|protected|parent|static|throw|null|echo|print|trait|namespace|use|final|yield|goto)\b/gi,constant:/[A-Z0-9_]{2,}/g}),Prism.languages.insertBefore("php","keyword",{deliminator:/(\?>|\?&gt;|&lt;\?php|<\?php)/gi,"this":/\$this/,variable:/(\$\w+)\b/gi,scope:{pattern:/\b[a-z0-9_\\]+::/gi,inside:{keyword:/(static|self|parent)/,punctuation:/(::|\\)/}},"package":{pattern:/(\\|namespace\s+|use\s+)[a-z0-9_\\]+/gi,lookbehind:!0,inside:{punctuation:/\\/}}}),Prism.languages.insertBefore("php","operator",{property:{pattern:/(-&gt;)[a-z0-9_]+/gi,lookbehind:!0}}),Prism.languages.markup&&Prism.languages.insertBefore("php","comment",{markup:{pattern:/(\?>|\?&gt;)[\w\W]*?(?=(&lt;\?php|<\?php))/gi,lookbehind:!0,inside:{markup:{pattern:/&lt;\/?[\w:-]+\s*[\w\W]*?&gt;/gi,inside:Prism.languages.markup.tag.inside},rest:Prism.languages.php}}});var DEFAULT_ELEMENT=document.documentElement.scrollTop?document.documentElement:document.body,REQUEST_ANIMATION_FRAME=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,Scroller=function e(t){t=t?t:DEFAULT_ELEMENT;var n={easing:e.easing.linear};this.easing=function(e){return n.easing=e,this},this.to=function(e,a,r){var i=t.scrollLeft,o=t.scrollTop,s=e-i,l=a-o;if(i!==e||o!==a){var c=Date.now(),u=function(){var e=Date.now(),a=Math.min(1,(e-c)/r),g=n.easing(a);t.scrollTop=g*l+o,t.scrollLeft=g*s+i,1>a&&REQUEST_ANIMATION_FRAME.call(window,u)};REQUEST_ANIMATION_FRAME(u)}}};Scroller.easing={linear:function(e){return e},easeInQuad:function(e){return e*e},easeOutQuad:function(e){return e*(2-e)},easeInOutQuad:function(e){return.5>e?2*e*e:-1+(4-2*e)*e},easeInCubic:function(e){return e*e*e},easeOutCubic:function(e){return--e*e*e+1},easeInOutCubic:function(e){return.5>e?4*e*e*e:(e-1)*(2*e-2)*(2*e-2)+1},easeInQuart:function(e){return e*e*e*e},easeOutQuart:function(e){return 1- --e*e*e*e},easeInOutQuart:function(e){return.5>e?8*e*e*e*e:1-8*--e*e*e*e},easeInQuint:function(e){return e*e*e*e*e},easeOutQuint:function(e){return 1+--e*e*e*e*e},easeInOutQuint:function(e){return.5>e?16*e*e*e*e*e:1+16*--e*e*e*e*e}},window.Scroller=Scroller;